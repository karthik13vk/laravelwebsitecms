
@extends('admin.layouts.app')

@section('title', 'Admin Profile')

@section('content')


<style>
    #main, #footer {
    margin-left: 0px!important;
}
</style>

    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
  @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

              <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username"
                   class="form-control"
                   value="{{ old('username') }}"
                   autocomplete="username" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password"
                   class="form-control"
                   autocomplete="current-password" required>
        </div>

        <div class="text-end mb-3">
         <a href="{{ route('admin.change-password') }}">
    Change Password
</a>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Login
        </button>
    </form>

                </div>
              </div>



            </div>
          </div>
        </div>

      </section>

    </div>
@endsection
