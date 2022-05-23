@extends('layouts.app')

@section('content')

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Dashboard - SB Admin</title>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{asset('admin')}}/css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/features/">
<style>
  .cardcolor {
    background-color: #2c2b02;
    background-image: linear-gradient(120deg, #F9C284, #FAAA4E);
  }
</style>

<body class="sb-nav-fixed text-right">
  <div id="layoutSidenav_content">
    <main>

      <h2 class="pb-2 border-bottom pr-5">Espace admin</h2>
      <div class="container">


        <div class="row" style="margin-top:40px">
          <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3">
              <svg class="bi cardcolor" width="1em" height="1em">
                <use xlink:href="#toggles2"></use>
              </svg>
            </div>
            <h2>Les Annoces</h2>

            <a href="{{route('annonce')}}" class="icon-link d-inline-flex align-items-center">
              plus d'informations
              <svg class="bi " width="1em" height="1em">
                <use xlink:href="{{route('annonce')}}"></use>
              </svg>
            </a>
          </div>
          <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3">
              <svg class="bi cardcolor" width="1em" height="1em">
                <use xlink:href="#people-circle"></use>
              </svg>
            </div>
            <h2>Les clients</h2>

            <a href="{{route('clients')}}" class="icon-link d-inline-flex align-items-center">
              plus d'informations
              <svg class="bi" width="1em" height="1em">
                <use xlink:href="#chevron-right"></use>
              </svg>
            </a>
          </div>

          <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3">
              <svg class="bi cardcolor" width="1em" height="1em">
                <use xlink:href="#collection"></use>
              </svg>
            </div>
            <h2>Les partenaires</h2>

            <a href="{{route('partenaires')}}" class="icon-link d-inline-flex align-items-center">
              plus d'informations
              <svg class="bi" width="1em" height="1em">
                <use xlink:href="#chevron-right"></use>
              </svg>
            </a>
          </div>
        </div>









        <div class="row" style="margin-top:40px">
          <div class="col-xl-12 col-xxl-12 m-t35">
            <div class="card">
              <div class="card-header border-0 flex-wrap pb-0">
                <div class="mb-3">
                  <h4 class="fs-20 text-black">Les annonces</h4>

                </div>
              </div>
              <div class="card-body pb-2 px-3">
                <canvas id="myAreaChart" width="100%" height="40"></canvas>
              </div>
            </div>
          </div>









          <div class="col-xl-12 col-xxl-4">
            <div class="card">
              <div class="card-header border-0 pb-0">
                <h4 class="fs-20 text-black">Les objets</h4>
              </div>
              <div class="card-body pb-0">
                <div id="currentChart" class="current-chart "></div>
                <div class="chart-content">
                  <div class="d-flex justify-content-between mb-2 align-items-center">
                    <div>
                      <svg class="mr-2" width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="15" height="15" rx="7.5" fill="#E9C223"></rect>
                      </svg>
                      <span class="fs-14">Disponible</span>
                    </div>

                  </div>
                  <div class="d-flex justify-content-between mb-2 align-items-center">
                    <div>
                      <svg class="mr-2" width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="15" height="15" rx="7.5" fill="#E1BC95"></rect>
                      </svg>

                      <span class="fs-14">En attente</span>
                    </div>

                  </div>
                  <div class="d-flex justify-content-between mb-2 align-items-center">
                    <div>
                      <svg class="mr-2" width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="15" height="15" rx="7.5" fill="#F58A03"></rect>
                      </svg>
                      <span class="fs-14">Archivé</span>
                    </div>
                  </div>

                  <div class="d-flex justify-content-between mb-2 align-items-center">
                    <div>
                      <svg class="mr-2" width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="15" height="15" rx="7.5" fill="#F76023"></rect>
                      </svg>
                      <span class="fs-14">En location</span>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>







          <div class="row" style="margin-top:40px">



            <div class="col-xl-6 col-xxl-4">
              <div class="card">
                <div class="card-header border-0 pb-0">
                  <h4 class="fs-20 text-black">
                    <i class="fas fa-chart-bar me-1"></i>
                    Les Demandes
                  </h4>
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
              </div>
            </div>




            <div class="col-xl-6 col-xxl-4">
              <div class="card">
                <div class="card-header border-0 pb-0">
                  <h4 class="fs-20 text-black">
                    <i class="fas fa-chart-bar me-1"></i>
                    Les Catégories
                  </h4>
                </div>
                <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
              </div>
            </div>
          </div>

        </div>

    </main>
  </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  </div>
  <script>
    var _ydata = {
      !!json_encode($months) !!
    };
    var _xdata = {
      !!json_encode($monthCount) !!
    };
    var _ydatad = {
      !!json_encode($monthsd) !!
    };
    var _xdatad = {
      !!json_encode($monthCountd) !!
    };
    var _xdatac = {
      !!json_encode($datac) !!
    };

    var _ydatau = {
      !!json_encode($monthsu) !!
    };
    var _xdatau = {
      !!json_encode($monthCountu) !!
    };
 
  </script>

  <script src="{{asset('admin')}}/js/scripts.js"></script>

  <script src="{{asset('admin')}}/assets/demo/chart-area-demo.js"></script>
  <script src="{{asset('admin')}}/assets/demo/chart-bar-demo.js"></script>
  <script src="{{asset('admin')}}/assets/demo/chart-pie-demo.js"></script>
  <script src="{{asset('admin')}}/assets/demo/chart-uti-demo.js"></script>
  <script src="{{asset('admin')}}/assets/demo/demo.js"></script>
  <script src="{{asset('admin')}}/assets/demo/dashboard-1.js"></script>

  <script src="{{asset('admin')}}/js/datatables-simple-demo.js"></script>

  <script src="{{ asset('admin') }}/js/core/jquery.min.js"></script>
  <script src="{{ asset('admin') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('admin') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('admin') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>


  <script src="admin/vendor/chart.js/Chart.bundle.min.js"></script>

  <!-- Chart piety plugin files -->


  <!-- Apex Chart -->
  <script src="admin/vendor/apexchart/apexchart.js"></script>

  <!-- Dashboard 1 -->
  <script src="admin/js/dashboard/dashboard-1.js"></script>



  <script src="admin/js/demo.js"></script>




  <!--  Notifications Plugin    -->


</body>
@endsection