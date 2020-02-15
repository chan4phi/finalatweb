<table id="example" class="display" style="width:100%">
	<thead>
		<tr>
			<th>Booking Receipt</th>			
			<th>Nama Customer</th>
			<th>Jenis Bis</th>
			<th>Tgl Sewa</th>
			<th>Alamat Jemput</th>
			<th>Tujuan</th>
			<th>Harga Sewa</th>
			<th>Overtime/jam</th>
			<th>Terbayar</th>
			<th>Aksi</th>

		</tr>
	</thead>
	<tbody>
	<?php foreach($bayar as $row){ ?>
		<tr>
			<td><?php echo $row->KdBR; ?></td>
			<td><?php echo $row->NamaCustomer; ?></td>
			<td><?php echo $row->Jenis; ?></td>
			<td><?php echo $row->TgglStart; ?></td>
			<td><?php echo $row->AlmtJemput; ?></td>
			<td><?php echo $row->Tujuan; ?></td>
			<td><?php echo number_format($row->HargaSewa); ?></td>
			<td><?php echo number_format($row->Overtime); ?></td>
			<td><?php echo number_format($row->Terbayar); ?></td>
			<td><?php echo anchor("Pembayaran/edit/".$row->KdBR,'<button type="button" class="btn btn-primary">Edit</button>'); ?>
</td>

		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
		<th>Booking Order</th>
			<th>Nama Customer</th>	
			<th>Jenis Bis</th>
			<th>Tgl Sewa</th>
			<th>Alamat Jemput</th>
			<th>Tujuan</th>
			<th>Harga Sewa</th>
			<th>Overtime/jam</th>
			<th>Terbayar</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>

<script>
$(document).ready(function() {
    var table = $('#example').DataTable();
} );
</script>