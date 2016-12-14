<?php $__env->startSection('contenu'); ?>  

<section id="work"> 
    <div class="container">
        <div class="row">
            <br><br><br><br>
            <img class="center-block img-responsive" src="<?php echo e(asset('/images/REW.jpg')); ?>">
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>