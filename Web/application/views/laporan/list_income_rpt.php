<table id="example" class="display" style="width:100%">
	<thead>
		<tr>
			<th>Booking Receipt</th>			
			<th>Boooking Order</th>
			<th>Customer ID</th>
			<th>Nama Customer</th>
			<th>Terbayar</th>
			<th>Harga Sewa</th>
			
			
		</tr>
	</thead>
	<tbody>
	<?php 
	foreach($lapor as $row){ ?>
	
		<tr>
			<td><?php echo $row->KdBR; ?></td>
			<td><?php echo $row->KdBO; ?></td>
			<td><?php echo $row->CustomerID; ?></td>
			<td><?php echo $row->NamaCustomer; ?></td>
			<td><?php echo number_format($row->Terbayar); ?></td>
			<td><?php echo number_format($row->HargaSewa); ?></td>
		
		</tr>
</td>

		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
		<th>Booking Receipt</th>			
			<th>Boooking Order</th>
			<th>Customer ID</th>
			<th>Nama Customer</th>
			<th>Terbayar</th>
			<th>Harga Sewa</th>
			
			
	</tfoot>
</table>

<script>
$(document).ready(function() {
	$('#example').DataTable();
} );
</script>