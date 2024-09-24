@extends('layouts.app')

@section('title', 'Technodream')

@section('content')
    <div class="vh-100 td-home">
        <div class="row h-100 w-100">
            <div class="col-lg-6 d-none d-md-block">
                <div class="d-flex justify-content-center align-items-center flex-column h-100">
<lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_lwubnwbl.json"  background="transparent"  speed="1"  style="width: 500px; height: 100%;"  loop  autoplay></lottie-player>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="card"> 
                        <div class="card-header text-center">
                            <img class="img-fluid w-50" src="{{asset('td-assets/common/td-logo.png')}}" alt="td logo">
                        </div>
                        <div class="card-body">
                            <form action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row remember-me">
                                    <div class="col-lg-5 align-items-center d-flex gap-2">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember" class="text-white">Remember me</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="submit" value="Login" class="btn w-100" onClick="this.form.submit(); this.disabled=true; this.value='Authenticating...';">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection