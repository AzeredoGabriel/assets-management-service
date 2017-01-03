<!DOCTYPE html>
<html>

<head>
    
@include('partials.styles.main') 
@include('partials.metas.metas') 

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>AMS</b>.io</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <form action="/login" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Lembre de mim
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
            <a href="password/reset ">Esqueceu a senha ?</a>
            <br>
            <a href="/register/" class="text-center">Ainda não é cadastrado ?</a>
        </div>
        <!-- /.login-box-body -->
    </div>
  @include('partials.scripts.main')
</body>

</html>
