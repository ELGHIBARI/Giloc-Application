@extends('layouts.app')
@section('head')
<link href="{{ asset('css/annoncesList.css') }}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

@endsection


@section('content')
<div class="container  ">
<h1>Voiture</h1>

  <div class="row ">

    <!--debut annonce -->
    <div class="col-sm-4 mt-5">
      <div class="card w-100">
        <img src="{{asset('/img/images.jpg')}}" class="card-img-top" width="100%">
        <div class="card-body pt-0 px-0">
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h6>titre de annonce</h6>
          </div>
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h5>Prix/jour</h5>
            <h6>&dollar;22,495&ast;</h6>
          </div>
          <hr class="mt-2 mx-3">
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Desponible jusqu'a</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">11/06</h5>
            </div>
            <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">jusqu'a/non</h5>
            </div>

          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">11/06</h5>
            </div>
            <div class="d-flex flex-column"><span class="text-muted">if en location </span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">jusqu'a 11/06</h5>
            </div>
          </div>

          <div class="mx-3 mt-3 mb-2">
            <div class="d-inline-block " style="width: 49%;">
              <button type="button" class="btn btn-primary w-100 ">Voir les demandes</button>
            </div>
            <div class="d-inline-block " style="width: 49%;">
              <button type="button" class="btn btn-primary w-100">Voir les messages</button>
            </div>

          </div>

        </div>
      </div>
    </div>
    <!-- fin -->
    <!--debut annonce -->
    <div class="col-sm-4 mt-5">
      <div class="card w-100">
        <img src="{{asset('/img/images.jpg')}}" class="card-img-top" width="100%">
        <div class="card-body pt-0 px-0">
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h6>titre de annonce</h6>
          </div>
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h5>Prix/jour</h5>
            <h6>&dollar;22,495&ast;</h6>
          </div>
          <hr class="mt-2 mx-3">
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Desponible jusqu'a</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">11/06</h5>
            </div>
            <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">jusqu'a/non</h5>
            </div>

          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">11/06</h5>
            </div>
            <div class="d-flex flex-column"><span class="text-muted">if en location </span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">jusqu'a 11/06</h5>
            </div>
          </div>

          <div class="mx-3 mt-3 mb-2">
            <div class="d-inline-block " style="width: 49%;">
              <button type="button" class="btn btn-primary w-100 ">Voir les demandes</button>
            </div>
            <div class="d-inline-block " style="width: 49%;">
              <button type="button" class="btn btn-primary w-100">Voir les messages</button>
            </div>

          </div>

        </div>
      </div>
    </div>
    <!-- fin -->
    <!--debut annonce -->
    <div class="col-sm-4 mt-5">
      <div class="card w-100">
        <img src="{{asset('/img/images.jpg')}}" class="card-img-top" width="100%">
        <div class="card-body pt-0 px-0">
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h6>titre de annonce</h6>
          </div>
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h5>Prix/jour</h5>
            <h6>&dollar;22,495&ast;</h6>
          </div>
          <hr class="mt-2 mx-3">
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Desponible jusqu'a</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">11/06</h5>
            </div>
            <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">jusqu'a/non</h5>
            </div>

          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">11/06</h5>
            </div>
            <div class="d-flex flex-column"><span class="text-muted">if en location </span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">jusqu'a 11/06</h5>
            </div>
          </div>

          <div class="mx-3 mt-3 mb-2">
            <div class="d-inline-block " style="width: 49%;" >
              <button type="button" class="btn btn-primary w-100 ">Voir les demandes</button>
            </div>
            <div class="d-inline-block " style="width: 49%;" >
              <button type="button" class="btn btn-primary w-100">Voir les messages</button>
            </div>

          </div>

        </div>
      </div>
    </div>
    <!-- fin -->
    
  </div>
  <br>
<hr style="height:2px;">
  <h1>Moto</h1>
<div class="row ">
<!--debut annonce -->
<div class="col-sm-4 mt-5">
  <div class="card w-100">
    <img src="{{asset('/img/images.jpg')}}" class="card-img-top" width="100%">
    <div class="card-body pt-0 px-0">
      <div class="d-flex flex-row justify-content-between mt-3 px-3">
        <h6>titre de annonce</h6>
      </div>
      <div class="d-flex flex-row justify-content-between mt-3 px-3">
        <h5>Prix/jour</h5>
        <h6>&dollar;22,495&ast;</h6>
      </div>
      <hr class="mt-2 mx-3">
      <div class="d-flex flex-row justify-content-between px-3 pb-4">
        <div class="d-flex flex-column"><span class="text-muted">Desponible jusqu'a</span></div>
        <div class="d-flex flex-column">
          <h5 class="mb-0">11/06</h5>
        </div>
        <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
        <div class="d-flex flex-column">
          <h5 class="mb-0">jusqu'a/non</h5>
        </div>

      </div>
      <div class="d-flex flex-row justify-content-between px-3 pb-4">
        <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
        <div class="d-flex flex-column">
          <h5 class="mb-0">11/06</h5>
        </div>
        <div class="d-flex flex-column"><span class="text-muted">if en location </span></div>
        <div class="d-flex flex-column">
          <h5 class="mb-0">jusqu'a 11/06</h5>
        </div>
      </div>

      <div class="mx-3 mt-3 mb-2">
        <div class="d-inline-block " style="width: 49%;" >
          <button type="button" class="btn btn-primary w-100 ">Voir les demandes</button>
        </div>
        <div class="d-inline-block " style="width: 49%;" >
          <button type="button" class="btn btn-primary w-100">Voir les messages</button>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- fin -->

</div> 
<hr style="height:2px;">
  <h1>Voles</h1>
<div class="row ">
<!--debut annonce -->
<div class="col-sm-4 mt-5">
  <div class="card w-100">
    <img src="{{asset('/img/images.jpg')}}" class="card-img-top" width="100%">
    <div class="card-body pt-0 px-0">
      <div class="d-flex flex-row justify-content-between mt-3 px-3">
        <h6>titre de annonce</h6>
      </div>
      <div class="d-flex flex-row justify-content-between mt-3 px-3">
        <h5>Prix/jour</h5>
        <h6>&dollar;22,495&ast;</h6>
      </div>
      <hr class="mt-2 mx-3">
      <div class="d-flex flex-row justify-content-between px-3 pb-4">
        <div class="d-flex flex-column"><span class="text-muted">Desponible jusqu'a</span></div>
        <div class="d-flex flex-column">
          <h5 class="mb-0">11/06</h5>
        </div>
        <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
        <div class="d-flex flex-column">
          <h5 class="mb-0">jusqu'a/non</h5>
        </div>

      </div>
      <div class="d-flex flex-row justify-content-between px-3 pb-4">
        <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
        <div class="d-flex flex-column">
          <h5 class="mb-0">11/06</h5>
        </div>
        <div class="d-flex flex-column"><span class="text-muted">if en location </span></div>
        <div class="d-flex flex-column">
          <h5 class="mb-0">jusqu'a 11/06</h5>
        </div>
      </div>

      <div class="mx-3 mt-3 mb-2">
        <div class="d-inline-block " style="width: 49%;" >
          <button type="button" class="btn btn-primary w-100 ">Voir les demandes</button>
        </div>
        <div class="d-inline-block " style="width: 49%;" >
          <button type="button" class="btn btn-primary w-100">Voir les messages</button>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- fin -->

</div> 
</div>
@endsection