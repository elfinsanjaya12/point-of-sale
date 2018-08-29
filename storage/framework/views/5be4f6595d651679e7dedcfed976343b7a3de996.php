 <?php $__env->startSection('content-title', 'Data Transaksi Penjualan'); ?> <?php $__env->startSection('breadcrumb'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Data Transaksi Penjualan</li>
</ol>
<?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
        <h4 class="title">Penjualan<span class="pull-right">&nbsp;<a href="<?php echo e(route('tambahpenjualan')); ?>" class="btn btn-xs btn-fill btn-info">Tambah Transaksi Penjualan</a></span><span class="pull-right"><a href="" class="btn btn-xs btn-fill btn-success"><i class="fa fa-print"></i>Cetak</a></span></h4>
      </div>
      <div class="content table-responsive table-full-width">
        <div class="col-md-12">
          <form class="form-inline" action="<?php echo e(route('lihat_tanggalpenjualan')); ?>">
            <div class="form-group">
              <label for="">Tanggal&nbsp;:&nbsp;</label>
              <input type="date" name="tanggal" class="form-control input-sm" id="tanggal" placeholder="Contoh: 20/01/2017">
            </div>&nbsp;
            <button type="submit" class="btn btn-warning btn-fill btn-sm">Tampilkan</button>
          </form>
        </div>

        <table class="table table-striped table-hover">
          <thead>
            <th>Nomor</th>
            <th>Nota</th>
            <th>Nama Barang</th>
            <th>Nama Penjaga</th>
            <th>Tanggal</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Diskon</th>
            <th>Sub Total</th>
            <th>Total</th>
          </thead>
          <tbody>
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