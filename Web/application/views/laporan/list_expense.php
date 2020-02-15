<?php echo form_open('laporane/getdata',array('id'=>'lape_list','target'=>'_blank')); ?>
	
	
	
	<div class="form-group row">
		<label  class="col-sm-2 col-form-label">Tgl Awal</label>
		<div class="col-sm-10 row">
			<div class="col-sm-4 ">
				<input type="date" name="TgglStart" class="form-control">
			</div>Tanggal Akhir
			<div class="col-sm-4">
				<input type="date" name="TgglFinish" class="form-control">
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
	<div id="lapeList"></div>
</div>

<script>
$(document).ready(function(){
	
	$('#btn_proses').click(function(){
		$.ajax({
			url:'<?php echo site_url('laporane/getdata'); ?>',
			data:$('#lape_list').serialize(),
			dataType:'html',
			type:'POST',
			beforeSend:function(){
				$('#lapeList').html('Loading...');
			},
			success:function(res){
				$('#lapeList').html(res);
			}
		});
	});

	
});
</script>