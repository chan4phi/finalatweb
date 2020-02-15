<script src="<?php echo base_url("vendor/DataTables/datatables.min.js"); ?>"></script>

<?php echo form_open('penyewaan/submit',array('id'=>'form_sewa')); ?>
	<fieldset>
		<legend>Informasi Data Operator</legend>
				
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Nama Operator</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" readonly name="NamaPengguna" value="<?php echo $this->session->userdata('NamaPengguna'); ?>">
			</div>
		</div>
		
	</fieldset>
	
	<fieldset>
		<legend>Informasi Data Customer</legend>
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Customer Id</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="text" class="form-control" id="CustomerID" name="CustomerID" readonly>
				  <div class="input-group-append">
					<button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#customerModal">Browse</button>
				  </div>
				</div>
			</div>
		</div>
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Nama Customer</label>
			<div class="col-sm-10">
				<input type="text" readonly class="form-control"  id="CustomerNama" name="CustomerNama">
			</div>
		</div>
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Nomor Telpon</label>
			<div class="col-sm-10">
				<input type="text" readonly class="form-control" id="NoTelp" name="NoTelp">
			</div>
		</div>
	</fieldset>	
	
	<fieldset>
		<legend>Informasi Penyewaan</legend>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Tanggal Sewa</label>
			<div class="col-sm-2">
		
				<input type="date" id="TgglStart"  class="form-control" name="TgglStart">
			</div> TgglFinish &nbsp;
			<div class="col-sm-2">
				<input type="date" id="TgglFinish"  class="form-control" name="TgglFinish">
			</div>
		</div>
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Standby</label>
			<div class="col-sm-2">
				
				<input type="time" id="Standby" class="form-control" name="Standby">
			</div> 	
			<label  class="col-sm-2 col-form-label">Jam Start</label>
			<div class="col-sm-2">
				
				<input type="time" id=JamStart class="form-control" name="JamStart">
			</div> 
			<label  class="col-sm-2 col-form-label">Jam Finish</label>
			<div class="col-sm-2">
				
				<input type="time" id="JamFinish" class="form-control" name="JamFinish">
			</div>
		</div>
		
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Alamat Jemput</label>
			<div class="col-sm-10">
				<textarea  class="form-control" id="AlmtJemput" name="AlmtJemput"></textarea>
			</div>
		</div>
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Tujuan</label>
			<div class="col-sm-10">
				<textarea  class="form-control" id=Tujuan name="Tujuan"></textarea>
			</div>
		</div>
		
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Bis Id</label>
			<div class="col-sm-5">
				<div class="input-group">
					<input type="text" class="form-control" id="BisID" name="BisID" readonly>
				  <div class="input-group-append">
					<button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#bisModal">Browse</button>
				  </div>
				</div>
			</div>
		</div>
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Jenis Bis</label>
			<div class="col-sm-5">
				<input type="text" readonly class="form-control"  id="Jenis" name="Jenis">
			</div>
		</div>

		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Harga Sewa</label>
			<div class="col-sm-2">
				<input type="text" class="form-control"  id="HargaSewa" name="HargaSewa">
			</div>
		</div>

		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Overtime</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="Overtime" name="Overtime">
			</div>
		</div>


		<div style="float:right;padding:10px;">
					
					<button type="button" id="btn_submitData" class="btn btn-secondary">Submit Data</button>
				</div>
	</fieldset>
	
<?php echo form_close(); ?>



<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dialog Informasi Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
			<table id="customerTable" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Select</th>
						<th>ID Customer</th>
						<th>Nama Customer</th>
						<th>Nomor Telpon</th>
					</tr>
				</thead>
				<tbody>

				<?php foreach($customer as $row){ ?>
					<tr>
						<td><button type="button" data-telpon="<?php echo $row->NoTelp; ?>"  data-nama="<?php echo $row->NamaCustomer; ?>" data-id="<?php echo $row->CustomerID; ?>"  class="btnSelect btn btn-primary btn-sm">Select</button></td>
						
						<td><?php echo $row->CustomerID; ?></td>
						<td><?php echo $row->NamaCustomer; ?></td>
						<td><?php echo $row->NoTelp; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="bisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dialog Informasi Bis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<table id="bisTable" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Select</th>
						<th>ID Bis</th>
						<th>Jenis</th>
					</tr>
				</thead>
				<tbody>

				<?php foreach($bis as $row){ ?>
					<tr>
						<td><button type="button"  data-jenis="<?php echo $row->Jenis; ?>" data-id="<?php echo $row->BisID; ?>"  class="btnSelect btn btn-primary btn-sm">Select</button></td>
						<td><?php echo $row->BisID; ?></td>
						<td><?php echo $row->Jenis; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>


$(document).ready(function(){
	var table = $('#customerTable').DataTable();
	$('#customerTable').on('click', '.btnSelect', function() {
		console.log('clicked');
		var id = $(this).data('id');
		var nama = $(this).data('nama');
		var telpon = $(this).data('telpon');

		$('#CustomerID').val(id);
		$('#CustomerNama').val(nama);	
		$('#NoTelp').val(telpon);			
		$('#customerModal').modal('toggle');
	});

	var table = $('#bisTable').DataTable();
	$('#bisTable').on('click', '.btnSelect', function() {
		console.log('clicked');
		var id = $(this).data('id');
		var jenis = $(this).data('jenis');
		
		$('#BisID').val(id);
		$('#Jenis').val(jenis);	
		$('#bisModal').modal('toggle');
		
	});

	$('#btn_submitData').click(function(){
		$.ajax({
			url:"<?php echo site_url('penyewaan/submit'); ?>",
			type:'POST',
			dataType:'json',
			data:$('#form_sewa').serialize(),
			success:function(res){
				alert(res.messages);
				window.location.href = "daftar";
			}
		});
	});
	
});

</script>