<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Client;
use App\Models\Label;
use App\Models\Lead;
use App\Models\Organisation;
use App\Models\Person;
use App\Services\DealService;
use Illuminate\Http\Request;
use App\Services\LeadService;
use App\Services\OrganisationService;
use App\Services\PersonService;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;


class LeadController extends Controller
{
    /**
     * @var LeadService
     */
    private $leadService;

       /**
     * @var PersonService
     */
    private $personService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        /**
     * @var OrganisationService
     */
        /**
     * @var DealService
     */
    private $dealService;

    private $organisationService;

     public function __construct(LeadService $leadService ,DealService $dealService,PersonService $personService, OrganisationService $organisationService)
     {
         $this->leadService = $leadService;
         $this->personService = $personService;
         $this->organisationService = $organisationService;
         $this->dealService = $dealService;

     }



    public function index(Request $request)
    {


        $leads = Lead::whereNull('converted_at')->latest()->get();

        return view('dashboard.leads.index', [
            'leads' => $leads,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        switch ($request->model) {
            case 'client':
                $client = Client::find($request->id);

                break;

            case 'organisation':
                $organisation = Organisation::find($request->id);

                break;

            case 'person':
                $person = Person::find($request->id);

                break;
        }
        $labels=Label::pluck('name','id')->toArray();

        return view('dashboard.leads.create', [
            'client' => $client ?? null,
            'organisation' => $organisation ?? null,
            'person' => $person ?? null,
            'labels'=>$labels,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeadRequest $request)
    {
 

        if ($request->person_name && ! $request->person_id) {
            $person = $this->personService->createFromRelated($request);
        } elseif ($request->person_id) {
            $person = Person::find($request->person_id);
        }
        if ($request->organisation_name && ! $request->organisation_id) {
            $organisation = $this->organisationService->createFromRelated($request);
        } elseif ($request->organisation_id) {
            $organisation = Organisation::find($request->organisation_id);
        }
        if ($request->client_name && !$request->client_id) {
            $client = Client::create([
                'name' => $request->client_name,
                'user_owner_id' => $request->user_owner_id,
            ]);
        } elseif ($request->client_id) {
            $client = Client::find($request->client_id);
        }

        if (isset($client)) {
            if (isset($organisation)) {
                // dd($organisation->id);
                $client->contacts()->firstOrCreate([
                    'entityable_type' => $organisation->getMorphClass(),
                    'entityable_id' => $organisation->id,
                ]);
            }

            if (isset($person)) {
                $client->contacts()->firstOrCreate([
                    'entityable_type' => $person->getMorphClass(),
                    'entityable_id' => $person->id,
                ]);
            }
        }

        $lead = $this->leadService->create($request, $person ?? null, $organisation ?? null, $client ?? null);
        return redirect('/leads');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        $email = $lead->getPrimaryEmail();
        $phone = $lead->getPrimaryPhone();
        $address = $lead->getPrimaryAddress();
        $persons=Person::pluck('last_name','id')->toArray();
        return view('dashboard.leads.show',compact('lead','email','phone','address','persons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        $email = $lead->getPrimaryEmail();
        $phone = $lead->getPrimaryPhone();
        $address = $lead->getPrimaryAddress();
        $labels=Label::pluck('name','id')->toArray();
        return view('dashboard.leads.edit', [
            'lead' => $lead,
            'email' => $email ?? null,
            'phone' => $phone ?? null,
            'address' => $address ?? null,
            'labels' => $labels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        if ($request->person_name && ! $request->person_id) {
            $person = $this->personService->createFromRelated($request);
        } elseif ($request->person_id) {
            $person = Person::find($request->person_id);
        }

        if ($request->organisation_name && ! $request->organisation_id) {
            $organisation = $this->organisationService->createFromRelated($request);
        } elseif ($request->person_id) {
            $organisation = Organisation::find($request->organisation_id);
        }

        if ($request->client_name && ! $request->client_id) {
          
            // $client = Client::create([
            //     'name' => $request->client_name,
            //     'user_owner_id' => $request->user_owner_id,
            // ]);
            $lead->client->update([
                'name'=>$request->client_name,
            ]);
        } elseif ($request->client_id) {
            $client = Client::find($request->client_id);
        }

        // if (isset($client)) {
        //     if (isset($organisation)) {
        //         $client->contacts()->firstOrCreate([
        //             'entityable_type' => $organisation->getMorphClass(),
        //             'entityable_id' => $organisation->id,
        //         ]);
        //     }

        //     if (isset($person)) {
        //         $client->contacts()->firstOrCreate([
        //             'entityable_type' => $person->getMorphClass(),
        //             'entityable_id' => $person->id,
        //         ]);
        //     }
        // }

        $lead = $this->leadService->update($request, $lead, $person ?? null, $organisation ?? null, $client ?? null);
           

        return redirect(route('leads.show', $lead));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }
    public function noteCreate(Request $request,Lead $lead) {

        $note = $lead->notes()->create([
            'external_id' => Uuid::uuid4()->toString(),
            'content' => $request->note,
            'noted_at' => $request->noted_at,
            'user_created_id'=>auth()->id(),
        ]);

        $lead->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'external_id' => Uuid::uuid4()->toString(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $lead->getMorphClass(),
            'timelineable_id' => $lead->id,
            'recordable_type' => $note->getMorphClass(),
            'recordable_id' => $note->id,
        ]);
        return back();
    }
    public function taskCreate(Request $request,Lead $lead) {
        $task = $lead->tasks()->create([
            'name' => $request->name,
            'external_id' => Uuid::uuid4()->toString(),
            'description' => $request->description,
            'due_at' => $request->due,
            'user_owner_id' => auth()->user()->id,
            'user_assigned_id' => auth()->user()->id,
        ]);

        $lead->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $lead->getMorphClass(),
            'timelineable_id' => $lead->id,
            'recordable_type' => $task->getMorphClass(),
            'recordable_id' => $task->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);
        return back();
    }
    public function callsCreate(Request $request,Lead $lead) {
        $data = $request->validate([
            'title' => "required",
            'description' => "nullable",
            'form' => 'required',
            'to' => 'required',
            'guests' => 'nullable',
            // 'location' => "nullable",
        ]);

        $call = $lead->calls()->create([
            'name' => $data['title'],
            'description' => $data['description'],
            'start_at' => $data['form'],
            'finish_at' => $data['to'],
            'location' => $request->location,
            'user_owner_id' => auth()->user()->id,
            'user_assigned_id' => auth()->user()->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);


        foreach ($request->guests as $personId) {
            if ($person = Person::find($personId)) {
                $call->contacts()->create([
                    'entityable_type' => $person->getMorphClass(),
                    'entityable_id' => $person->id,
                ]);
            }
        }

        $lead->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $lead->getMorphClass(),
            'timelineable_id' => $lead->id,
            'recordable_type' => $call->getMorphClass(),
            'recordable_id' => $call->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);
        return back();

    }
    public function meetingCreate(Request $request,Lead $lead) {
        $data = $request->validate([
            'title' => "required",
            'description' => "nullable",
            'form' => 'required',
            'to' => 'required',
            'guests' => 'nullable',
            'location' => "nullable",
        ]);

        $meeting = $lead->meetings()->create([
            'name' => $data['title'],
            'description' => $data['description'],
            'start_at' => $data['form'],
            'finish_at' => $data['to'],
            'location' => $request->location,
            'user_owner_id' => auth()->user()->id,
            'user_assigned_id' => auth()->user()->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);

        foreach ($request->guests as $personId) {
            if ($person = Person::find($personId)) {
                $meeting->contacts()->create([
                    'entityable_type' => $person->getMorphClass(),
                    'entityable_id' => $person->id,
                ]);
            }
        }

        $lead->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $lead->getMorphClass(),
            'timelineable_id' => $lead->id,
            'recordable_type' => $meeting->getMorphClass(),
            'recordable_id' => $meeting->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);
        return back();
    }
    public function lunchesCreate(Request $request,Lead $lead) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'form' => 'required',
            'to' => 'required',
            'guests' => 'nullable',
            'location' => "nullable",
        ]);

        $lunch = $lead->lunches()->create([
            'name' => $data['title'],
            'description' => $data['description'],
            'start_at' =>  $data['form'],
            'finish_at' =>  $data['to'],
            'location' => $request->location,
            'user_owner_id' => auth()->user()->id,
            'user_assigned_id' => auth()->user()->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);

        foreach ($request->guests as $personId) {
            if ($person = Person::find($personId)) {
                $lunch->contacts()->create([
                    'entityable_type' => $person->getMorphClass(),
                    'entityable_id' => $person->id,
                ]);
            }
        }

        $lead->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $lead->getMorphClass(),
            'timelineable_id' => $lead->id,
            'recordable_type' => $lunch->getMorphClass(),
            'recordable_id' => $lunch->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);
        return back();

    }
    public function fileCreate(Request $request, Lead $lead) {
        $data = $request->validate([
            'file' => 'required',
        ]);

        $file = $request->file->store(strtolower(class_basename($lead->model)).'/'.$lead->id.'/files');

        $fileModel = $lead->files()->create([
            'external_id' => Uuid::uuid4()->toString(),
            'file' => $file,
            'name' => $request->file->getClientOriginalName(),
            'filesize' => $request->file->getSize(),
            'mime' => $request->file->getMimeType(),
            'external_id' => Uuid::uuid4()->toString(),
            'user_created_id' => auth()->user()->id,
        ]);

        $lead->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $lead->getMorphClass(),
            'timelineable_id' => $lead->id,
            'recordable_type' => $fileModel->getMorphClass(),
            'recordable_id' => $fileModel->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);
        return back();
    }
    public function convert(Lead $lead) {
        $email = $lead->getPrimaryEmail();
        $phone = $lead->getPrimaryPhone();
        $address = $lead->getPrimaryAddress();
        $labels=Label::pluck('name','id')->toArray();

        return view('dashboard.leads.convert', [
            'lead' => $lead,
            'email' => $email ?? null,
            'phone' => $phone ?? null,
            'address' => $address ?? null,
            'labels'=>$labels,
        ]);
    }
    public function convertStore(StoreLeadRequest $request, Lead $lead) {
        if ($request->person_name && ! $request->person_id) {
            $person = $this->personService->createFromRelated($request);
        } elseif ($request->person_id) {
            $person = Person::find($request->person_id);
        }

        if ($request->organisation_name && ! $request->organisation_id) {
            $organisation = $this->organisationService->createFromRelated($request);
        } elseif ($request->organisation_id) {
            $organisation = Organisation::find($request->organisation_id);
        }

        $this->dealService->create($request, $person ?? null, $organisation ?? null);

        $lead->update([
            'converted_at' => Carbon::now(),
        ]);
        return back();
    }
}