<table class="zui-table" >
   
	<thead>
		<tr>
			<th>Surat Jalan</th>
			<th>Nama Customer</th>
			<th>Jenis</th>
			<th>Tgl Sewa</th>
			<th>Tgl Finish</th>
			<th>Alamat Jemput</th>
		

		</tr>
	</thead>
	<tbody>
	<?php foreach($antar as $row){ ?>
		<tr>
			<td><?php echo $row->KdSJ; ?></td>
			<td><?php echo $row->NamaCustomer; ?></td>
			<td><?php echo $row->Jenis; ?></td>
			<td><?php echo $row->TgglStart; ?></td>
			<td><?php echo $row->TgglFinish; ?></td>
			<td><?php echo $row->AlmtJemput; ?></td>
			
		</tr>
    <?php } ?>
    
    </tbody>
   
</table><br><br><br>
<table class="zui-table" >
   
	<thead>
		<tr>
			
			<th>Tujuan</th>
			<th>Harga Sewa</th>
            <th>Overtime/Jam</th>
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
			
			<td><?php echo $row->Tujuan; ?></td>
			<td><?php echo number_format($row->HargaSewa); ?></td>
			<td><?php echo number_format($row->Overtime); ?></td>
			<td><?php echo number_format($row->Solar); ?></td>
			<td><?php echo number_format($row->Tol); ?></td>	
            <td><?php echo $row->NamaDriver; ?></td>
            <td><?php echo number_format($row->PremiDriver); ?></td>
            <td><?php echo $row->NamaAsisten; ?></td>
            <td><?php echo number_format($row->PremiAsisten); ?></td>
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