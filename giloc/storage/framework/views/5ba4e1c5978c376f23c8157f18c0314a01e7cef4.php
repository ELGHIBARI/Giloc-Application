<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right"><?php echo e(__('La liste des demandes')); ?></div>

                <div class="card-body text-right">
                    <div style="overflow-x:auto;">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">Numéro de demande</th>
                                    <th scope="col">Date de début de location</th>
                                    <th scope="col">Date de fin de location</th>
                                    <th scope="col">Annonce Associée</th>
                                    <th scope="col">Véhicule Associée</th>
                                    <th scope="col">Client Interssé</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $demandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class='clickable-row' data-href="<?php echo e(url('demande/details/'.$demande->id.'/'.$demande->client_id .'/'.$demande->id)); ?>">
                                    <td><?php echo e($demande->id); ?></td>
                                    <td><?php echo e($demande->date_debut); ?></td>
                                    <td><?php echo e($demande->date_fin); ?></td>
                                    <td><?php echo e($demande->userAnnonce->titre); ?></td>
                                    <td><?php echo e($demande->userAnnonce->type_vehicule); ?></td>
                                    <td><?php echo e($demande->userDemande->nom_complet); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
            // var id=$(this).data("id");
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prog web 2\giloc\resources\views/partenaire/listedemandes.blade.php ENDPATH**/ ?>