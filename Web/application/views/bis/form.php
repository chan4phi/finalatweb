<form class="form-horizontal" method="POST" enctype="multipart/form-data" bgcolor="navy" action="<?php echo site_url("bis/submit"); ?>">
  <input type="hidden" name="BisID" value="<?php echo $bis[0]->BisID; ?>">
  <div class="form-group">
    <label class="control-label col-sm-4"> Plat Nomor Polisi: </label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $bis[0]->NoPol; ?>" class="form-control" placeholder="Nomor Polisi" name="NoPol">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2">Jenis : </label>
    <div class="col-sm-10">
    <select name="Jenis" class="form-control">
		<?php 
			$tipe = array('Big','Medium');
			
			foreach($tipe as $t){
				if($t == $bis[0]->Jenis )
					echo "<option selected='selected' value='".$t."'>".$t."</option>";
				else
					echo "<option value='".$t."'>".$t."</option>";
			}
		?>
	  </select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2">Karoseri : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $bis[0]->Karoseri; ?>" placeholder="Karoseri" name="Karoseri">
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
