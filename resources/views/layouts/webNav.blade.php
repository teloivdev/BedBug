<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="{{ asset('/images/bedBugsLogo.png') }}" width="125" height="125" alt="Bed Bugs insurance logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 col-12">
                        <ul class="navbar-nav me-4 mb-4 mb-lg-0">
                        <li class="nav-item ps-2 pe-2">
                        <a class="nav-link fs-5 fw-bold" href="{{ route('index.home') }}">Home</a>
                        </li>
                        <li class="nav-item ps-2 pe-2 dropdown">
                        <a class="nav-link dropdown-toggle fs-5 fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fs-5 fw-bold" href="{{ route('index.aboutUs') }}">About Us</a></li>
                            <li><a class="dropdown-item fs-5 fw-bold" href="{{ route('index.propOwner') }}">Property Owner</a></li>
                            <li><a class="dropdown-item fs-5 fw-bold" href="{{ route('index.propManager') }}">Property Manager</a></li>
                            <li><a class="dropdown-item fs-5 fw-bold" href="{{ route('index.bedBugInfo') }}">Bed Bug Information</a></li>
                        </ul>
                        </li>
                        <li class="nav-item ps-2 pe-2">
                        <a class="nav-link fs-5 fw-bold" href="#">Property Manager Register</a>
                        </li>
                        <li class="nav-item ps-2 pe-2">
                        <a class="nav-link fs-5 fw-bold" href="#">Property Register</a>
                        </li>
                        <li class="nav-item ps-2 pe-2">
                        <a class="nav-link fs-5 fw-bold" href="#">Documents</a>
                        </li>
                        <li class="nav-item ps-2 pe-2">
                        <a class="nav-link fs-5 fw-bold" href="#">Claims</a>
                        </li>
                    </ul>
                    </div>
                    <div class="col-md-2 col-12 text-end">
                        <a class="btn btn-outline-primary btn-lg" href="{{ route('login') }}">Portal Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

