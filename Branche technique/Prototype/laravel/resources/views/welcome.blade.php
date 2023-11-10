<!DOCTYPE html>
<html lang="en">
{{-- head --}}
@include('layouts.head')
{{-- end head --}}

<body class="login-page" style="min-height: 463.333px;">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>CNMH</b>Prototype</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="../../index3.html" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="{{route('project.index')}}" class="btn btn-block btn-primary">
                        Se connecter
                    </a>
                </div>

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
