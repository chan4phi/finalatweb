<script src="<?php echo base_url("vendor/DataTables/datatables.min.js"); ?>"></script>

<?php echo form_open('pembayaran/submit',array('id'=>'form_bayar')); ?>
	<fieldset>
		<legend>Informasi Data Penerima Pembayaran Booking Order</legend>
				
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Nama Penerima</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" readonly name="NamaPengguna" value="<?php echo $this->session->userdata('NamaPengguna'); ?>">
			</div>
		</div>
		
	</fieldset>
	
	<fieldset>
		<legend>Informasi Data Penyewaan</legend>
		
        <div class="form-group row">
		<label  class="col-sm-2 col-form-label">Kode Booking</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="text" class="form-control" id="KdBO" name="KdBO" readonly>
				  <div class="input-group-append">
					<button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#sewaModal">Browse</button>
				  </div>
				</div>
			</div>
		</div>
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Customer Id</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="text" class="form-control" id="CustomerID" name="CustomerID" readonly>
				  
				</div>
			</div>
		</div>
		
	
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Tanggal Sewa</label>
			<div class="col-sm-2">
				<div class="input-group">
				<input type="date" readonly id="TgglStart"  class="form-control" name="TgglStart">
				</div>
			</div> 
			
		</div>
	
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Bis Id</label>
			<div class="col-sm-5">
				<div class="input-group">
					<input type="text" class="form-control" id="BisID" name="BisID" readonly>
				  
				</div>
			</div>
		</div>
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Jenis Bis</label>
			<div class="col-sm-5">
				<div class="input-group">
				<input type="text" readonly class="form-control"  id="Jenis" name="Jenis">
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Harga Sewa</label>
			<div class="col-sm-2">
				<div class="input-group">
				<input type="text" class="form-control" readonly id="HargaSewa" name="HargaSewa">
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Terbayar</label>
			<div class="col-sm-2">
				
				<input type="text" class="form-control" onkeyup="calc()" id="Terbayar" name="Terbayar">
		
			</div>
		</div>

        <div class="form-group row">
			<label  class="col-sm-2 col-form-label">Kurang Bayar</label>
			<div class="col-sm-2">
				<input type="text" readonly class="form-control" id="SisaBayar" name="SisaBayar">
			</div>
		</div>

		<div style="float:right;padding:10px;">
					
					<button type="button" id="btn_submitData" class="btn btn-secondary">Submit Data</button>
				</div>
	</fieldset>
	
<?php echo form_close(); ?>


<!-- Modal -->
<div class="modal fade" id="sewaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dialog Informasi Penyewaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
			<table id="sewaTable" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Select</th>
						<th>Kode Booking</th>
						<th>ID Customer</th>
						<th>Nama Customer</th>
						<th>Tanggal Sewa</th>
						<th>ID Bis</th>
						<th>Jenis</th>
						<th>Harga</th>
					</tr>
				</thead>
				<tbody>

				<?php foreach($sewa as $row){ ?>
					<tr>
						<td><button type="button" 
						data-idsew="<?php echo $row->KdBO; ?>" 
						data-idcus="<?php echo $row->CustomerID; ?>" 
						data-nama="<?php echo $row->NamaCustomer; ?>"
                        data-tggl="<?php echo $row->TgglStart; ?>" 
                        data-idbus="<?php echo $row->BisID; ?>" 
						data-jenis="<?php echo $row->Jenis; ?>" 
						data-harga="<?php echo $row->HargaSewa; ?>" 
						class="btnSelect btn btn-primary btn-sm">Select</button></td>
						</td>

						<td><?php echo $row->KdBO; ?></td>
						<td><?php echo $row->CustomerID; ?></td>
						<td><?php echo $row->NamaCustomer; ?></td>
						<td><?php echo $row->TgglStart; ?></td>
						<td><?php echo $row->BisID; ?></td>
						<td><?php echo $row->Jenis; ?></td>
						<td><?php echo $row->HargaSewa; ?></td>
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

<script type="text/javascript">
	function calc(){
		document.getElementById('SisaBayar').value = parseInt(document.getElementById('HargaSewa').value) - parseInt(document.getElementById('Terbayar').value);
	}
</script>
<script>
$(document).ready(function(){

    var table = $('#sewaTable').DataTable();
  
    $('#sewaTable').on('click', '.btnSelect', function() {
		console.log('clicked');
		var idsew = $(this).data('idsew');
		var idcus = $(this).data('idcus');
		var nama = $(this).data('nama');
		var tggl = $(this).data('tggl');
		var idbus = $(this).data('idbus');
		var jenis = $(this).data('jenis');
		var harga = $(this).data('harga');
		
		$('#KdBO').val(idsew);	
		$('#CustomerID').val(idcus);
		$('#CustomerNama').val(nama);	
		$('#TgglStart').val(tggl);		
		$('#BisID').val(idbus);			
		$('#Jenis').val(jenis);			
		$('#HargaSewa').val(harga);		
		$('#sewaModal').modal('toggle');
		
	});

	$('#btn_submitData').click(function(){
		$.ajax({
			url:"<?php echo site_url('pembayaran/submit'); ?>",
			type:'POST',
			dataType:'json',
			data:$('#form_bayar').serialize(),
			success:function(res){
				alert(res.messages);
				window.location.href = "daftar";
			}
		});
	});
	
});

</script>