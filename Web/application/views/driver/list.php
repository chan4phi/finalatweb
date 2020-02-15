<div class="container">
<table class="table" id="driver">
	<thead class="thead-dark">
		<tr>
		  
		  <th scope="col">#</th>
		  <th scope="col">DriverID</th>
		  <th scope="col">Nama Driver</th>
		  <th scope="col">Telpon</th>
		  
		  <th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $no =1; foreach($list_driver as $row){ ?>
		<tr>
		  
		  <th scope="row"><?php echo $no; ?></th>
		  <td><?php echo $row->DriverID; ?></td>
		  <td><?php echo $row->NamaDriver; ?></td>
		  <td><?php echo $row->NoTelp; ?></td>
		  
		  <td width="165px">
						
			<?php echo anchor("Driver/form/".$row->DriverID,'<button type="button" class="btn btn-primary">Edit</button>'); ?>
			
			| <?php echo anchor("Driver/delete/".$row->DriverID,'<button onclick="return confirm(`Yakin data ini akan dihapus? `)" type="button" class="btn btn-danger">Delete</button>'); ?>
			
		  </td>
		</tr>
	<?php $no++; } ?>
	
		
	</tbody>
	
</table>
<center>
<form method="post" action="<?php echo base_url(); ?>index.php/Driver/form">
		<button class="btn btn-success" type="submit">Tambah Data</button>
	</form>
	</center>
</div>

<script>
$(document).ready(function() {
    $('#driver').DataTable();
} );
</script>
