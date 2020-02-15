<?php echo form_open('antar/getdata',array('id'=>'antar_list','target'=>'_blank')); ?>
	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">Customer</label>
		<div class="col-sm-10">
			<select name="CustomerID" class="form-control">
				<option value="0">All Customer</option>
				<?php foreach($customer as $row){ ?>
					<option value="<?php echo $row->CustomerID; ?>"><?php echo $row->CustomerID."-".$row->NamaCustomer; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	
	
	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">Tgl Sewa</label>
		<div class="col-sm-10 row">
			<div class="col-sm-4 ">
				<input type="date" name="TgglStart" class="form-control">
			</div>Dan Tanggal Proses Antar
			<div class="col-sm-4">
				<input type="date" name="TgglFinish" class="form-control">
			</div>
		</div>
	</div>
	
	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">&nbsp;</label>
		<div class="col-sm-10">
			<button type="button" id="btn_proses" class="btn btn-primary" >Proses Data</button>
			<button type="submit" class="btn btn-info" >Print to Pdf</button>
		</div>
	</div>
<?php echo form_close(); ?>

<div class="row">
	<div id="antarList"></div>
</div>

<script>
$(document).ready(function(){
	
	$('#btn_proses').click(function(){
		$.ajax({
			url:'<?php echo site_url('antar/getdata'); ?>',
			data:$('#antar_list').serialize(),
			dataType:'html',
			type:'POST',
			beforeSend:function(){
				$('#antarList').html('Loading...');
			},
			success:function(res){
				$('#antarList').html(res);
			}
		});
	});

	
});
</script>