<?php
$this->load->view('_partials/header');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('_partials/topbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  Kode Arah Angin
  <small>Tambah Data</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Kode Arah Angin</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form method="post" action="<?php echo base_url('kode_arah_angin/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Kode Arah Angin</label>
        <input type="text" class="form-control" id="id_kode_arah_angin" name="id_kode_arah_angin" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Arah Angin</label>
        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="">
      </div>
      
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('kode_arah_angin') ?>" class="btn btn-danger">Cancel </a>
    </div>
    
  </form>
</div>
  </section><!-- /.content -->
  <?php
  $this->load->view('_partials/js');
  ?>
  <!--tambahkan custom js disini-->
  <?php
  $this->load->view('_partials/footer');
  ?>