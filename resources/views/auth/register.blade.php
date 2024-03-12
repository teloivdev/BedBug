@include('layouts.main')
@include('layouts.webNav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <h1 class="display-5">Register Your Company</h1>
                <p class="lead">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control bg-white @error('name') is-invalid @enderror" id="floatingInput" name="name" value="{{ old('name') }}" placeholder="Placeholder Realty, LLC">
                                        <label for="floatingInput">Company's Legal Name</label>
                                        @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control bg-white @error('email') is-invalid @enderror" id="floatingInput" name="email" value="{{ old('email') }}" placeholder="placeholder@realty.com">
                                        <label for="floatingInput">Email/Username</label>
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control bg-white @error('password') is-invalid @enderror" required id="floatingInput" name="password" value="" autocomplete="new-password" placeholder="placeholder@realty.com">
                                        <label for="floatingInput">Password</label>
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control bg-white" required id="floatingInput" name="password_confirmation" value="" autocomplete="new-password" placeholder="placeholder@realty.com">
                                        <label for="floatingInput">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center mt-4">
                                <button type="submit" class="mr-4 btn btn-outline-primary btn-lg bg-primary text-white">
                                    {{ __('Register') }}
                                </button>
                                <a class="ms-5 text-decoration-none justify-end" href="{{ route('login') }}">
                                    {{ __('Already have an account?') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
