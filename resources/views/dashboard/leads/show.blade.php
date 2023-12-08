@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <!-- Add Project -->
        {{-- <div class="modal fade" id="addProjectSidebar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create Project</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<form>
                        @csrf
						<div class="form-group">
							<label class="text-black font-w500">Project Name</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
									<label class="text-black font-w500">Dadeline</label>
									<div class="cal-icon"><input type="date" class="form-control"><i class="far fa-calendar-alt"></i></div>
								</div>
						<div class="form-group">
							<label class="text-black font-w500">Client Name</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-primary">CREATE</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>{{ $lead->title }}</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('leads.create') }}">Create</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $lead->title }}</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                 
                    <div class="card-body">
                        <h6 class="text-uppercase">DETAILS</h6>
                        <hr />
                        <p><span class="fa fa-tag" aria-hidden="true"></span>
                            @foreach ($lead->labels as $label)
                                <span class="badge light badge-success">{{ $label->name }}</span></td>
                            @endforeach
                        </p>
                        <p><i class="las la-dollar-sign"
                                style="font-size: 20px;font-weight:900"></i>{{ $lead->amount, $lead->currency }}</p>
                        <p><span class="fa fa-info" aria-hidden="true"></span> {{ $lead->description }}</p>
                        <p><span class="fa fa-user-circle" aria-hidden="true"></span> <a
                                href="">{{ $lead->ownerUser->name ?? null }}</a></p>
                        <h6 class="mt-4 text-uppercase"> CUSTOMER</h6>
                        <hr />
                        <p><span class="fa fa-address-card" aria-hidden="true"></span>
                            @if ($lead->client)
                                <a href="">{{ $lead->client->name }}</a>
                            @endif
                        </p>
                        <h6 class="mt-4 text-uppercase"> ORGANIZATION</h6>
                        <hr />
                        <p><span class="fa fa-building" aria-hidden="true"></span>
                            @if ($lead->organisation)
                                <a href="">{{ $lead->organisation->name }}</a>
                            @endif
                        </p>
                        <p><span class="fa fa-map-marker me-1"
                                aria-hidden="true"></span>{{ $lead->address }} </p>
                        <h6 class="mt-4 text-uppercase">CONTACT PERSON</h6>
                        <hr />
                        {{-- <p><span class="fa fa-user" aria-hidden="true"></span>
                            @if ($lead->person)
                                <a href="">{{ $lead->person->name }}</a>
                            @endif
                        </p> --}}
                  
                            <p><span class="fa fa-envelope" aria-hidden="true"></span> <a
                                    href="mailto:{{ $lead->email }}">{{ $lead->email }}</a>
                                </p>
              
                 
                            <p><span class="fa fa-phone" aria-hidden="true"></span> <a
                                    href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a>
                              </p>
                    
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-7" style="height: 100vh; ">
                <div class="card " style="overflow:hidden;overflow-y: scroll;">
                 
                    <div class="card-body">
                
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active px-2" data-bs-toggle="tab" href="#activity"> Activity</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#notes1"> Notes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tasks"> Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#calls"> Calls</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#meeting"> Meetings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#lunches"> Lunches</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#files"> Files</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="activity" role="tabpanel">
                                    <div class="pt-4">
                                        @foreach ($lead->activities as $activity)
                                            
                                        @include('partials.activity',['activity'=>$activity])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="notes1">
                                    <div class="pt-4">
                                        <form action="{{route('note.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post">
                                            @csrf
                                            @include('partials.form.textarea', [
                                                'name' => 'note',
                                                'label' => 'Add Note',
                                                'rows' => 5,
                                            ])
                                            <div class=" mb-3">
                                                <label class="form-label">Noted at</label>
                                                <input type="datetime-local" class="form-control" name="noted_at">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($lead->notes as $note)
                                            
                                        @include('partials.note-content',['note' => $note])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tasks">
                                    <div class="pt-4">
                                        <form action="{{route('task.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post">
                                            @csrf
                                            @include('partials.form.text', [
                                                'name' => 'name',
                                                'label' => 'Name',
                                            ])
                                            @include('partials.form.textarea', [
                                                'name' => 'description',
                                                'label' => 'Description',
                                                'rows' => 5,
                                            ])
                                            <div class=" mb-3">
                                                <label class="form-label">Due</label>
                                                <input type="datetime-local" name="due" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>

                                        @foreach ($lead->tasks as $task)
                                            
                                        @include('partials.task-content',['task' => $task])
                                        @endforeach
                           
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="calls">
                                    <div class="pt-4">
                                        <form action="{{route('calls.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($lead->calls as $call)
                                            
                                        @include('partials.call-content',['call' => $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="meeting">
                                    <div class="pt-4">
                                        <form action="{{route('meeting.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($lead->meetings as $call)
                                            
                                        @include('partials.call-content',['call' =>  $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="lunches">
                                    <div class="pt-4">
                                        <form action="{{route('lunches.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            @foreach ($lead->lunches as $call)
                                            
                                            @include('partials.call-content',['call'=>$call])
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="files">
                                    <div class="pt-4">
                                        <form action="{{route('file.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @include('partials.form.file', [
                                                'name' => 'file',
                                                'label' => 'File',
                                           
                                            ])
                                         <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($lead->files as $file)
                                            
                                        @include('partials.file-content',['file'=>$file])
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>
    </div>
@endsection
