<!doctype html>
<html lang="en" >

<head >
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="./css/style1.css">
    <title>نظام ادارة المطاعم </title>
</head>
<body>
    
    <div data-aos="fade-down" class="container" id="container">
        <div class="form-container sign-in-container">
            <form dir="rtl" method="post" action="{{route('login')}}" name="login">
                @csrf
                <h1 style="padding-bottom: 20px">تسجيل الدخول</h1>
                <input type="email" name="email" placeholder="البريد الالكتروني" required />
                <input type="password" name="password" placeholder="كلمة السر" required/>
                <a href="#">هل نسيت كلمة السر</a>
                <span style="padding-top: 10px"><button>تسجيل الدخول</button></span>
                <p>هل تريد الدعم <a href='https://brilliantechs.com/' style="color:#FF0000;font-weight:bold;">تواصل معنا</a></p>
            </form>
        </div>
</div>

    <div class="landing"> <!---background-->
        <div class="opac">
        </div>
    </div>

    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://brilliantechs.com/">Brilliant tech</a>
        </p>
    </footer>
    <script src="./js/main.js"></script>
</body>
</html>