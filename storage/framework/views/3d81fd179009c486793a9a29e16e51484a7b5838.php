<?php $__env->startSection('content-title', 'Data Transaksi Pembelian'); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Data Transaksi Pembelian</li>
  </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Pembelian<span class="pull-right">&nbsp;<a href="<?php echo e(route('tambahpembelian')); ?>" class="btn btn-xs btn-fill btn-info">Tambah Transaksi Pembelian</a></span><span class="pull-right"><a href="<?php echo e(route('cetakpembelian',$tanggal)); ?>" target="_blank" class="btn btn-xs btn-fill btn-success"><i class="fa fa-print"></i>Cetak</a></span></h4>
            </div>
            <div class="content table-responsive table-full-width">
              <div class="col-md-12">
                <form class="form-inline" action="<?php echo e(route('lihat_tanggalpembelian')); ?>">
                  <div class="form-group">
                    <label for="">Tanggal&nbsp;:&nbsp;</label>
                    <input type="date" class="form-control input-sm" id="tanggal" name="tanggal" placeholder="Contoh: 20/01/2017">
                  </div>&nbsp;
                  <button type="submit" class="btn btn-success btn-fill btn-sm">Tampilkan</button>
                </form>
              </div>
                
                <table class="table table-striped table-hover">
                  <thead>
                    <th>Nomor</th>
                    <th>Kode Pembelian</th>
                    <th>Tanggal</th>
                    <th>Nama Supplier</th>                                      
                    <th>Total Harga</th>
                    <th>Jumlah Bayar</th>
                    <th>Kembalian</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                      $i=1;
                    ?>
                    <?php $__currentLoopData = $pembelians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembelian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($i++); ?></td>
                      <td><?php echo e($pembelian->kode_pembelian); ?></td>
                      <td><?php echo e($pembelian->tanggal); ?></td>
                      <td><?php echo e($pembelian->nama_supplier); ?></td>
                      <td><?php echo e($pembelian->total_harga_beli); ?></td>
                      <td><?php echo e($pembelian->total_bayar); ?></td>
                      <td><?php echo e($pembelian->total_kembalian); ?></td>
                      <td class="text-center"><a target="_blank" href="<?php echo e(route('nota_pembelian',$pembelian->id)); ?>" class="btn btn-xs btn-info btn-fill"><i class="fa fa-print"></i></a>                        
                        </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  var today = new Date();
  document.getElementById('tanggal').value =  today.toISOString().substr(0, 10);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>