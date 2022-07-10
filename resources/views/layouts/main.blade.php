<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Photographers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox CSS-->
    <link rel="stylesheet" href="{{ asset('minimal-theme/vendor/glightbox/css/glightbox.min.css') }}">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('minimal-theme/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('minimal-theme/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('minimal-theme/img/favicon.png') }}">
</head>
<body>
{{--@dd($_SERVER)--}}
<div class="sidebar">
    <div class="sidebar-inner d-flex flex-column">
        <div class="px-4 py-5"><a href="{{ route('main.index') }}"><img src="{{ asset('minimal-theme/img/logo.svg') }}" alt="" width="90"></a></div>
        <div class="sidebar-menu-holder flex-grow-1">
            <ul class="sidebar-menu list-unstyled">
                <li class="mb-2 pb-1">
                    @if($_SERVER['REQUEST_URI'] == "/")
                    <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm active" href="{{ route('main.index') }}">Home</a>
                    @else
                    <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm" href="{{ route('main.index') }}">Home</a>
                    @endif
                </li>
                <li class="mb-2 pb-1">
                    @if($_SERVER['REQUEST_URI'] == "/category")
                    <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm active" href="{{ route('main.category.index') }}">Categories</a>
                    @else
                    <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm" href="{{ route('main.category.index') }}">Categories</a>
                    @endif
                </li>
                <li class="mb-2 pb-1">
                    @if($_SERVER['REQUEST_URI'] == "/user")
                    <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm active" href="{{ route('main.user.index') }}">Photographers</a>
                    @else
                    <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm" href="{{ route('main.user.index') }}">Photographers</a>
                    @endif
                </li>
                <li class="mb-2 pb-1">
                    @if($_SERVER['REQUEST_URI'] == "/city")
                    <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm active" href="{{ route('main.city.index') }}">Cities</a>
                    @else
                    <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm" href="{{ route('main.city.index') }}">Cities</a>
                    @endif
                </li>
            </ul>
        </div>
        <div>
            <div class="sidebar-menu-holder flex-grow-1">
                <ul class="sidebar-menu list-unstyled">
                    <li class="mb-2 pb-1">
                        @auth()
                            @if(isset(auth()->user()->role->name) && auth()->user()->role->name == 'Admin')
                                <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm" href="{{ route('admin.main.index') }}">Admin</a>
                                <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm" href="{{ route('profile.main.index') }}">Profile</a>
                            @else
                                <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm" href="{{ route('profile.main.index') }}">Profile</a>
                            @endif
                        @endauth
                        @guest()
                            <a class="sidebar-link h6 text-uppercase letter-spacing-2 fw-bold text-sm" href="{{ route('profile.main.index') }}">Login</a>
                        @endguest
                    </li>
                </ul>
            </div>
            <div class="px-4 py-3">
                <ul class="list-inline list-social mb-3">
                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-linkedin"></i></a></li>
                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-dribbble"></i></a></li>
                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fas fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
<div class="page-holder">
    <div class="px-4 d-block d-lg-none">
        <!-- navbar-->
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light px-0">
                <button class="navbar-toggler navbar-toggler-end text-sm text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg class="svg-icon svg-icon-heavy svg-icon-sm text-dark">
                        <use xlink:href="#menu-hamburger-1"> </use>
                    </svg>
                </button><a class="navbar-brand" href="index.html"><img src="{{ asset('minimal-theme/img/logo.svg') }}" alt="" width="50"></a>
            </nav>
        </header>
    </div>
    @yield('content')
    <footer class="text-muted" style="background: #0d0d0d">
        <div class="bg-dark py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="row text-white">
                            <div class="col-md-6 text-center text-md-start">
                                <p class="text-sm mb-3 mb-md-0"><span class="text-muted">&copy; All rights reserved - Your company.</span></p>
                            </div>
                            <div class="col-md-6 text-center text-md-end">
                                <p class="text-sm mb-0">
                                    <!-- You are completely free to use this template for your personal use or as a work for your client as long as you keep the link at the template footer pointing to our partner and us.-->
                                    <!-- If you would prefer removing the backlink from the theme footer, please purchase the attribution-free license at the theme page at https://bootstrapious.com/attribution-free-license.                            --><span class="text-muted">Template designed by </span><a class="reset-anchor" href="https://bootstrapious.com/p/minimal-bootstrap-creative-portfolio">Bootstrapious</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- JavaScript files-->
<script src="{{ asset('minimal-theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('minimal-theme/vendor/masonry-layout/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('minimal-theme/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('minimal-theme/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="js/front.js"></script>
<script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>
</html>
