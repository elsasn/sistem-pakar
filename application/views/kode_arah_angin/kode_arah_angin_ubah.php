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
        Merk
        <small>Ubah Merk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master Data</a></li>
        <li class="active">Merk</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
{result}
    <!-- Default box -->
   <form method="post" action="<?php echo base_url('merk/ubah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Merk</label>
        <input type="text" class="form-control" id="id_merk" name="id_merk" placeholder="" value ="{id_merk}"readonly>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{nama}">
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('merk') ?>" class="btn btn-danger">Cancel </a>
    </div>
    
  </form>
{/result}
</section><!-- /.content -->

<?php 
$this->load->view('_partials/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>