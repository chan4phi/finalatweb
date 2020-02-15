<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Informasi Penyewaan Bis PT. Putra Tidar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href="<?php echo base_url("vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css");?>" type='text/css'>

<script src="<?php echo base_url("vendor/jquery/jquery-3.4.1.min.js"); ?>"></script>
<script src="<?php echo base_url("vendor/bootstrap-4.3.1-dist/js/bootstrap.js"); ?>"></script>

<link rel='stylesheet' type='text/css' href="<?php echo base_url("vendor/DataTables/datatables.min.css"); ?>">
<script type="text/javascript" src="<?php echo base_url("vendor/DataTables/datatables.min.js"); ?>"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<link rel="stylesheet" href="<?php echo base_url("vendor/css/bootnavbar.css"); ?>">
<script src="<?php echo base_url("vendor/js/bootnavbar.js"); ?>" ></script>
</head>

<body>
  <div id="login">
    <h3 class="text-center text-white pt-5">Login Aplikasi Pemesanan Bis PT.Putra Tidar</h3>
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <?php echo form_open('login'); ?>
            <h3 class="text-center text-info">Login</h3>
              <div class="form-group">
                <label for="username" class="text-info">Username:</label><br>
                <input type="email" name="Email" class="form-control" placeholder="E-mail">
              </div>
              <div class="form-group">
                <label for="password" class="text-info">Password:</label><br>
                <input type="password" name="Password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="submit"  class="btn btn-info btn-md" value="Login">
                <?php echo form_close(); ?>  

                <?php if($this->session->flashdata('message') !=""){ ?>
			          <br>
				        <div class="alert alert-danger" role="alert">
				        <?php echo $this->session->flashdata('message'); ?>
				      </div>
				        <?php } ?>                                      
              </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<style>
body {
  margin: 0;
  padding: 0;
  background-image: url("<?php echo base_url(); ?>/assets/bis-big.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>