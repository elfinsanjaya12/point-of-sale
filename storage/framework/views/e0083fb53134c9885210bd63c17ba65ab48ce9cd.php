

<?php $__env->startSection('content-title', 'Laporan Penjualan'); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Laporan Penjualan</li>
  </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
                          <div class="card">
                              <div class="header">
                                  <h4 class="title">Laporan Penjualan<span class="pull-right"></span></h4>
                              </div>
                              <div class="content table-responsive table-full-width">
                                <div class="col-md-12">
                                  <form class="form-inline" action="<?php echo e(Auth::user()->hasRole('penjaga') ? route('lihatlaporanpenjualan') : route('lihatlaporanpenjualanpm')); ?>">
                                    <div class="form-group">
                                      <label for="">Tanggal&nbsp;:&nbsp;</label>
                                      <input type="date" class="form-control input-sm" id="tanggalawal" name="tanggalawal" placeholder="Contoh: 20/01/2017">
                                    </div>
                                    <i class="fa fa-arrows-h fa-lg"></i>
                                    <div class="form-group">
                                      <input type="date" class="form-control input-sm" id="tanggalakhir" name="tanggalakhir" placeholder="Contoh: 20/01/2017">
                                    </div>&nbsp;
                                    <button type="submit" class="btn btn-success btn-fill btn-sm">Tampilkan</button>
                                  </form>
                                </div>
                                  
                                  <table class="table table-striped table-hover">
                                    <thead>                                      
                                      <th class="text-center">Nomor</th>
                                      <th class="text-center">No. Penjualan</th>
                                      <th class="text-center">Nama Penjaga</th>
                                      <th class="text-center">Tanggal</th>
                                      <!-- <th class="text-center">Pelanggan</th> -->
                                      <th class="text-center">Total Harga Jual</th>
                                      <th class="text-center">Jumlah bayar</th>
                                      <th class="text-center">Kembalian</th> 
                                    </thead>
                                  </table>
                              </div>
                          </div>
                      </div>
                    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
var today = new Date();
document.getElementById('tanggalawal').value =  today.toISOString().substr(0, 10);
document.getElementById('tanggalakhir').value =  today.toISOString().substr(0, 10);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>