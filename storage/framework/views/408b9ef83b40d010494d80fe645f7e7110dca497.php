<?php $__env->startSection('contenu'); ?>
<br>
<div class="col-sm-offset-1 col-sm-1">
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-table" aria-hidden="true"></i> <?php echo e("ERP-CH Daily"); ?></h3>
               <div class="btn-group">
                   <?php echo Form::open(['url' => 'erpdaily', 'files' => true]); ?>

                   <br>
                   <button type="submit" class="btn btn-primary">
                       <i class="fa fa-download" aria-hidden="true"></i> Save
                   </button>
                   <?php echo Form::close(); ?>

               </div>
            </div>
             <div class="panel-body">
                <div class="table-responsive">
                    <table id="table-users" class="tablesorter table table-bordered table-hover table-striped" data-sortlist="[[0, 0]]">
                        <thead>
                          <tr>
                            <th class="sorter-metatext" data-column-name=""><?php echo e(("")); ?> <i class="fa fa-sort"></i></th>
                            <th class="sorter-metatext" data-column-name=""><?php echo e(("SITE")); ?> <i class="fa fa-sort"></i></th>
                            <th class="sorter-metatext" data-column-name=""><?php echo e(("EAN1")); ?> <i class="fa fa-sort"></i></th>
                            <th class="sorter-metatext" data-column-name=""><?php echo e(("JOUR")); ?> <i class="fa fa-sort"></i></th>
                            <th class="sorter-metatext" data-column-name=""><?php echo e(("KWH")); ?> <i class="fa fa-sort"></i></th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <tr>
                           <td><?php echo e($loop->iteration); ?></td>
                           <td><?php echo e($user->site); ?></td>
                           <td><?php echo e($user->ean1); ?></td>
                           <td><?php echo e($user->jour); ?></td>
                           <td><?php echo e($user->kwh); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </tbody>
                </div>
             </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>