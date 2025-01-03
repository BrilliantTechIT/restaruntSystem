
<!doctype html>
<html lang="en">

<head>
    <link href="//db.onlinewebfonts.com/c/465b1cbe35b5ca0de556720c955abece?family=AbolitionW00-Regular" rel="stylesheet"
        type="text/css" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/linearicons.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="stylesheet" href=""
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="css/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="{{asset('css/fixed.css')}}">
    <link rel="stylesheet" href="{{asset('css/button.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Foodilite</title>
    @livewireStyles

</head>



<body data-aos-easing="ease-out-back" data-aos-duration="1500" data-aos-delay="0">
    <div class="se-pre-con"></div>

    <nav class="navbar navbar-expand-md navbar-dark position-sticky-top fixed-top">
        <div class="canvas-area">
            <div class="head1">
                <a class="navbar-logo" href="#">Brilliant Tech </a></div>
            <div class="flot">
                <button class="navbar-toggler" type="button " style="float: right" data-toggle="collapse"
                    data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon "></span>
                </button>
            </div>

            <div class="collapse navbar-collapse text-right" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/Category" wire:navigate>الاصناف الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/subCategory" wire:navigate>الاصناف الفرعية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product" wire:navigate>المنتجات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Offers" wire:navigate>العروض</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/sales" wire:navigate>المبيعات</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/Discounts" wire:navigate>نسبة التخفيظ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">
                            <p>name</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

   

    {{$slot}}



    <!----------End Cuisines---------->
  


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('js/scrollbar.js')}}"></script>


    <script>
        AOS.init({
            easing: 'ease-out-back',
            duration: '1200'
        });
    </script>
    <script>
        mybutton = document.getElementByClassName("navbar");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 20) {
                navbar.style.opacity = "0.1";
            } else {
                navbar.style.opacity = "0.85";
            }
        }
    </script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>


    <script>
        ScrollReveal({
            duration: 1000
        })
    </script>

    <script>
        ScrollReveal().reveal('.tagline', {
            delay: 500
        })
        ScrollReveal().reveal('.punchline', {
            delay: 2000
        })
    </script>

    <script>
        // GENERAL SETTING
        window.sr = ScrollReveal({
            reset: true
        });

        // Custom Settings
        sr.reveal('.foo-1', {
            duration: 200
        });

        sr.reveal('.foo-2', {
            origin: 'right',
            duration: 500
        });

        sr.reveal('.foo-3', {
            rotate: {
                x: 100,
                y: 100,
                z: 0
            },
            duration: 1000
        });

        sr.reveal('.foo-4', {
            viewFactor: 0.3
        });

        sr.reveal('.foo-5', {
            duration: 200
        });
    </script>
    <script>
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    @livewireScripts


</body>

</html>