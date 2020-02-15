
<table class="zui-table">
    <thead>
    
		<tr>
			<th>Booking Receipt</th>			
			<th>Nama Customer</th>
			<th>Jenis Kendaraan</th>
			<th>Tgl Sewa</th>			
			<th>Tujuan</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach($bayar as $row){ ?>
		<tr>
			<td><?php echo $row->KdBR; ?></td>
			<td><?php echo $row->NamaCustomer; ?></td>
            <td><?php echo $row->Jenis; ?></td>
			<td><?php echo $row->TgglStart; ?></td>
            <td><?php echo $row->Tujuan; ?></td>
			

		</tr>
	<?php } ?>
	</tbody>
</table><br><br><br><br>
<table class="zui-table">
    <thead>
    
		<tr>
			
			<th>Harga Sewa</th>
			<th>Overtime/Jam</th>
			<th>Terbayar</th>
			<th>Kurang Bayar</th>
			<th>Penerima</th>
            

		</tr>
	</thead>
	<tbody>
	<?php foreach($bayar as $row){ ?>
		<tr>
			<td><?php echo number_format($row->HargaSewa); ?></td>
			<td><?php echo number_format($row->Overtime); ?></td>
			<td><?php echo number_format($row->Terbayar); ?></td>
			<td><?php echo number_format($row->SisaBayar); ?></td>
			<td><?php echo $row->Penerima; ?></td>

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
    padding: 15px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 15px;
    text-shadow: 1px 1px 1px #fff;
}

</style>