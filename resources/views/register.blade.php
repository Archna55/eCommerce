<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>
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
          <a href="{{ url('/') }}" class="text-dark"
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
        <div class="container-fluid" style="margin-top: 6%; height: 74vh">
          <div class="frm_container d-flex w-75 m-auto border rounded-4 shadow">
            <div class="img_container w-50">
              <div class="signup_img rounded-4 rounded-end-0"></div>
            </div>
            <div class="form_container w-50 m-3">
              <h3 class="text-center m-3 p-2">Register Here</h3>
              <form action="{{ route('account.processRegistration') }}" method="POST">
                @csrf
                <div class="input_container d-flex justify-content-between m-3">
                  <div class="input_container w-100 me-2">
                    <label class="mx-2">Full Name:</label>
                    <input
                      type="text"
                      class="form-control w-100"
                      placeholder="Full Name"
                      name="full_name"
                      id="full_name"
                    />
                    @error('full_name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="input_container d-flex m-3">
                  <div class="input_container w-100">
                    <label class="mx-2">E-mail:</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter Your Email"
                      name="email"
                      id="email"
                    />
                    @error('email')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="input_container d-flex m-3">
                  <div class="input_container w-100">
                    <label class="mx-2">Password:</label>
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
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="input_container d-flex m-3">
                  <div class="input_container w-100">
                    <label class="mx-2">Re-Password:</label>
                    <div class="d-flex">
                      <input
                        type="password"
                        class="form-control border-end-0 rounded-end-0"
                        placeholder="Re-Enter Password"
                        name="password_confirmation"
                        id="password_confirmation"
                      />
                      <i class="fa-regular fa-eye-slash p-2 border border-start-0 rounded-end"></i>
                    </div>
                    @error('password_confirmation')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="input_container d-flex m-3">
                  <div class="input_container w-100">
                    <button type="submit" class="btn btn-danger">Sign Up</button>
                  </div>
                  <div class="input_container w-100">
                    <a href="{{ route('account.login') }}" class="btn btn-danger float-end" >Login</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer>
      <section>
        <div
          class="d-flex justify-content-center w-100 align-content-end position-absolute bottom-0"
        >
          <p class="text-center border-top p-1 fst-italic w-100 mb-0">
            &copy; All rights are reserved
          </p>
        </div>
      </section>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
      crossorigin="anonymous"
    ></script>
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
  </body>
</html>