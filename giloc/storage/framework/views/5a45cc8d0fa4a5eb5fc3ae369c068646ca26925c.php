<?php $__env->startSection('head'); ?>
<link href="<?php echo e(asset('css/annoncesList.css')); ?>" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<div class="container  " style="width: 70%;">
  <h2 class="text-right">Voitures</h2>

  <div class="row ">
    <?php if(!is_null($annonces_voiture)): ?>
    <?php $__currentLoopData = $annonces_voiture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annonce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


    <!--debut annonce -->
    <div class="col-sm-4 ">
      <div class="card w-100">
        <?php $img_p=$annonce['images_voiture']
        ?>

        <img src="<?php echo e(asset('/images/partenaireUploads/Voitures/'.$img_p.'')); ?>" class="card-img-top" width="100%">
        <div class="card-body pt-0 px-0">
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h6><?php echo e($annonce['titre']); ?></h6>
          </div>
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h5>Prix</h5>
            <h6><?php echo e($annonce['prix_par_jour']); ?> MAD</h6>
          </div>
          <hr class="mt-2 mx-3">
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Desponible jusqu'a</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0"><?php echo e($annonce['date_disponibilite']); ?></h5>
            </div>
          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">

            <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
            <div class="d-flex flex-column">

              <h5 class="mb-0"><?php echo e($annonce['premium']==1 ? "oui pour :".$annonce['duree_premium'] : "non"); ?> </h5>
            </div>
          </div>

          <div class="d-flex flex-row justify-content-between px-3 pb-0">
            <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0"><?php echo e($annonce['etat']); ?></h5>
            </div>

          </div>

          <div class="mx-3 mt-3 mb-2">
            <div class="d-inline-block w-100">
              <a href="<?php echo e(url('/annonces/voiture_details/'.$annonce['id'].'')); ?>" class="btn btn-primary w-100 mb-2">Voir Annonce</a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <!-- fin -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </div>
  <br>
  <hr style="height:2px;">
  <h2 class="text-right">Motos</h2>
  <div class="row ">
    <?php if(!is_null($annonces_moto)): ?>
    <?php $__currentLoopData = $annonces_moto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annonce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!--debut annonce -->
    <div class="col-sm-4 ">
      <div class="card w-100">
        <?php $img_p=$annonce['images_moto']
        ?>

        <img src="<?php echo e(asset('/images/partenaireUploads/Motos/'.$img_p.'')); ?>" class="card-img-top" width="100%">
        <div class="card-body pt-0 px-0">
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h6><?php echo e($annonce['titre']); ?></h6>
          </div>
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h5>Prix</h5>
            <h6><?php echo e($annonce['prix_par_jour']); ?> MAD</h6>
          </div>
          <hr class="mt-2 mx-3">
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Desponible jusqu'a</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0"><?php echo e($annonce['date_disponibilite']); ?></h5>
            </div>
          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">

            <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
            <div class="d-flex flex-column">

              <h5 class="mb-0"><?php echo e($annonce['premium']==1 ? "oui pour :".$annonce['duree_premium'] : "non"); ?> </h5>
            </div>
          </div>

          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0"><?php echo e($annonce['etat']); ?></h5>
            </div>

          </div>

          <div class="mx-3 mt-3 mb-2">
            <div class="d-inline-block " style="width: 100%;">
              <a href="<?php echo e(url('/annonces/moto_details/'.$annonce['id'].'')); ?>" class="btn btn-primary w-100 mb-2">Voir Annonce</a>
            </div>


          </div>

        </div>
      </div>
    </div>

    <!-- fin -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </div>
  <hr style="height:2px;">
  <h2 class="text-right">Vélos</h2>
  <div class="row ">


    <?php if(!is_null($annonces_velo)): ?>
    <?php $__currentLoopData = $annonces_velo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annonce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!--debut annonce -->
    <div class="col-sm-4 ">
      <div class="card w-100">
        <?php $img_p=$annonce['images_velo']
        ?>

        <img src="<?php echo e(asset('/images/partenaireUploads/Vélos/'.$img_p.'')); ?>" class="card-img-top" width="100%">
        <div class="card-body pt-0 px-0">
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h6><?php echo e($annonce['titre']); ?></h6>
          </div>
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h5>Prix</h5>
            <h6><?php echo e($annonce['prix_par_jour']); ?> MAD</h6>
          </div>
          <hr class="mt-2 mx-3">
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Desponible jusqu'a</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0"><?php echo e($annonce['date_disponibilite']); ?></h5>
            </div>
          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">

            <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
            <div class="d-flex flex-column">

              <h5 class="mb-0"><?php echo e($annonce['premium']==1 ? "oui pour :".$annonce['duree_premium'] : "non"); ?> </h5>
            </div>
          </div>

          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0"><?php echo e($annonce['etat']); ?></h5>
            </div>

          </div>

          <div class="mx-3 ">
            <div class="d-inline-block " style="width: 100%;">
              <a href="<?php echo e(url('/annonces/velo_details/'.$annonce['id'].'')); ?>" class="btn btn-primary w-100 mb-2">Voir Annonce</a>
            </div>


          </div>

        </div>
      </div>
    </div>

    <!-- fin -->

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prog web 2\giloc\resources\views/partenaire/annonces.blade.php ENDPATH**/ ?>