<div class="row">
	<form id="step8-form" action="<?=site_url('apply/process/'.$current_step)?>" method="post">
		<div class="col-12">
			<?php if (!$preschool) : ?>
				<div class="alert alert-danger" role="alert"><?= $this->lang->line('choose_preschool_before'); ?><a href="<?=site_url('apply/step/1')?>"><?= $this->lang->line('click_here'); ?></a><?=$this->lang->line('choose_preschool_after'); ?></div>
			<?php endif;?>
			<fieldset>
			<div class="form-group text-center" style="width:100%">
				<p>Time to sign the document...</p>
				<input class="btn btn-primary hellosign" value="Click to sign" />
				<input type="hidden" name="hellosign_signature" value="" />
			</div>
			<div class="help-block mb-4">
				<small class="text-muted" style="visibility:hidden;"><?= $this->lang->line('email_phone_use'); ?></small>
			</div>
		</div>
	</form>
</div>
<script nonce="oHf7XRkrvYi6zs9Box5lWbgC" type="text/javascript" src="https://s3.amazonaws.com/cdn.hellosign.com/public/js/hellosign-embedded.LATEST.min.js"></script>
<script type="text/javascript">
    HelloSign.init("<?= $client_id; ?>");
    $(".hellosign").click(function(e){
    	e.preventDefault();
	    HelloSign.open({
	        url: "<?= $sign_url; ?>",     
	        allowCancel: true,
	        messageListener: function(eventData) {
	            console.log(eventData);
	            $('input[name=hellosign_signature]').val(eventData.signature_id);
	            $("#step8-form").submit();
	        }    
	    });
	});
</script>