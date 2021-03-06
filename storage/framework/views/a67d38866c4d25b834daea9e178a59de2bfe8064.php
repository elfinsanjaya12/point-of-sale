

<?php $__env->startSection('content-title', 'Data Penjaga'); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Data Penjaga</li>
  </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
                          <div class="card">
                              <div class="header">
                                  <h4 class="title">Data Penjaga<span class="pull-right"><a href=<?php echo e(route('tambahpenjaga')); ?> class="btn btn-xs btn-fill btn-info">Tambah Penjaga</a></span></h4>
                              </div>
                              <div class="content table-responsive table-full-width">
                                  <?php echo $html->table(['class'=>'table table-striped table-hover']); ?>

                              </div>
                          </div>
                      </div>
                    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <?php echo $html->scripts(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>