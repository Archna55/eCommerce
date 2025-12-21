@extends('layouts.app')

@section('content')
<style>
    .slider {
        background-image: none !important;
        height: 60px;
    }
</style>
    <main>
        <div class="row container-fluid" style="margin-top: 2%; height: 70vh">
          <div class="col-md-8 p-0 frm_container d-flex m-auto border rounded-4 shadow">
            <div class="img_container w-50">
              <div class="image rounded-4 rounded-end-0">
                <img src="{{ asset('images/onlineshop.jpeg') }}" class="rounded-start-4" alt="">
                <div class="img_opacity bg-light opacity-25 w-100">
                </div>
              </div>
            </div>
            <div class="form_container w-50 m-3">
              <h3 class="text-center m-3 p-2">Login Here</h3>
              @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
              @if (session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
              @endif
              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input_container m-3">
                  <label class="mx-2">{{ __('Email Address') }}</label>
                    <input id="email" placeholder="example@gmail.com" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror 
                </div>
                <div class="input_container d-flex m-3">
                  <div class="input_container w-100">
                    <label class="mx-2">{{ __('Password') }}</label>
                    <div class="d-flex">
                      <input
                      type="password"
                      class="form-control border-end-0 rounded-end-0"
                      placeholder="Enter Password"
                      name="password"
                      id="password"
                      />
                      <i class="fa-regular fa-eye-slash p-2 border border-start-0 rounded-end"></i>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="input_container d-flex m-3">
                  <div class="input_container d-flex justify-content-between w-100">
                    <button type="submit" class="btn btn-danger">
                      {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                    @endif
                  </div>
                </div>
              </form>
              <p class="text-center">
                Do'not have an account?
                <a href="{{ route('register') }}" class="text-decoration-none"
                  >Register Yourself</a
                >
              </p>
              <div class="login_platform d-flex justify-content-evenly m-3 mx-auto w-50">
                <a href="https://www.google.com">
                    <div class="social border rounded-circle p-1">
                        <img src="{{ asset('images/google.png') }}" alt="Google" class="w-100"/>
                    </div>
                </a>
                <a href="https://www.apple.com">
                    <div class="social border rounded-circle p-1">
                        <img src="{{ asset('images/applelogo.png') }}" alt="Apple" class="w-100" />
                    </div>
                </a>
                <a href="https://www.facebook.com">
                    <div class="social border rounded-circle ms-2 p-1">
                        <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="w-100" />
                    </div>
                </a>
                <a href="https://www.pinterest.com">
                    <div class="social border rounded-circle ms-2 p-1">
                        <img src="{{ asset('images/pinterest.png') }}" alt="Pintrest" class="w-100" />
                    </div>
                </a>
              </div>
            </div>
          </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
    const togglePassword = document.querySelectorAll('.fa-eye-slash');
    togglePassword.forEach(icon => {
        icon.addEventListener('click', function () {
            const passwordField = this.previousElementSibling;
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
    </script>
@endpush