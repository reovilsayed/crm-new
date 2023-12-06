<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisations=Organisation::latest()->get();
        return view('dashboard.organisations.index',compact('organisations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labels=Label::pluck('name','id')->toArray();
        return view('dashboard.organisations.create',compact('labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'labels'=>'required',
            'user_owner_id'=>'required',
            'address'=>'nullable',
        ]);
        $organisation = Organisation::create([
            'name' => $request->name,
            'user_owner_id' => $request->user_owner_id,
            'address' => $request->address,
            'external_id' => Uuid::uuid4()->toString(),
        ]);

       $organisation->labels()->sync($request->labels ?? []);
       return redirect('/organisations')->with('success','Organisation Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {
        $labels=Label::pluck('name','id')->toArray();
        return view('dashboard.organisations.edit',compact('labels','organisation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisation $organisation)
    {
        $request->validate([
            'name'=>'required',
            'labels'=>'required',
            'user_owner_id'=>'required',
            'address'=>'nullable',
        ]);
        $organisation->update([
            'name' => $request->name,
            'user_owner_id' => $request->user_owner_id,
            'address' => $request->address,
        ]);

       $organisation->labels()->sync($request->labels ?? []);
       return redirect('/organisations')->with('success','Organisation Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        if($organisation->deals){
            foreach($organisation->deals as $deal){
                $deal->update([
                    'organisation_id'=>null,
                ]);
            }
        }
        $organisation->delete();
        return redirect('/organisations')->with('success','Organisation Delete Successfully');
    }
}