<div class="container">
<table class="table" id="bis">
	<thead class="thead-dark">
		<tr>
		  
		  <th scope="col">#</th>
		  <th scope="col">Bis ID</th>
		  <th scope="col">Nomor Plat</th>
		  <th scope="col">Jenis</th>
		  <th scope="col">Karoseri</th>
		  
		  <th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $no =1; foreach($list_bis as $row){ ?>
		<tr>
		  
		  <th scope="row"><?php echo $no; ?></th>
		  <td><?php echo $row->BisID; ?></td>
		  <td><?php echo $row->NoPol; ?></td>
		  <td><?php echo $row->Jenis; ?></td>
		  <td><?php echo $row->Karoseri; ?></td>
		  
		  <td width="165px">
						
			<?php echo anchor("bis/form/".$row->BisID,'<button type="button" class="btn btn-primary">Edit</button>'); ?>
			
			| <?php echo anchor("bis/delete/".$row->BisID,'<button onclick="return confirm(`Yakin data ini akan dihapus? `)" type="button" class="btn btn-danger">Delete</button>'); ?>
			
		  </td>
		</tr>
	<?php $no++; } ?>
	
		
	</tbody>
	
</table>
<center>
<form method="post" action="<?php echo base_url(); ?>index.php/bis/form">
		<button class="btn btn-success" type="submit">Tambah Data</button>
	</form>
	</center>
</div>

<script>
$(document).ready(function() {
    $('#bis').DataTable();
} );
</script>