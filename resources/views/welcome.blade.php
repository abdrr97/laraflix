<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>FilmeStore Regarder Telecharger et Acheter des Filme et séries Tv en ligne</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/img/FStore.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('/frontend/css/home/custom.min.css') }}">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <style>
        .black_text {
            color: #000;
            background-color: #f3f3f3;
        }

        .blue_text {
            color: #0080ff;
        }

        .main__home {
            height: 100vh;
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-image: url("{{ asset('/frontend/img/ceci.jpg') }}");
        }
    </style>

</head>

<body style="background-color:#0a0a0a">

    <div class="main__home">
        <div style="float: left;">
        </div>
        <div style="float: right;margin: 18px 18px; height: 50px;" class="hidden-xs">
            <a href="/login" class="btn btn-danger">Sign In</a>
        </div>
        <div style="font-size: 70px;font-weight: bold;clear: both;padding: 220px 0px 0px 0px; text-align:center; color: rgb(250, 255, 254);" class="hidden-xs">See What Is Next.
            <div style="font-size: 30px; letter-spacing: .2px; color: rgb(221, 220, 220); font-weight: 400;">
                Watch Anywhere. Cancel Anytime.
            </div>
            <a href="/register" class="btn btn-danger btn-lg" style="padding: 20px 50px; font-size: 30px;">
                Join Free For A Month <i class="fa fa-angle-right" style="margin:0px 0px 0px 20px;"></i>
            </a>
        </div>

    </div>

</body>

</html>
