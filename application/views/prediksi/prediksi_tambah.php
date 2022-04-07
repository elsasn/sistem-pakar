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
  Input Knowledge Base
  <small>Menu Prediksi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Prediksi</a></li>
    <li class="active">Prediksi Cuaca</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form method="post" action="<?php echo base_url('rule_base/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Suhu Minimal</label>
        <input type="text" class="form-control" id="suhu_min" name="suhu_min" placeholder="">
      </div><div class="form-group">
        <label for="exampleInputEmail1">Suhu Maksimal</label>
        <input type="text" class="form-control" id="suhu_max" name="suhu_max" placeholder="">
      </div><div class="form-group">
        <label for="exampleInputEmail1">Kelembapan Minimal</label>
        <input type="text" class="form-control" id="kelembapan_min" name="kelembapan_min" placeholder="">
      </div><div class="form-group">
        <label for="exampleInputEmail1">Kelembapan Maksimal</label>
        <input type="text" class="form-control" id="kelembapan_max" name="kelembapan_max" placeholder="">
      </div><div class="form-group">
        <label for="exampleInputEmail1">Kecepatan Angin</label>
        <input type="text" class="form-control" id="kec_angin" name="kec_angin" placeholder="">
      </div>
      <div class="form-group">
         <!-- <?php
        print_r($result_kode_arah_angin_pilihan);
        ?>  -->
        <label for="id_kode_arah_angin" class="control-label">ID Kode Arah Angin</label>
        <div class="form-group">
          <select class="form-control" name="id_kode_arah_angin">
            <?php
            foreach($result_kode_arah_angin_pilihan as $row)
            {
            echo '<option value="'.$row['id_kode_arah_angin'].'">'.$row['kode_arah_angin'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Prediksi Cuaca</button>
      <a href="<?php  echo base_url('rule_base') ?>" class="btn btn-danger">Cancel </a>
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