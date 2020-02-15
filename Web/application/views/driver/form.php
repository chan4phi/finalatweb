<form class="form-horizontal" method="POST" enctype="multipart/form-data" bgcolor="navy" action="<?php echo site_url("driver/submit"); ?>">
  <input type="hidden" name="DriverID" value="<?php echo $driver[0]->DriverID; ?>">
  <div class="form-group">
    <label class="control-label col-sm-4">Nama driver : </label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $driver[0]->NamaDriver; ?>" class="form-control" placeholder="Nama driver" name="NamaDriver">
    </div>
  </div>
    
  <div class="form-group">
    <label class="control-label col-sm-2">Telpon : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $driver[0]->NoTelp; ?>" placeholder="Telpon" name="NoTelp">
    </div>
  </div>
  
	<br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="reset" class="btn btn-danger" >Batal</button>
      <button type="submit" class="btn btn-primary" >Simpan</button>
	  
    </div>
  </div>
</form>
