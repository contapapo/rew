<?php $__env->startSection('contenu'); ?>
<br>
<div class="col-sm-offset-1 col-sm-8">
  <div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-table" aria-hidden="true"></i> <?php echo e("AMR-TM"); ?></h3>
                    <div class="btn-group">
                    <?php echo Form::open(['url' => 'amr', 'files' => true]); ?>

                    <br>
                    <button type="submit" class="btn btn-primary">
                    <i class="fa fa-download" aria-hidden="true"></i> Save
                    </button>
                    <?php echo Form::close(); ?>

                    </div>
                </div>

                <div class="panel-body">
                  <div class="table-responive ">
                    <table id="table-users" class="tablesorter-green table table-bordered table-hover table-striped" data-sortlist="[[0, 0]]">
                        <thead>
                        <tr>
                         <th class="sorter-metatext" data-column-name=""><?php echo e(("")); ?> <i class="fa fa-sort"></i></th>
                         <th class="sorter-metatext" data-column-name=""><?php echo e(("SITE")); ?> <i class="fa fa-sort"></i></th>
                         <th class="sorter-metatext" data-column-name=""><?php echo e(("SN")); ?> <i class="fa fa-sort"></i></th>
                         <th class="sorter-metatext" data-column-name=""><?php echo e(("CET(MAX)")); ?> <i class="fa fa-sort"></i></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                         <td><?php echo e($loop->iteration); ?></td>
                         <td><?php echo e($user->site); ?></td>
                         <td><?php echo e($user->sn); ?></td>
                         <td><?php echo e($user->cet); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>