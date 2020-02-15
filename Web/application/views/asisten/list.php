<div class="container">
<table class="table" id="example">
	<thead class="thead-dark">
		<tr>
		  
		  <th scope="col">#</th>
		  <th scope="col">AsistenID</th>
		  <th scope="col">Nama Asisten</th>
		  <th scope="col">Telpon</th>
		  
		  <th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $no =1; foreach($list_asisten as $row){ ?>
		<tr>
		  
		  <th scope="row"><?php echo $no; ?></th>
		  <td><?php echo $row->AsistenID; ?></td>
		  <td><?php echo $row->NamaAsisten; ?></td>
		  <td><?php echo $row->NoTelp; ?></td>
		  
		  <td width="165px">
						
			<?php echo anchor("Asisten/form/".$row->AsistenID,'<button type="button" class="btn btn-primary">Edit</button>'); ?>
			
			| <?php echo anchor("Asisten/delete/".$row->AsistenID,'<button onclick="return confirm(`Yakin data ini akan dihapus? `)" type="button" class="btn btn-danger">Delete</button>'); ?>
			
		  </td>
		</tr>
	<?php $no++; } ?>
	
		
	</tbody>
	
</table>
<center>
<form method="post" action="<?php echo base_url(); ?>index.php/Asisten/form">
		<button class="btn btn-success" type="submit">Tambah Data</button>
	</form>
	</center>
</div>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>