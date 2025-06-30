@extends('layouts.frontend')

@section('content')


 <!-- breadcrumb__start -->
      <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__title">
                        <h1>Login</h1>
                        <ul>
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li class="color__blue">
                                Login
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- breadcrumb__end -->


 <!-- login__section__start -->
  <center>
    <div class="loginarea  sp_bottom_80 sp_top_80" >
     <div class="container" >
        <div class="row" >
            <center>
            <div class="col-xl-8 offset-md-2 loginarea__col" >
                <ul class="nav  tab__button__wrap text-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one" type="button">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two" type="button">Daftar</button>
                    </li>



                </ul>
            </div>
            </center>
            


            <div class="tab-content tab__content__wrapper" id="myTabContent">

                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                    <div class="col-xl-8 offset-md-2 loginarea__col">
                        <div class="loginarea__wraper">
                            <div class="loginarea__heading">
                                <h5 class="login__title">Login</h5>
                            </div>



                            <form method="POST" action="{{ route('login') }}" >
                                @csrf
                                <div class="loginarea__form">
                                    <label class="form__label">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'Email tidak cocok' }} </strong>
                                    </span>
                                @enderror

                                </div>
                                <div class="loginarea__form">
                                    <label class="form__label">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'Password tidak sesuai' }}</strong>
                                    </span>
                                @enderror

                                </div>
                                <div class="loginarea__form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form__check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                    
                                </div>
                                <div class="loginarea__button text-center">
                                   <button style="width: 100%;" type="submit" class="default__button">
                                    {{ __('Login') }}
                                   </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                    <div class="col-xl-8 offset-md-2 loginarea__col">
                        <div class="loginarea__wraper">
                            <div class="loginarea__heading">
                                <h5 class="login__title">Daftar</h5>
                            </div>



                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="loginarea__form">
                                            <label class="form__label">Username</label>
                                            <input id="name" type="text" class="common__login__input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan username">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-xl-6">
                                        <div class="loginarea__form">
                                            <label class="form__label">Email</label>
                                            <input id="email" type="email" class="common__login__input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="loginarea__form">
                                            <label class="form__label">Password</label>
                                            <input id="password" type="password" placeholder="Password" class="common__login__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="loginarea__form">
                                            <label class="form__label">Masukkan ulang password</label>
                                            <input id="password-confirm" type="password" class="common__login__input" placeholder="masukkan kembali password" name="password_confirmation" required autocomplete="new-password">

                                        </div>
                                    </div>
                                </div>

                                
                                <div class="login__button mt-3">
                                     <button type="submit" class="default__button text-center" >
                                    {{ __('Register') }}
                                </button>
                                </div>
                            </form>




                        </div>
                    </div>

                </div>



            </div>





        </div>

   


    </div>
    </div>
  </center>
    



@endsection
