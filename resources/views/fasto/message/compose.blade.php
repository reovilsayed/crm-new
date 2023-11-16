@extends('layouts.default')

@section('content')
<div class="container-fluid">
	<!-- Add Project -->
	<div class="modal fade" id="addProjectSidebar">
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
	</div>
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="welcome-text">
				<h4>Hi, welcome back!</h4>
				<span>Email</span>
			</div>
		</div>
		<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Email</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Compose</a></li>
			</ol>
		</div>
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-xl-3 col-xxl-4">
							<div class="email-left-box">
								<div class="p-0">
									<a href="{{ url('email-compose')}}" class="btn btn-primary btn-block">Compose</a>
								</div>
								<div class="mail-list rounded mt-4">
									<a href="{{ url('email-inbox')}}" class="list-group-item active"><i
											class="fa fa-inbox font-18 align-middle me-2"></i> Inbox <span
											class="badge badge-primary badge-sm float-end">198</span> </a>
									<a href="javascript:void()" class="list-group-item"><i
											class="fa fa-paper-plane font-18 align-middle me-2"></i>Sent</a> <a href="javascript:void()" class="list-group-item"><i
											class="fas fa-star font-18 align-middle me-2"></i>Important <span
											class="badge badge-danger text-white badge-sm float-end">47</span>
									</a>
									<a href="javascript:void()" class="list-group-item"><i
											class="mdi mdi-file-document-box font-18 align-middle me-2"></i>Draft</a><a href="javascript:void()" class="list-group-item"><i
											class="fa fa-trash font-18 align-middle me-2"></i>Trash</a>
								</div>
								<div class="mail-list rounded overflow-hidden mt-4">
									<div class="intro-title d-flex justify-content-between my-0">
										<h5>Categories</h5>
										<i class="fa fa-chevron-down"></i>
									</div>
									<a href="{{ url('email-inbox')}}" class="list-group-item"><span class="icon-warning"><i
												class="fa fa-circle"></i></span>
										Work </a>
									<a href="{{ url('email-inbox')}}" class="list-group-item"><span class="icon-primary"><i
												class="fa fa-circle"></i></span>
										Private </a>
									<a href="{{ url('email-inbox')}}" class="list-group-item"><span class="icon-success"><i
												class="fa fa-circle"></i></span>
										Support </a>
									<a href="{{ url('email-inbox')}}" class="list-group-item"><span class="icon-dpink"><i
												class="fa fa-circle"></i></span>
										Social </a>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-xxl-8">
							<div class="email-right-box">
								<div class="toolbar mb-4" role="toolbar">
									<div class="btn-group mb-1">
										<button type="button" class="btn btn-primary light px-3"><i class="fa fa-archive"></i></button>
										<button type="button" class="btn btn-primary light px-3"><i class="fa fa-exclamation-circle"></i></button>
										<button type="button" class="btn btn-primary light px-3"><i class="fa fa-trash"></i></button>
									</div>
									<div class="btn-group mb-1">
										<button type="button" class="btn btn-primary light dropdown-toggle px-3" data-bs-toggle="dropdown">
											<i class="fa fa-folder"></i> <b class="caret m-l-5"></b>
										</button>
										<div class="dropdown-menu"> 
											<a class="dropdown-item" href="javascript: void(0);">Social</a> 
											<a class="dropdown-item" href="javascript: void(0);">Promotions</a> 
											<a class="dropdown-item" href="javascript: void(0);">Updates</a>
											<a class="dropdown-item" href="javascript: void(0);">Forums</a>
										</div>
									</div>
									<div class="btn-group mb-1">
										<button type="button" class="btn btn-primary light dropdown-toggle px-3" data-bs-toggle="dropdown">
											<i class="fa fa-tag"></i> <b class="caret m-l-5"></b>
										</button>
										<div class="dropdown-menu"> 
											<a class="dropdown-item" href="javascript: void(0);">Updates</a> 
											<a class="dropdown-item" href="javascript: void(0);">Social</a> 
											<a class="dropdown-item" href="javascript: void(0);">Promotions</a>
											<a class="dropdown-item" href="javascript: void(0);">Forums</a>
										</div>
									</div>
									<div class="btn-group mb-1">
										<button type="button" class="btn btn-primary light dropdown-toggle v" data-bs-toggle="dropdown">More <span class="caret m-l-5"></span>
										</button>
										<div class="dropdown-menu"> <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a> <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
											<a class="dropdown-item" href="javascript: void(0);">Add Star</a> <a class="dropdown-item" href="javascript: void(0);">Mute</a>
										</div>
									</div>
								</div>
								<div class="compose-content">
									<form action="#">
									@csrf
										<div class="mb-3">
											<input type="text" class="form-control bg-transparent" placeholder=" To:">
										</div>
										<div class="mb-3">
											<input type="text" class="form-control bg-transparent" placeholder=" Subject:">
										</div>
										<div class="mb-3">
											<textarea id="email-compose-editor" class="textarea_editor form-control bg-transparent" rows="8" placeholder="Enter text ..."></textarea>
										</div>
									</form>
									<h5 class="mb-4"><i class="fa fa-paperclip"></i> Attatchment</h5>
									<form action="#" class="dropzone">
										@csrf
										<div class="fallback">
											<input name="file" type="file" multiple />
										</div>
									</form>
								</div>
								<div class="text-start mt-4 mb-3">
									<button class="btn btn-primary btn-sl-sm me-2" type="button"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Send</button>
									<button class="btn btn-danger light btn-sl-sm" type="button"><span class="me-2"><i class="fa fa-times"></i></span>Discard</button>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection