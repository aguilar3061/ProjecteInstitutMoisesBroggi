<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/cosmo.bootstrap.min.css') }}">

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" alt="logo" width="60" height="60">
        </a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/') }}">Broggi </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                            Servicio 1
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                            Servicio 2
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="#" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                            Servicio 3
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="#" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>
                    </li>

            </ul>
        </div>
    </nav>


      <div class="container">
        @yield('body')
      </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</html>
