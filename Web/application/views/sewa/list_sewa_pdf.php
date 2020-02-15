
<table class="zui-table">
	<thead>
		<tr>
			<th>Booking Order</th>
			<th>ID Customer</th>
			<th>Nama Customer</th>
			<th>ID Bis</th>
			<th>Jenis</th>
			<th>Tgl Sewa</th>
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
		</tr>
	<?php } ?>
	</tbody>
</table>
<table class="zui-table">
	<thead>
		<tr>
			<th>Alamat Jemput</th>
			<th>Tujuan</th>
			<th>Harga Sewa</th>
			<th>Overtime/Jam</th>

		</tr>
	</thead>
	<tbody>
	<?php foreach($sewa as $row){ ?>
		<tr>
			<td><?php echo $row->AlmtJemput; ?></td>
			<td><?php echo $row->Tujuan; ?></td>
			<td><?php echo number_format($row->HargaSewa); ?></td>
			<td><?php echo number_format($row->Overtime); ?></td>

		</tr>
	<?php } ?>
	</tbody>
</table>

<style>
.zui-table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 15px Arial, sans-serif;
}
.zui-table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 12px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 12px;
    text-shadow: 1px 1px 1px #fff;
}

</style>