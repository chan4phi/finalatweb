<form class="form-horizontal" method="POST" enctype="multipart/form-data" bgcolor="navy" action="<?php echo site_url("asisten/submit"); ?>">
  <input type="hidden" name="AsistenID" value="<?php echo $asisten[0]->AsistenID; ?>">
  <div class="form-group">
    <label class="control-label col-sm-4">Nama asisten : </label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $asisten[0]->NamaAsisten; ?>" class="form-control" placeholder="Nama asisten" name="NamaAsisten">
    </div>
  </div>
    
  <div class="form-group">
    <label class="control-label col-sm-2">Telpon : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $asisten[0]->NoTelp; ?>" placeholder="Telpon" name="NoTelp">
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
