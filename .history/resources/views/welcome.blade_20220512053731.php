<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giloc</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0;
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #ffb700, #f3dfb9);
        }

        .navcolor {
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #ffb700, #f3dfb9);
        }
        footer{
            background-image: linear-gradient(120deg, #ffb700, #f3dfb9);

        }
        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .red {
            color: #bc3906;
        }

        .white {
            color: #ffffff;
        }
    </style>
</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg navcolor">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo (2).png') }}" alt="giloc">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if (Route::has('login'))
                @auth
                <li class="nav-item mt-2">
                    <a href="{{ url('/home') }}" class="btn-orange">Home</a>
                </li>
                @else
                <li class="nav-item ml-3 mt-0">
                    <a href="{{ route('login') }}" class="red">Se connecter</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item mt-0">
                    <a href="{{ route('register') }}" class="red">S'inscrire</a>
                </li>
                @endif
                @endauth
            </ul>
            @endif
        </div>
    </nav>
    <section>
        <h2 class="phrase">خدمة التسجيل في المنحة لطلبة القييمين الدينيين</h2>
        <img src="{{ asset('dist/img/banner.jpg') }}">
        <div class="container text-center ">
            <h1 class="mb-5">
                {{-- -----{<span class="titre1">منصة منحة التفوق</span>}----- --}}
                منصة منحة التفوق
            </h1>
            <div class="paragraphe">
                عزيزي الطالب(ة):
                هذه المنصة بوابتك للتسجيل لنيل منحة التفوق لمؤسسة محمد السادس للنهوض بالأعمال الاجتماعية والتي تخول
                للأبناء
                المتفوقين للقيمين الدينيين المنخرطين. تهدف هذه المنصة لتسيير كل ما يخص هذه المنحة، وإطلاع المتفوقين إلى
                جانب
                أعضاء الوحدات الإدارية بمعية العاملين بالمؤسسة على كل الإجراءات والتدابير والمستجدات المتعلقة بمنحة
                التفوق.
            </div>
            <h1 class="mb-5">
                {{-- -----{<span class="titre3"> --}}
                شروط الترشيح
                {{-- </span>}----- --}}
            </h1>
            <div class="paragraphe">
                شروط التسجيل للاستفادة من المنحة المقدمة من طرف مؤسسة محمد السادس : <br /><br /><br />
                <ul class="condition">
                    <li>أن يكون المترشح ابن أو ابنة منخرط أو منخرطة بالمؤسسة</li>
                    <li>أن يكون حاصل على شهادة الباكالوريا لسنة 2021 بمعدل يفوق 15/20</li>
                    <li>أن يكون سن المترشح لا يتعدى 25 سنة في 2021/2022</li>
                    <li>أن يتابع دراسته ما بعد الباكالوريا داخل أرض الوطن.</li>
                </ul>
            </div>
            <h1 class="mb-5">
                {{-- -----{<span class="titre2"> --}}
                قبل الترشح
                {{-- </span>}----- --}}
            </h1>
            <div class="paragraphe">
                مرحبا بكم بمنصة طلب الترشح لمنحة مؤسسة محمد السادس للنهوض بالأعمال الاجتماعية للقيمين الدينيين للموسم
                الدراسي 2020/2021. لتقديم طلبكم ندعوكم لتعبئة استمارة الترشح واتباع المراحل المطلوبة لاستكمال ملفكم.
                مؤسسة
                محمد السادس للنهوض بالأعمال الاجتماعية للقيمين الدينيين تتمنى لكم حظا موفقا في مشواركم الدراسي.
            </div>
        </div>
    </section>
</body>
<footer class="py-2 bg-light footer fixed-bottom ">
    <div class="row">
        <div class="col-md-4 my-auto">
            <center>
                <img src="{{asset('img/output-onlinepngtools.png')}}" width="30" height="30" />
                GIloc@location.com
            </center>
        </div>
        <div class="col-md-4">
            <p class="m-0 text-center text-secondary">© 2021/2022 Copyright:</p>
            <center>GILOC</center>
            <p class="m-0 text-center text-secondary"> Avenue de la Palestine Mhanech I، Tétouan</p>
        </div>
        <div class="col-md-4 my-auto">
            <center>
                <img src="{{asset('img/tele.jpg')}}" width="30" height="30" />
                +212 512345678
            </center>
        </div>
</footer>

</html>