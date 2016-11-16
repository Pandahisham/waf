<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WAF</title>

        <!-- Fonts -->
        <link  rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link  rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css')}}">
        
    </head>

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">

                    <a href="{{ url('/login') }}">
                    <i class="fa fa-user fa-2x" style="color:#4adbc4;"aria-hidden="true"></i> <!--icon-->
                    Login</a>
                     
                   <!-- <a href="{{ url('/register') }}">
                    <i class="fa fa-user-plus fa-2x" style="color:#4adbc4;"aria-hidden="true"></i> icon
                    Register</a> > -->
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    WAF
                </div>
            </div>
        </div>
    </body>
</html>
