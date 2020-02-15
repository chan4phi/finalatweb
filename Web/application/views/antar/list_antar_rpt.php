<table id="example" class="display" style="width:100%">
	<thead>
		<tr>
			<th>Aksi</th>
			<th>Surat Jalan</th>			
			<th>Nama Customer</th>
			<th>Jenis Bis</th>
			<th>Tgl Sewa</th>
			<th>Booking Order</th>
			<th>Tujuan</th>
			<th>Solar</th>
			<th>Tol</th>
			<th>Nama Driver</th>
			<th>Premi Driver</th>
			<th>Nama Asisten</th>
			<th>Premi Asisten</th>
			

		</tr>
	</thead>
	<tbody>
	<?php foreach($antar as $row){ ?>
		<tr>
			<td><?php echo anchor("antar/edit/".$row->KdSJ,'<button type="button" class="btn btn-primary">Edit</button>'); ?>

			<td><?php echo $row->KdSJ; ?></td>
			<td><?php echo $row->NamaCustomer; ?></td>
			<td><?php echo $row->Jenis; ?></td>
			<td><?php echo $row->TgglStart; ?></td>
			<td><?php echo $row->KdBO; ?></td>
			<td><?php echo $row->Tujuan; ?></td>
			<td><?php echo number_format($row->Solar); ?></td>
			<td><?php echo number_format($row->Tol); ?></td>
			<td><?php echo $row->NamaDriver; ?></td>
			<td><?php echo number_format($row->PremiDriver); ?></td>
			<td><?php echo $row->NamaAsisten; ?></td>
			<td><?php echo number_format($row->PremiAsisten); ?></td>
		
			</td>

		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
		<th>Aksi</th>
			<th>Surat Jalan</th>			
			<th>Nama Customer</th>
			<th>Jenis Bis</th>
			<th>Tgl Sewa</th>
			<th>Booking Order</th>
			<th>Tujuan</th>
			<th>Solar</th>
			<th>Tol</th>
			<th>Nama Driver</th>
			<th>Premi Driver</th>
			<th>Nama Asisten</th>
			<th>Premi Asisten</th>
	</tfoot>
</table>

<script>
$(document).ready(function() {
    var table = $('#example').DataTable();
} );
</script>