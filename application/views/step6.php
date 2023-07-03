<form id="step4-form" action="<?=site_url('apply/process/'.$current_step)?>" method="post">
	<input type="hidden" name="step" value="<?=$current_step;?>">

	<div class="row">
		<div class="col-12">
			<?php if (!$preschool) : ?>
				<div class="alert alert-danger" role="alert"><?= $this->lang->line('choose_preschool_before'); ?><a href="<?=site_url('apply/step/1')?>"><?= $this->lang->line('click_here'); ?></a><?=$this->lang->line('choose_preschool_after'); ?></div>
			<?php endif;?>
			<fieldset>
				<legend></legend>
				<p><strong><?= $this->lang->line('dpp_partners'); ?></strong></p>
				<ul>
					<li><?= $this->lang->line('survey_rule_1'); ?></li>
					<li><?= $this->lang->line('survey_rule_2'); ?></li>
					<li><?= $this->lang->line('survey_rule_3'); ?></li>
					<li><?= $this->lang->line('survey_rule_4'); ?></li>
					<li><?= $this->lang->line('survey_rule_5'); ?></li>
					<li><?= $this->lang->line('survey_rule_6'); ?></li>
				</ul>
				<div class="form-group">
					<label><?= $this->lang->line('willingness_question'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
				</div>
			</fieldset>
			<input type="hidden" name="research_study_contact" value="yes" id="research_study_contact" autocomplete="off">
			<div class="form-group text-center" style="width:100%">
				<input type="submit" class="btn btn-secondary step4-submit-btn" id="step4-submit-btn-no" value="<?= $this->lang->line('button_no_continue'); ?>" />&nbsp;
				<input type="submit" class="btn btn-primary step4-submit-btn" id="step4-submit-btn-yes" value="<?= $this->lang->line('button_yes_continue'); ?>" />

				<br>
				<br>
		        <a href="<?=site_url('apply/step/5')?>" class="btn btn-second"><?= $this->lang->line('button_previous'); ?></a>

			</div>
			
		</div>
	
	</div>
</form>
<style type="text/css">
.btn-second {
    color: #333;
    background-color: #ccc;
    border-color: #ccc;
}	
</style>
<script>
$(document).ready(function(){
	$(".step4-submit-btn").click(function(e){
	    e.preventDefault();
		if ($(this).attr('id') == "step4-submit-btn-no"){
			$("#research_study_contact").val('no');
		} else {
			$("#research_study_contact").val('yes');
		}
		$("#step4-form").submit();
	});
});
</script>