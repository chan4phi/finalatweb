<?php echo form_open('laporani/getdata',array('id'=>'lapori_list','target'=>'_blank')); ?>
		
	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">Tgl Sewa</label>
		<div class="col-sm-10 row">
			<div class="col-sm-4 ">
				<input type="date" name="TgglStart" class="form-control">
			</div>Tggl Pembayaran
			<div class="col-sm-4">
				<input type="date" name="TgglBayar" class="form-control">
			</div>
		</div>
	</div>
	
	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">&nbsp;</label>
		<div class="col-sm-10">
			<button type="button" id="btn_proses" class="btn btn-primary" >Proses Data</button>
			<button type="submit" class="btn btn-info" >Print to Excel</button>
		</div>
	</div>
<?php echo form_close(); ?>

<div class="row">
	<div id="laporiList"></div>
</div>

<script>
$(document).ready(function(){
	
	$('#btn_proses').click(function(){
		$.ajax({
			url:'<?php echo site_url('laporani/getdata'); ?>',
			data:$('#lapori_list').serialize(),
			dataType:'html',
			type:'POST',
			beforeSend:function(){
				$('#laporiList').html('Loading...');
			},
			success:function(res){
				$('#laporiList').html(res);
			}
		});
	});

	
});
</script>