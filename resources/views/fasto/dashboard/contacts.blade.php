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
	<div class="project-nav">
		<div class="card-action card-tabs  me-auto">
			<ul class="nav nav-tabs style-2">
				<li class="nav-item">
					<a href="#navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">All Contacs <span class="badge badge-primary shadow-primary">154</span></a>
				</li>
				<li class="nav-item">
					<a href="#navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Pending Invitation <span class="badge shadow-warning  badge-warning">6</span></a>
				</li>	
			</ul>
		</div>
		
		
		<div class="d-flex align-items-center">
			<a href="javascript:void(0);" id="btn-add-contact"  class="btn btn-primary rounded text-white">+ New Contacts</a>
			<div class="switch">
				<a href="javascript:void(0);" class="mx-4  view-list active-view">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3.99976 7H19.9998C20.7954 7 21.5585 6.68393 22.1211 6.12132C22.6837 5.55871 22.9998 4.79565 22.9998 4C22.9998 3.20435 22.6837 2.44129 22.1211 1.87868C21.5585 1.31607 20.7954 1 19.9998 1H3.99976C3.20411 1 2.44104 1.31607 1.87844 1.87868C1.31583 2.44129 0.999756 3.20435 0.999756 4C0.999756 4.79565 1.31583 5.55871 1.87844 6.12132C2.44104 6.68393 3.20411 7 3.99976 7Z" fill="#CBCBCB"/>
						<path d="M19.9998 9H3.99976C3.20411 9 2.44104 9.31607 1.87844 9.87868C1.31583 10.4413 0.999756 11.2044 0.999756 12C0.999756 12.7956 1.31583 13.5587 1.87844 14.1213C2.44104 14.6839 3.20411 15 3.99976 15H19.9998C20.7954 15 21.5585 14.6839 22.1211 14.1213C22.6837 13.5587 22.9998 12.7956 22.9998 12C22.9998 11.2044 22.6837 10.4413 22.1211 9.87868C21.5585 9.31607 20.7954 9 19.9998 9Z" fill="#CBCBCB"/>
						<path d="M19.9998 17H3.99976C3.20411 17 2.44104 17.3161 1.87844 17.8787C1.31583 18.4413 0.999756 19.2044 0.999756 20C0.999756 20.7956 1.31583 21.5587 1.87844 22.1213C2.44104 22.6839 3.20411 23 3.99976 23H19.9998C20.7954 23 21.5585 22.6839 22.1211 22.1213C22.6837 21.5587 22.9998 20.7956 22.9998 20C22.9998 19.2044 22.6837 18.4413 22.1211 17.8787C21.5585 17.3161 20.7954 17 19.9998 17Z" fill="#CBCBCB"/>
					</svg>
				</a>
				<a href="javascript:void(0);" class=" view-grid">
					<svg class="primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8 1H4C2.34315 1 1 2.34315 1 4V8C1 9.65685 2.34315 11 4 11H8C9.65685 11 11 9.65685 11 8V4C11 2.34315 9.65685 1 8 1Z" fill="#43DC80"/>
						<path d="M20 1H16C14.3431 1 13 2.34315 13 4V8C13 9.65685 14.3431 11 16 11H20C21.6569 11 23 9.65685 23 8V4C23 2.34315 21.6569 1 20 1Z" fill="#43DC80"/>
						<path d="M8 13H4C2.34315 13 1 14.3431 1 16V20C1 21.6569 2.34315 23 4 23H8C9.65685 23 11 21.6569 11 20V16C11 14.3431 9.65685 13 8 13Z" fill="#43DC80"/>
						<path d="M20 13H16C14.3431 13 13 14.3431 13 16V20C13 21.6569 14.3431 23 16 23H20C21.6569 23 23 21.6569 23 20V16C23 14.3431 21.6569 13 20 13Z" fill="#43DC80"/>
					</svg>
				</a>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title fs-20">Add Contact</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<i class="flaticon-cancel-12 close" data-bs-dismiss="modal"></i>
					<div class="add-contact-box">
						<div class="add-contact-content">
							<form id="addContactModalTitle">
								@csrf
								<div class="image-placeholder">
									<div class="avatar-edit">
										<input type="file" id="imageUpload" accept=".png, .jpg, .jpeg">
										<label for="imageUpload"></label>
									</div>
									<div class="avatar-preview">
										<div id="imagePreview" style="background-image: url('{{ asset('images/contacts/user.jpg')}}');">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="text-black font-w500">Name</label>
									<div class="contact-name">
										<input type="text" id="c-name" class="form-control" placeholder="Name">
										<span class="validation-text"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="text-black font-w500">Occupation</label>
									<div class="contact-occupation">
										<input type="text" id="c-occupation" class="form-control" placeholder="Occupation">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="btn-edit" class="float-left btn btn-primary">Save</button>

					<button class="btn btn-danger" data-bs-dismiss="modal"> <i class="flaticon-delete-1"></i> Discard</button>

					<button id="btn-add" class="btn btn-primary">Add</button>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade show active" id="navpills-1" >
			<div class="row dz-scroll  loadmore-content searchable-items list" id="allContactListContent">
				<div class="items items-header-section">
				</div>
				
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-3.jpg')}}" data-src="{{ asset('images/contacts/Untitled-3.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Alan Green">Alan Green</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">UI Designer</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
					
					
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-1.jpg')}}" data-src="{{ asset('images/contacts/Untitled-1.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Angela Moss">Angela Moss</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="Redblue Studios">Redblue Studios</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-2.jpg')}}" data-src="{{ asset('images/contacts/Untitled-2.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Brian Samuel">Brian Samuel</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="Team Management">Team Management</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-4.jpg')}}" data-src="{{ asset('images/contacts/Untitled-4.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Benny Chagur">Benny Chagur</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="Highspeed Inc.">Highspeed Inc.</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-5.jpg')}}" data-src="{{ asset('images/contacts/Untitled-5.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Chyntia Lawra">Chyntia Lawra</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="Zero Two Studios">Zero Two Studios</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-6.jpg')}}" data-src="{{ asset('images/contacts/Untitled-6.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Cloe Simatupang">Cloe Simatupang</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="Zero Two Studios">Zero Two Studios</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-7.jpg')}}" data-src="{{ asset('images/contacts/Untitled-7.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Engeline O’conner">Engeline O’conner</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">Beep Beep Inc.</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-8.jpg')}}" data-src="{{ asset('images/contacts/Untitled-8.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Franklin Jr.">Franklin Jr.</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="Zero Two Studios">Zero Two Studios</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-9.jpg')}}" data-src="{{ asset('images/contacts/Untitled-9.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Geovanny">Geovanny</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">UI Designer</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-10.jpg')}}" data-src="{{ asset('images/contacts/Untitled-10.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Henry Charlotte">Henry Charlotte</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">UI Designer</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-11.jpg')}}" data-src="{{ asset('images/contacts/Untitled-11.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Ivankov Shee">Ivankov Shee</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">UI Designer</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-12.jpg')}}" data-src="{{ asset('images/contacts/Untitled-12.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Nindy Leeacovic">Nindy Leeacovic</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">UI Designer</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 d-flex justify-content-center">
					<a href="javascript:void(0);" class="btn btn-outline-primary dz-load-more" id="allContactList"  rel="{{ url('ajax/contact-list')}}">Load More</a>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="navpills-2">
			<div class="row dz-scroll loadmore-content" id="pendingListContent">
				<div class="items items-header-section">
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-7.jpg')}}" data-src="{{ asset('images/contacts/Untitled-7.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Engeline O’conner">Engeline O’conner</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">Beep Beep Inc.</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-8.jpg')}}" data-src="{{ asset('images/contacts/Untitled-8.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Franklin Jr.">Franklin Jr.</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="Zero Two Studios">Zero Two Studios</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-9.jpg')}}" data-src="{{ asset('images/contacts/Untitled-9.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Geovanny">Geovanny</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">UI Designer</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-10.jpg')}}" data-src="{{ asset('images/contacts/Untitled-10.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Henry Charlotte">Henry Charlotte</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">UI Designer</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-11.jpg')}}" data-src="{{ asset('images/contacts/Untitled-11.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Ivankov Shee">Ivankov Shee</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">UI Designer</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
					<div class="card contact-bx item-content">
						<div class="card-header border-0">
							<div class="action-dropdown">
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item edit" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body user-profile">
							<div class="image-bx">
								<img src="{{ asset('images/contacts/Untitled-12.jpg')}}" data-src="{{ asset('images/contacts/Untitled-12.jpg')}}" alt="" class="rounded-circle">
								<span class="active"></span>
							</div>
							<div class="media-body user-meta-info">
								<h6 class="fs-20 font-w500 my-1"><a href="{{ url('app-profile')}}" class="text-black user-name" data-name="Nindy Leeacovic">Nindy Leeacovic</a></h6>
								<p class="fs-14 mb-3 user-work" data-occupation="UI Designer">UI Designer</p>
								<ul>
									<li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									<li><a href="{{ url('messages')}}"><i class="las la-sms"></i></a></li>
									<li><a href="javascript:void(0);"><i class="fas fa-video" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 d-flex justify-content-center">
					<a href="javascript:void(0);" class="btn btn-outline-primary dz-load-more" id="pendingList"  rel="{{ url('ajax/contact-list')}}">Load More</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection