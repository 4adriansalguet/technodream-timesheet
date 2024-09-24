<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('td-assets/common/td-logo.png')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="shortcut icon" href="{{asset('td-assets/common/td-logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/boxicons.min.css')}}"/>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
	@auth 
	@include('layouts.alert')
		<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand">
				<img class="img-fluid" src="{{asset('td-assets/common/td-logo.png')}}" alt="logo">
			</a>
			<ul class="side-menu top">
				<li class="@if(Route::currentRouteName() == 'admin.dashboard') active @endif">
					<a href="{{route('admin.dashboard')}}">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Analytics</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-shopping-bag-alt' ></i>
						<span class="text">Scanner</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Message</span>
					</a>
				</li>
				<li class="@if(Route::currentRouteName() == 'users.page' || Route::currentRouteName() == 'users.page.add') active @endif">
					<a href="{{route('users.page')}}">
						<i class='bx bxs-group' ></i>
						<span class="text">Users</span>
					</a>
				</li>
			</ul>
		</section>
		<!-- SIDEBAR -->
		<!-- CONTENT -->
		<section id="content">
			<!-- NAVBAR -->
			<nav>
				<i class='bx bx-menu' ></i>
				<div class="spacer"></div>
				<div class="profile-name">
					<p>{{Auth::user()->name .' | '. Auth::user()->position }}</p>
				</div>
				<a class="profile-img">
					<img src="{{empty(Auth::user()->avatar) ? asset('td-assets/users/user-avatar.png') : Auth::user()->avatar; }}">
				</a>
				<i class='bx bx-log-out-circle' title="Sign out" onclick="event.preventDefault();
				document.getElementById('logout-form').submit();"></i>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
			</nav>

			<main>
				<div class="head-title">
					<div class="left">
						<ul class="breadcrumb">
							<li>
								<a href="#">Dashboard</a>
							</li>
							@for($i = 2; $i <= count(Request::segments()); $i++)
								<li><i class='bx bx-chevron-right'></i></li>
								<li>
									<a class="text-capitalize" href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
										{{str_replace("-"," ",Request::segment($i))}}
									</a>
								</li>
							@endfor
						</ul>
					</div>
					<a class="date-time">
						<i class='bx bx-time-five'></i>
						<small class="date">Loading date and time...</small>
					</a>
				</div>

				@yield('content')

			</main>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-duration-format/1.3.0/moment-duration-format.min.js"></script>
		@vite(['public/css/admin.css', 'public/js/admin.js'])
		@yield('script-admin')
        <script>
            console.log('awd');

            const channel = Echo.channel('public.authentication.1');

            channel.subscribed(()=>{
                console.log('subscribe!');
            }).listen('.authentication', (event)=>{
                console.log(event);
            })
            
        </script>
    @endauth
</body>
</html>
