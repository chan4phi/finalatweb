<table id="example" class="display" style="width:100%">
	<thead>
		<tr>
			<th>Surat Jalan</th>			
			<th>Booking Order</th>
			<th>Booking Receipt</th>
			<th>Solar</th>
			<th>Tol</th>
			<th>Premi Driver</th>
			<th>Premi Asisten</th>
			

		</tr>
	</thead>
	<tbody>
	<?php foreach($antar as $row){ ?>
		<tr>
			<td><?php echo $row->KdSJ; ?></td>
			<td><?php echo $row->KdBO; ?></td>
			<td><?php echo $row->KdBR; ?></td>
			<td><?php echo number_format($row->Solar); ?></td>
			<td><?php echo number_format($row->Tol); ?></td>
			<td><?php echo number_format($row->PremiDriver); ?></td>
			<td><?php echo number_format($row->PremiAsisten); ?></td>
		
			</td>

		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>Surat Jalan</th>			
			<th>Booking Order</th>
			<th>Booking Receipt</th>
			<th>Solar</th>
			<th>Tol</th>
			<th>Premi Driver</th>
			<th>Premi Asisten</th>
	</tfoot>
</table>

<script>
$(document).ready(function() {
    var table = $('#example').DataTable();
} );
</script>