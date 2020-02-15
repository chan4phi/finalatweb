<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Informasi Pemesanan Bis PT. Putra Tidar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href="<?php echo base_url("vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css");?>" type='text/css'>

  <script src="<?php echo base_url("vendor/jquery/jquery-3.4.1.min.js"); ?>"></script>
  <script src="<?php echo base_url("vendor/bootstrap-4.3.1-dist/js/bootstrap.js"); ?>"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' type='text/css' href="<?php echo base_url("vendor/DataTables/datatables.min.css"); ?>">
  <script type="text/javascript" src="<?php echo base_url("vendor/DataTables/datatables.min.js"); ?>"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url("vendor/css/bootnavbar.css"); ?>">
<script src="<?php echo base_url("vendor/js/bootnavbar.js"); ?>" ></script>
</head>
<body>
<?php $this->load->view('menu'); ?><br>
<div class="container">
  <div class="card border-primary">
  <div class="card-header"><?php echo $this->uri->segment(1); ?></div>
  <div class="card-body">
    <?php $this->load->view($page); ?>
  </div>
</div>

</div>

</body>
</html> 