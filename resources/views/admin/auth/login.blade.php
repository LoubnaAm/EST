<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  </head>
  <body>
    <main>
      <div class="home__shape-small"></div>
      <div class="home__shape-big-1"></div>
      <div class="home__shape-big-2"></div>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">

                <x-auth-session-status  :status="session('status')" />
                 <form method="POST" action="{{ route('admin.login') }}" autocomplete="off" class="sign-in-form">
                   @csrf
                             <div class="logo">
                               <img src="{{ asset('images/logo.png') }}" alt="easyclass" />
                               <h4>easyclass</h4>
                             </div>

                             <div class="heading">
                               <h2>Re-bienvenue Mon Admin</h2>

                             </div>
                 <div class="actual-form">

                       <div class="input-wrap">

                           <x-text-input id="email"  minlength="4" class="input-field" type="email" name="email" :value="old('email')"  required placeholder="Email" />
                           <x-input-error :messages="$errors->get('email')" class="mt-2" />
                       </div>



                       <div class="input-wrap">

                           <x-text-input id="password" minlength="4" class="input-field" type="password" name="password" autocomplete="off" required placeholder="Password"/>
                           <x-input-error :messages="$errors->get('password')" class="mt-2" />
                       </div>

<div>
    <x-primary-button class="sign-btn">
        {{ __('Log in') }}
</x-primary-button>
<p class="text">

 <a href="{{ route('admin.password.request') }}">Mot de passe oublier?</a>
</p>
</div>








                             </div>

          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="{{ asset('images/imgAdmin.jpeg') }}" class="image img-1 show" alt="" />

            </div>


          </div>
        </div>
      </div>
    </main>

    <script src="{{ asset('js/login.js') }}"></script>
  </body>
</html>
