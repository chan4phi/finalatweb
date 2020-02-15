<script src="<?php echo base_url("vendor/DataTables/datatables.min.js"); ?>"></script>

<?php echo form_open('antar/submit',array('id'=>'form_antarE')); ?>
	<fieldset>
	<input type="hidden" value="<?php echo $antar[0]->KdSJ ; ?>" name='KdSJ'>
		<legend>Petugas Pembuat Surat Jalan</legend>
       
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Nama Staff Operasi</label>
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
					<input type="text" class="form-control" value="<?php echo $antar[0]->KdBO ; ?>" id="KdBO" name="KdBO" readonly>
				  <div class="input-group-append">
					<button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#sewaModal">Browse</button>
				  </div>
				</div>
			</div>
		</div>
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Kode BR Id</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="text" class="form-control" value="<?php echo $antar[0]->KdBR ; ?>" id="KdBR" name="KdBR" readonly>
				  
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Customer Id</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="text" class="form-control" value="<?php echo $antar[0]->CustomerID ; ?>" id="CustomerID" name="CustomerID" readonly>
				  
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Nama Customer</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="text" class="form-control" value="<?php echo $antar[0]->NamaCustomer ; ?>" id="NamaCustomer" name="NamaCustomer" readonly>
				  
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">No Telp</label>
			<div class="col-sm-3">
				<div class="input-group">
					<input type="text" class="form-control" value="<?php echo $antar[0]->NoTelp ; ?>" id="NoTelp" name="NoTelp" readonly>
				  
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Alamat Jemput</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="text" class="form-control" value="<?php echo $antar[0]->AlmtJemput ; ?>" id="AlmtJemput" name="AlmtJemput" readonly>
				  
				</div>
			</div>
		</div>
	
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Tanggal Sewa</label>
			<div class="col-sm-2">
				<div class="input-group">
				<input type="date" readonly id="TgglStart" value="<?php echo $antar[0]->TgglStart ; ?>" class="form-control" name="TgglStart">
				</div>
			</div>  
		</div>	
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Jam Start</label>
			<div class="col-sm-2">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->JamStart ; ?>" readonly id="JamStart" name="JamStart">
				</div>
			</div>	
		</div>	
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Tanggal Finish</label>
			<div class="col-sm-2">
				<div class="input-group">
				<input type="date" readonly id="TgglFinish" value="<?php echo $antar[0]->TgglFinish ; ?>" class="form-control" name="TgglFinish">
				</div>
			</div>  
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Jam Finish</label>
			<div class="col-sm-2">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->JamFinish ; ?>" readonly id="JamFinish" name="JamFinish">
				</div>
			</div>	
		</div>	
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Standby</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" readonly class="form-control" value="<?php echo $antar[0]->Standby ; ?>" id="Standby" name="Standby">
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Overtime</label>
			<div class="col-sm-2">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->Overtime ; ?>" readonly id="Overtime" name="Overtime">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Tujuan</label>
			<div class="col-sm-10">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->Tujuan ; ?>" readonly id="Tujuan" name="Tujuan">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Jenis</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->Jenis ; ?>" readonly id="Jenis" name="Jenis">
				</div>
			</div>
		</div>
	</fieldset>
	
	<fieldset>
	<legend>Data Surat Jalan</legend>
	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">Bis ID</label>
		<div class="col-sm-3">
			<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->BisID ; ?>" id="BisID" name="BisID" readonly>
				<div class="input-group-append">
				<button class="btn btn-outline-primary" type="button"  data-toggle="modal" data-target="#bisModal">Browse</button>
				</div>
			</div>
		</div>
	</div>

		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Nomor Polisi</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->NoPol ; ?>" readonly id="NoPol" name="NoPol">
				</div>
			</div>
		</div>
	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">Driver ID</label>
		<div class="col-sm-3">
			<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->DriverID ; ?>" id="DriverID" name="DriverID" readonly>
				<div class="input-group-append">
				<button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#driverModal">Browse</button>
				</div>
			</div>
		</div>
	</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Nama Driver</label>
			<div class="col-sm-10">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->NamaDriver ; ?>" readonly id="NamaDriver" name="NamaDriver">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Premi Driver</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->PremiDriver ; ?>" id="PremiDriver" name="PremiDriver">
				</div>
			</div>
		</div>
		<div class="form-group row">
		<label  class="col-sm-2 col-form-label">Asisten ID</label>
		<div class="col-sm-3">
			<div class="input-group">
				<input type="text" class="form-control" id="AsistenID" value="<?php echo $antar[0]->AsistenID ; ?>" name="AsistenID" readonly>
				<div class="input-group-append">
				<button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#asistenModal">Browse</button>
				</div>
			</div>
		</div>
	</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Nama Asisten</label>
			<div class="col-sm-10">
				<div class="input-group">
				<input type="text" class="form-control" readonly value="<?php echo $antar[0]->NamaAsisten ; ?>" id="NamaAsisten" name="NamaAsisten">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Premi Asisten</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->PremiAsisten ; ?>" id="PremiAsisten" name="PremiAsisten">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Solar</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->Solar ; ?>" id="Solar" name="Solar">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Tol</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" onkeyup="calc2()" value="<?php echo $antar[0]->Tol ; ?>" class="form-control" id="Tol" name="Tol">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">KM STart</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->KmStart ; ?>" id="KmStart" name="KmStart">
				</div>		
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">KM Finish</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->KmFinish ; ?>" id="KmFinish" name="KmFinish">
				</div>			
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Biaya Overtime</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->BiayaOvertime ; ?>" readonly id="BiayaOvertime" name="BiayaOvertime">
				</div>
				
				
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Durasi Overtime/jam</label>
			<div class="col-sm-1">
				<div class="input-group">
				<input type="number" onkeyup="calc()" step="0.1" id="durasi" name="durasi">
				</div>	
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Kasbon</label>
			<div class="col-sm-3">
				<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $antar[0]->Kasbon ; ?>" value="0" readonly id="Kasbon" name="Kasbon">
				</div>			
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
						<th>Kode BR</th>
						<th>ID Customer</th>
						<th>Nama Customer</th>
						<th>Nomor Telpon</th>
						<th>Alamat Jemput</th>
						<th>Jam Start</th>
						<th>JAm Finish</th>
						<th>Tanggal Sewa</th>
						<th>Tanggal Finish</th>
						<th>Standby</th>
						<th>Overtime/Jam</th>
						<th>Tujuan</th>
						<th>Jenis</th>

					</tr>
				</thead>
				<tbody>

				<?php foreach($antar as $row){ ?>
					<tr>
						<td><button type="button" 
						data-idsew="<?php echo $row->KdBO; ?>" 
						data-idbyr="<?php echo $row->KdBR; ?>" 
						data-idcus="<?php echo $row->CustomerID; ?>" 
						data-nama="<?php echo $row->NamaCustomer; ?>"
						data-notlp="<?php echo $row->NoTelp; ?>"
						data-almt="<?php echo $row->AlmtJemput; ?>"
						data-jams="<?php echo $row->JamStart; ?>"
						data-jamf="<?php echo $row->JamFinish; ?>"
                        data-tggls="<?php echo $row->TgglStart; ?>" 
                        data-tgglf="<?php echo $row->TgglFinish; ?>"                                         
                        data-stb="<?php echo $row->Standby; ?>"                        
                        data-ot="<?php echo $row->Overtime; ?>" 
						data-tuj="<?php echo $row->Tujuan; ?>" 
						data-jns="<?php echo $row->Jenis; ?>" 
                        
					
						class="btnSelect btn btn-primary btn-sm">Select</button></td>
						</td>

						<td><?php echo $row->KdBO; ?></td>
						<td><?php echo $row->KdBR; ?></td>
						<td><?php echo $row->CustomerID; ?></td>
						<td><?php echo $row->NamaCustomer; ?></td>
						<td><?php echo $row->NoTelp; ?></td>
						<td><?php echo $row->AlmtJemput; ?></td>
						<td><?php echo $row->JamStart; ?></td>
						<td><?php echo $row->JamFinish; ?></td>

						<td><?php echo $row->TgglStart; ?></td>						
						<td><?php echo $row->TgglFinish; ?></td>
						<td><?php echo $row->Standby; ?></td>				
						<td><?php echo $row->Overtime; ?></td>
						<td><?php echo $row->Tujuan; ?></td>
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
						<th>Nomor Polisi</th>
					</tr>
				</thead>
				<tbody>

				<?php foreach($bis as $row){ ?>
					<tr>
						<td><button type="button"  
						data-id="<?php echo $row->BisID; ?>" 
						data-jns="<?php echo $row->Jenis; ?>"
						data-npl="<?php echo $row->NoPol; ?>"  
						class="btnSelect btn btn-primary btn-sm">Select</button></td>
						
						<td><?php echo $row->BisID; ?></td>
						<td><?php echo $row->Jenis; ?></td>
						<td><?php echo $row->NoPol; ?></td>
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
<div class="modal fade" id="driverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dialog Informasi Bis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">    
			<table id="driverTable" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Select</th>
						<th>ID Driver</th>
						<th>Nama Driver</th>
					</tr>
				</thead>
				<tbody>

				<?php foreach($driver as $row){ ?>
					<tr>
						<td><button type="button"  
						data-id="<?php echo $row->DriverID; ?>" 
						data-namad="<?php echo $row->NamaDriver; ?>"  
						class="btnSelect btn btn-primary btn-sm">Select</button></td>
						
						<td><?php echo $row->DriverID; ?></td>
						<td><?php echo $row->NamaDriver; ?></td>
					
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
<div class="modal fade" id="asistenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dialog Informasi Bis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">    
			<table id="asistenTable" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Select</th>
						<th>ID Asisten</th>
						<th>Nama Asisten</th>
					</tr>
				</thead>
				<tbody>

				<?php foreach($asisten as $row){ ?>
					<tr>
						<td><button type="button"  
						data-id="<?php echo $row->AsistenID; ?>" 
						data-namaa="<?php echo $row->NamaAsisten; ?>" 
						class="btnSelect btn btn-primary btn-sm">Select</button></td>
						
						<td><?php echo $row->AsistenID; ?></td>
						<td><?php echo $row->NamaAsisten; ?></td>
					
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
function calc(){
	document.getElementById('BiayaOvertime').value = parseInt(document.getElementById('Overtime').value) * parseFloat(document.getElementById('durasi').value);
}
</script>
<script type="text/javascript">
function calc2(){
	document.getElementById('Kasbon').value = parseInt(document.getElementById('Solar').value) + parseInt(document.getElementById('Tol').value) + parseInt(document.getElementById('PremiDriver').value) + parseInt(document.getElementById('PremiAsisten').value);
}
</script>



<script>

$(document).ready(function(){

    var table = $('#sewaTable').DataTable();
    var table = $('#bisTable').DataTable();
    var table = $('#driverTable').DataTable();
    var table = $('#asistenTable').DataTable();
  
    $('#sewaTable').on('click', '.btnSelect', function() {
		console.log('clicked');
		var idsew = $(this).data('idsew');
		var idcus = $(this).data('idcus');
		var idbyr = $(this).data('idbyr');
		var nama = $(this).data('nama');
		var notlp = $(this).data('notlp');
		var almt = $(this).data('almt');
		var jams = $(this).data('jams');
		var jamf = $(this).data('jamf');

		var tggls = $(this).data('tggls');
		var tgglf = $(this).data('tgglf');
		var stb = $(this).data('stb');
		var ot = $(this).data('ot');
		var tuj = $(this).data('tuj');
		var jns = $(this).data('jns');

		
		$('#KdBO').val(idsew);	
		$('#KdBR').val(idbyr);	
		$('#CustomerID').val(idcus);
		$('#NamaCustomer').val(nama);
		$('#NoTelp').val(notlp);
		$('#AlmtJemput').val(almt);
		$('#JamStart').val(jams);
		$('#JamFinish').val(jamf);

		$('#TgglStart').val(tggls);		
		$('#TgglFinish').val(tgglf);			
		$('#Standby').val(stb);			
		$('#Overtime').val(ot);	
		$('#Tujuan').val(tuj);	
		$('#Jenis1').val(jns);	


		$('#sewaModal').modal('toggle');
		
	});

	$('#bisTable').on('click', '.btnSelect', function() {
		console.log('clicked');
		var id = $(this).data('id');
		var jns = $(this).data('jns');
		var npl = $(this).data('npl');
		
		$('#BisID').val(id);
		$('#NoPol').val(npl);	
	
		$('#bisModal').modal('toggle');
		
	});
	
	$('#driverTable').on('click', '.btnSelect', function() {
		console.log('clicked');
		var id = $(this).data('id');
		var namad = $(this).data('namad');
		
		$('#DriverID').val(id);
		$('#NamaDriver').val(namad);	
	
		$('#driverModal').modal('toggle');
		
	});
	
	$('#asistenTable').on('click', '.btnSelect', function() {
		console.log('clicked');
		var id = $(this).data('id');
		var namaa = $(this).data('namaa');
		
		$('#AsistenID').val(id);
		$('#NamaAsisten').val(namaa);	
	
		$('#asistenModal').modal('toggle');
		
	});

	$('#btn_submitData').click(function(){
		$.ajax({
			url:"<?php echo site_url('antar/update'); ?>",
			type:'POST',
			dataType:'json',
			data:$('#form_antarE').serialize(),
			success:function(res){
				alert(res.messages);
				window.location.href = "../daftar";
			}
		});
	});
	
	
});

</script>