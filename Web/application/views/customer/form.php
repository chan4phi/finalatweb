<form class="form-horizontal" method="POST" enctype="multipart/form-data" bgcolor="navy" action="<?php echo site_url("customer/submit"); ?>">
  <input type="hidden" name="CustomerID" value="<?php echo $customer[0]->CustomerID; ?>">
  <div class="form-group">
    <label class="control-label col-sm-4">Nama Customer : </label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $customer[0]->NamaCustomer; ?>" class="form-control" placeholder="Nama Customer" name="NamaCustomer">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2">Alamat : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  value="<?php echo $customer[0]->Alamat; ?>" placeholder="Alamat" name="Alamat">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2">Telpon : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $customer[0]->NoTelp; ?>" placeholder="Telpon" name="NoTelp">
    </div>
  </div><br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="reset" class="btn btn-danger" >Batal</button>
      <button type="submit" class="btn btn-primary" >Simpan</button>
	  
    </div>
  </div>
</form>
