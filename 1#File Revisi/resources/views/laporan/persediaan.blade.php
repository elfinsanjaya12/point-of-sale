@extends('layouts.app')

@section('content-title', 'Laporan Persediaan')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Laporan Persediaan</li>
  </ol>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="header"> 
              <h4 class="title">Laporan Persediaan<span class="pull-right"><a target="_blank" href={{Auth::user()->hasRole('penjaga') ? route('cetakpersediaan',['awal'=>$awal,'akhir'=>$akhir]) : route('cetakpersediaanpm',['awal'=>$awal,'akhir'=>$akhir])}} class="btn btn-xs btn-fill btn-success"><i class="fa fa-print"></i>Cetak</a></span></h4>
          </div>
          <div class="content table-responsive table-full-width">            
            <div class="col-md-12">                                                                    

              <form class="form-inline" action="{{Auth::user()->hasRole('penjaga') ? route('lihatlaporanpersediaan') : route('lihatlaporanpersediaanpm')}}">
                <div class="form-group">
                  <label for="">Tanggal&nbsp;:&nbsp;</label>
                  <input type="date" class="form-control input-sm" id="tanggalawal" name="tanggalawal" value="{{$awal}}">
                </div>
                <i class="fa fa-arrows-h fa-lg"></i>
                <div class="form-group">
                  <input type="date" class="form-control input-sm" id="tanggalakhir" name="tanggalakhir" value="{{$akhir}}">
                </div>&nbsp;
                <button type="submit" class="btn btn-success btn-fill btn-sm">Tampilkan</button>
              </form>

            </div>
              {{-- {!! $html->table(['class'=>'table table-striped table-hover'])!!} --}}
              <table class="table table-striped table-hover">
                <thead>
                  <th style="text-align: center;">Nomor</th>                  
                  <th style="text-align: left;">Nama Barang</th>                                
                  <th style="text-align: center;">Stok Awal</th>
                  <th style="text-align: center;">Stok Jual</th>
                  <th style="text-align: center;">Sisa Stok</th>
                  <th style="text-align: center;">Harga Jual</th>
                  <th style="text-align: center;">Harga Beli</th>
                </thead>
                @php
                  $i=1;
                @endphp
                @foreach ($persediaans as $persediaan)
                <tr>
                  <td style="text-align: center;">{{$i++}}</td>                  
                  <td>{{$persediaan->nama_barang}}</td>                                                      
                  <td style="text-align: center;">
                      <?php if (!is_null($persediaan->stok_beli)): ?>
                        {{$persediaan->stok_beli}}
                        <?php else: ?>
                          0
                      <?php endif ?>
                  </td>
                  <td style="text-align: center;">
                      <?php if (!is_null($persediaan->stok_jual)): ?>
                        {{$persediaan->stok_jual}}
                        <?php else: ?>
                          0
                      <?php endif ?>
                  </td>
                  <td style="text-align: center;">
                      <?php if (!is_null($persediaan->stok)): ?>
                        {{$persediaan->stok}}
                        <?php else: ?>
                          0
                      <?php endif ?>
                  </td>
                  <td style="text-align: center;">
                      <?php if (!is_null($persediaan->harga_jual)): ?>                        
                        Rp. {{number_format($persediaan->harga_jual,0,',','.')}}
                        <?php else: ?>
                          Rp. 0
                      <?php endif ?>           
                  </td>
                  <td style="text-align: center;">
                      <?php if (!is_null($persediaan->harga_jual)): ?>                        
                        Rp. {{number_format($persediaan->harga_beli,0,',','.')}}
                        <?php else: ?>
                          Rp. 0
                      <?php endif ?>           
                  </td>
                </tr>
              @endforeach
              </table>
          </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="header">
          <h4 class="title">Total</h4>
          <p class="category">Jumlah keseluruhan barang dari data diatas:</p>
        </div>
        <div class="content">
          <table>
            <tr>
              <td>Total Barang :&nbsp;</td>
              <td><b>{{$total}}</b></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
