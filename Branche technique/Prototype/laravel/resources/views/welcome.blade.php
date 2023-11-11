<!DOCTYPE html>
<html lang="en">
{{-- head --}}
@include('layouts.head')
{{-- end head --}}

<body class="login-page" style="min-height: 463.333px;">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>CNMH</b>Prototype</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form method="POST" action="{{ route('login.store') }}">
                    @csrf
                    <div class="input-group mb-0">
                        <input name="email" type="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mt-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="social-auth-links text-center mt-3 mb-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            Se connecter
                        </button>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="forgot-password.html">j'ai oublié mon mot de passe</a>
                </p>

            </div>

        </div>

    </div>
    {{-- scripts --}}
    @include('layouts.script')
    {{-- end scripts --}}
</body>

</html>
