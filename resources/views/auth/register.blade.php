@extends('layouts.app')

@section('content')
<style>
    .slider {
        background-image: none !important;
        height: 60px;
    }
</style>
    <main>
        <div class="container-fluid" style="margin-top: 6%; height: 74vh">
          <div class="frm_container d-flex w-75 m-auto border rounded-4 shadow">
            <div class="img_container w-50">
              <div class="image rounded-4 rounded-end-0">
                <img src="{{ asset('images/online_shopping.jpeg') }}" class="rounded-start-4" alt="">
                <div class="img_opacity bg-light opacity-25 w-100">
                </div>
              </div>
            </div>
            <div class="form_container w-50 m-3">
              <h3 class="text-center m-3 p-2">Register Here</h3>
              <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input_container d-flex justify-content-between m-3">
                  <div class="input_container w-100 me-2">
                    <label class="mx-2">Full Name:</label>
                    <input
                      type="text"
                      class="form-control w-100"
                      placeholder="Full Name"
                      name="name"
                      id="name"
                    />
                    @error('name')
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
                    <a href="{{ route('login') }}" class="btn btn-danger float-end" >Login</a>
                  </div>
                </div>
              </form>
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