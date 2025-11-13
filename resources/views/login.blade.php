<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <!-- Navbar -->
    <header>
      <section>
        <nav
          class="container-fluid position-fixed top-0 navbar navbar-expand-lg"
        >
          <a href="{{ route('home') }}" class="text-dark"
            ><button class="btn">
              <i class="fa-solid fa-arrow-left fs-5"></i></button
          ></a>
          <div class="text-center w-100">
            <a class="navbar-brand text-danger fs-3 fw-semibold" href="{{ route('home') }}"
              >Ecommerce</a
            >
          </div>
        </nav>
      </section>
    </header>
    <!-- Form -->
    <main>
      <section>
        <div class="row container-fluid" style="margin-top: 9%; height: 70vh">
          <div class="col-md-8 p-0 frm_container d-flex m-auto border rounded-4 shadow">
            <div class="img_container w-50">
              <div class="image rounded-4 rounded-end-0">
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
              <form action="{{ route('account.authenticate') }}" method="POST">
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
                    <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
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
                <a href="{{ route('account.register') }}" class="text-decoration-none"
                  >Register Yourself</a
                >
              </p>
              <div
                class="login_platform d-flex justify-content-evenly m-3 mx-auto w-50"
              >
                <a href="https://www.google.com"
                  ><div class="social border rounded-circle p-1">
                    <img
                      src="{{ asset('images/google.png') }}"
                      alt="Google"
                      class="w-100"
                    /></div
                ></a>
                <a href="https://www.apple.com"
                  ><div class="social border rounded-circle ms-2 p-1">
                    <img
                      src="{{ asset('images/applelogo.png') }}"
                      alt="Apple"
                      class="w-100"
                    /></div
                ></a>
                <a href="https://www.facebook.com"
                  ><div class="social border rounded-circle ms-2 p-1">
                    <img
                      src="{{ asset('images/facebook.png') }}"
                      alt="Facebook"
                      class="w-100"
                    /></div
                ></a>
                <a href="https://www.pinterest.com"
                  ><div class="social border rounded-circle ms-2 p-1">
                    <img
                      src="{{ asset('images/pinterest.png') }}"
                      alt="Pintrest"
                      class="w-100"
                    /></div
                ></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <section>
      <div
        class="d-flex justify-content-center w-100 align-content-end position-absolute bottom-0"
      >
        <p class="text-center border-top p-1 fst-italic w-100 mb-0">
          &copy; All rights are reserved
        </p>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
      crossorigin="anonymous"
    ></script>
  </body>
</html>