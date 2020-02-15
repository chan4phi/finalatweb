<div class="container">
<table class="table" id="customer">
	<thead class="thead-dark">
		<tr>
		  
		  <th scope="col">#</th>
		  <th scope="col">CustomerID</th>
		  <th scope="col">Nama Customer</th>
		  <th scope="col">Alamat</th>
		  <th scope="col">Telpon</th>
		  
		  <th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $no =1; foreach($list_customer as $row){ ?>
		<tr>
		  
		  <th scope="row"><?php echo $no; ?></th>
		  <td><?php echo $row->CustomerID; ?></td>
		  <td><?php echo $row->NamaCustomer; ?></td>
		  <td><?php echo $row->Alamat; ?></td>
		  <td><?php echo $row->NoTelp; ?></td>
		  
		  <td width="165px">
						
			<?php echo anchor("customer/form/".$row->CustomerID,'<button type="button" class="btn btn-primary">Edit</button>'); ?>
			
			| <?php echo anchor("customer/delete/".$row->CustomerID,'<button onclick="return confirm(`Yakin data ini akan dihapus? `)" type="button" class="btn btn-danger">Delete</button>'); ?>
			
		  </td>
		</tr>
	<?php $no++; } ?>
	
		
	</tbody>
	
</table>
<center>
<form method="post" action="<?php echo base_url(); ?>index.php/customer/form">
		<button class="btn btn-success" type="submit">Tambah Data</button>
	</form>
	</center>
</div>

<script>
$(document).ready(function() {
    $('#customer').DataTable();
} );
</script>