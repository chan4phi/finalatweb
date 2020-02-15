<table id="example" class="display" style="width:100%">
	<thead>
		<tr>
			<th>Booking Order</th>
			<th>ID Customer</th>
			<th>Nama Customer</th>
			<th>ID Bis</th>
			<th>Nama Bis</th>
			<th>Tgl Sewa</th>
			<th>Alamat Jemput</th>
			<th>Tujuan</th>
			<th>Harga Sewa</th>
			<th>Overtime/jam</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($sewa as $row){ ?>
		<tr>
			<td><?php echo $row->KdBO; ?></td>
			<td><?php echo $row->CustomerID; ?></td>
			<td><?php echo $row->NamaCustomer; ?></td>
			<td><?php echo $row->BisID; ?></td>
			<td><?php echo $row->Jenis; ?></td>
			<td><?php echo $row->TgglStart; ?></td>
			<td><?php echo $row->AlmtJemput; ?></td>
			<td><?php echo $row->Tujuan; ?></td>
			<td><?php echo number_format($row->HargaSewa); ?></td>
			<td><?php echo number_format($row->Overtime); ?></td>
			
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
		<th>Booking Order</th>
			<th>ID Customer</th>
			<th>Nama Customer</th>
			<th>ID Bis</th>
			<th>Nama Bis</th>
			<th>Tgl Sewa</th>
			<th>Alamat Jemput</th>
			<th>Tujuan</th>
			<th>Harga Sewa</th>
			<th>Overtime/jam</th>
		</tr>
	</tfoot>
</table>

<script>
$(document).ready(function() {
    var table = $('#example').DataTable();
} );
</script>