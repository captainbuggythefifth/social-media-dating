<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Chat with Humans, Aliens, Animals and Unknowns</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ url()  }}/custom/css/custom.css" type="text/css" />
    <link href="{{ url()  }}/materializecss/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="{{ url()  }}/jCrop/css/jquery.Jcrop.css" type="text/css" />
    <style type="text/css">
        .jcrop-holder #preview-pane {
            display: block;
            position: absolute;
            z-index: 2000;
            top: 10px;
            right: -280px;
            padding: 6px;
            border: 1px rgba(0,0,0,.4) solid;
            background-color: white;

            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;

            -webkit-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
        }

        /* The Javascript code will set the aspect ratio of the crop
           area based on the size of the thumbnail preview,
           specified here */
        #preview-pane .preview-container {
            width: 250px;
            height: 170px;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="navbar-fixed">
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
            @if(Session::has('user'))
                @include('users.layout.loggedinnav')
            @else
                @include('users.layout.nav')
            @endif
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>

@if(!Session::has('user') && isset($sIndex) && $sIndex == true)
    <video autoplay loop poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid">
        <source src="{{ url()  }}/video/polina.webm" type="video/webm">
    </video>
    <div class="container" style="padding-top: 150px">
        <div class="row center">
            <h1 class="header white-text">Chat with Humans, Animals so much more!</h1>
        </div>
        <div class="row center">
            <a class="waves-effect waves-light btn-large modal-trigger" href="#modal-login"><i class="material-icons left">vpn_key</i>Log In</a>
            <a class="waves-effect waves-light btn-large" href="/user/create"><i class="material-icons left">cloud</i>Sign Up</a>
        </div>
    </div>
@endif

@include('users.layout.modals.modal-log-in')
@include('users.layout.modals.modal-comment')
@include('users.layout.modals.modal-character-avatar-preview')
@include('users.layout.modals.modal-edit-character')
@include('users.layout.modals.modal-create-character')
<div class="main-container">
@yield('content')
</div>
@include('users.layout.footer')


<script type="text/javascript">
    var base_url = "{{ url() }}/";
</script>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ url()  }}/materializecss/materialize/js/materialize.js"></script>
<script src="{{ url('/jCrop/js/jquery.Jcrop.js') }}"></script>
{{--<script src="{{ url('/custom/js/custom.js') }}"></script>--}}
<script src="{{ url('/custom/js/users/service.js') }}"></script>
<script src="{{ url('/custom/js/users/core.js') }}"></script>
<script src="{{ url('/custom/js/users/ui.js') }}"></script>
<script src="{{ url('/custom/js/pages/loadfile.js') }}"></script>
</body>
<script>
    var vid = document.getElementById("bgvid"),
            pauseButton = document.getElementById("vidpause");
    function vidFade() {
        vid.classList.add("stopfade");
    }
    vid.addEventListener('ended', function() {
        // only functional if "loop" is removed
        vid.pause();
        // to capture IE10
        vidFade();
    });
    pauseButton.addEventListener("click", function() {
        vid.classList.toggle("stopfade");
        if (vid.paused) {
            vid.play();
            pauseButton.innerHTML = "Pause";
        } else {
            vid.pause();
            pauseButton.innerHTML = "Paused";
        }
    })
</script>
</html>

