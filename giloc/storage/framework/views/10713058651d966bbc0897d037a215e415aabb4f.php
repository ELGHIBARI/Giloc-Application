<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Giloc')); ?></title>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!--- test -->

    <!-- Styles -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">

    <!--<script src="js/adminlte.min.js"></script>-->
    <script src="DataTables/jquery.dataTables.min.js"></script>
    <script src="DataTables/dataTables.bootstrap4.min.js"></script>
    <script src="DataTables/buttons.bootstrap4.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="<?php echo e(asset('css/AdminLTE.min.css')); ?>"> -->
    <link rel="stylesheet" href="<?php echo e(asset('css/DataTables/jquery.dataTables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/DataTables/buttons.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/DataTables/buttons.bootstrap4.min.css')); ?>">

    <style>
        .text-red {
            color: #bc3906;
        }
        .card-header{
            border: 0px solid ; background-color :white;
                   
}

        .navcolor {
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #ffb700, #fad4d4);
        }

        .gradInverse {
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #fad4d4, #ffb700);
        }

        .card{
            border: 0.5px solid #fad4d4; 
        }


            .btn-primary {
                background-color: #FFF;
                color: #bc3906;
                border-color: #bc3906;
                border-radius: 25px;
            }

            .btn-primary:hover,
            .btn-primary:focus,
            .btn-primary:active {
                background-color: #bc3906;
                color: #FFF;
                border-color: #bc3906;
            }
            .btn-trans {
                background-color: Transparent;
                color: #bc3906;
                border-color: Transparent;
                border-radius: 15px;
            }

            .btn-trans:hover,
            .btn-trans:focus,
            .btn-trans:active {
                background-color: Transparent;
                color: #bc3906;
                border-color: #bc3906;
            }
            .btn-warning {
                background-color: #FFF;
                color: #697009;
                border-color: #697009;
                border-radius: 25px;
            }

            .btn-warning:hover,
            .btn-warning:focus,
            .btn-warning:active {
                background-color: #697009;
                color: #FFF;
                border-color: #697009;
            }
            body{
                background-color: #f4f7f6;

            }
            .btn-send {
                background-color: #bc3906;
                color: #FFF;
                border-color: #bc3906;
            }

            .btn-send:hover,
            .btn-send:focus,
            .btn-send:active {
                background-color: #bc3906;
                color: #FFF;
                border-color: #fad4d4;
            }
    </style>
    <?php echo $__env->yieldContent('head'); ?>

</head>

<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navcolor shadow-sm">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                GILOC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->role=="partenaire"): ?>
                    <li>
                        <?php $id=Auth::user()->id
                        ?>
                        <a class="nav-link" href="<?php echo e(url('/annonces/'.$id.'')); ?>">Annonces</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo e(url('/demande/index')); ?>">Demandes</a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                    <?php if(Route::has('login')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('se connecter')); ?></a>
                    </li>
                    <?php endif; ?>

                    <?php if(Route::has('register')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('s\'inscrire')); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php else: ?>
                    <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->role=="partenaire"): ?>
                    <li class="nav-item">
                        <a class="btn btn-trans" href="<?php echo e(url('/annonce/create')); ?>">
                            <i class="fa-solid fa-plus"></i>&nbspannonce
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->nom_complet); ?>

                        </a>

                        <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-right" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\prog web 2\giloc\resources\views/layouts/app.blade.php ENDPATH**/ ?>