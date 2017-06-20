@extends('admin.plane')

@section('body')

		<dir class="col12">
			<nav class="navbar navbar-inverse">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a href="{{ url('/admin/dashboard') }}" class="navbar-brand">Nazrol HR</a>
				</div>

				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="{{ url('/admin/dashboard') }}">
								<span class="fa fa-podcast fa-fw"></span>
								Dashboard
							</a>
						</li>
						@if (Auth::user()->position == 'HR')
							<li>
								<a href="{{ url('/admin/users') }}">
									<span class="fa fa-users fa-fw"></span>
									Users
								</a>
							</li>
						@else
							<li>
								<a href="{{ url('/admin/profile') }}">
									<span class="fa fa-users fa-fw"></span>
									Profile
								</a>
							</li>
						@endif						
						<li>
							<a href="{{ url('/admin/leave') }}">
								<span class="fa fa-calendar fa-fw"></span>
								Leave 
							</a>
						</li>
						<li>
							<a href="{{ url('/admin/benefits') }}">
								<span class="fa fa-birthday-cake fa-fw"></span>
								Benefits
							</a>
						</li>
					</ul>	

					<ul class="nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Welcome {{ Auth::user()->name}}
								<i class="fa fa-user fa-fw"></i>
								<i class="fa fa-caret-down"></i>
							</a>

							<ul class="dropdown-menu dropdown-messages">
								<li>
									<a href="#">
									<i class="fa fa-lock fa-fw"></i>
									Change Password
									</a>
								</li>
								<li>
									<a href="/logout">
									<i class="fa fa-sign-out fa-fw"></i>
									Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>	
				</div>
			</nav>
		</dir>

		@yield('section')

@endsection
