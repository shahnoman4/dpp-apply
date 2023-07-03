<form action="<?=site_url('apply/process/'.$current_step)?>" method="post" id="add-form">
	<input type="hidden" name="step" value="<?=$current_step;?>">

	<div class="row">
	
		<div class="col-12">
			<?php if (!$preschool) : ?>
				<div class="alert alert-danger" role="alert"><?= $this->lang->line('choose_preschool_before'); ?><a href="<?=site_url('apply/step/1')?>"><?= $this->lang->line('click_here'); ?></a><?=$this->lang->line('choose_preschool_after'); ?></div>
			<?php endif;?>
			<fieldset>
				<legend><?= $this->lang->line('how_did_you_hear'); ?> <span class="text-danger">*</span></legend>
				
				<div class="form-group">
					<h6></h6>

					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="brochure" id="option1" autocomplete="on" <?php if ( in_array( 'brochure', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?>  onchange="return dataSaved();">
						<label class="form-check-label" for="option1">
							&nbsp;<?= $this->lang->line('hear_option_1'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="postcard" id="option2" autocomplete="on" <?php  if ( in_array( 'postcard', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();"> 
						<label class="form-check-label" for="option2">
							&nbsp;<?= $this->lang->line('hear_option_2'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="showcase" id="option3" autocomplete="on" <?php  if ( in_array( 'showcase', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();"> 
						<label class="form-check-label" for="option3">
							&nbsp;<?= $this->lang->line('hear_option_3'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="community" id="option4" autocomplete="on" <?php  if ( in_array( 'community', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();"> 
						<label class="form-check-label" for="option4">
							&nbsp;<?= $this->lang->line('hear_option_4'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="friend" id="option5" autocomplete="on" <?php  if ( in_array( 'friend', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();">
						<label class="form-check-label" for="option5">
							&nbsp;<?= $this->lang->line('hear_option_5'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="staff" id="option6" autocomplete="on" <?php  if ( in_array( 'staff', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();"> 
						<label class="form-check-label" for="option6">
							&nbsp;<?= $this->lang->line('hear_option_6'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="ad" id="option7" autocomplete="on" <?php  if ( in_array( 'ad', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();"> 
						<label class="form-check-label" for="option7">
							&nbsp;<?= $this->lang->line('hear_option_7'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="search" id="option8" autocomplete="on" <?php  if ( in_array( 'search', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();">
						<label class="form-check-label" for="option8">
							&nbsp;<?= $this->lang->line('hear_option_8'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="print" id="option9" autocomplete="on" <?php  if ( in_array( 'print', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();">
						<label class="form-check-label" for="option9">
							&nbsp;<?= $this->lang->line('hear_option_9'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="radio" id="option10" autocomplete="on" <?php  if ( in_array( 'radio', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();"> 
						<label class="form-check-label" for="option10">
							&nbsp;<?= $this->lang->line('hear_option_10'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="sign" id="option11" autocomplete="on" <?php  if ( in_array( 'sign', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();">
						<label class="form-check-label" for="option11">
							&nbsp;<?= $this->lang->line('hear_option_11'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="social" id="option12" autocomplete="on" <?php  if ( in_array( 'social', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();"> 
						<label class="form-check-label" for="option12">
							&nbsp;<?= $this->lang->line('hear_option_12'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="tv" id="option13" autocomplete="on" <?php  if ( in_array( 'tv', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();">
						<label class="form-check-label" for="option13">
							&nbsp;<?= $this->lang->line('hear_option_13'); ?>
						</label>
					</div>
					
					<div class="form-check">
						<input type="checkbox" class="form-check-input hear_dpp" name="hear_dpp[]" value="other" id="option14" autocomplete="on" <?php  if ( in_array( 'other', $this->meta->find('hear_dpp', array()) ) ) echo 'checked'; ?> onchange="return dataSaved();">
						<label class="form-check-label" for="option14">
							&nbsp;<?= $this->lang->line('hear_option_14'); ?>
						</label>
						<input type="text" name="hear_dppother_text" class="form-control option14_other" value="<?= $this->meta->find('hear_dppother_text') ?>" style="display: none;" onchange="return dataSaved();"/>
					</div>
					<label  class="hear_dpp_error" style="color: red;"></label>
				</div>

			</fieldset>

			<hr>

			<fieldset>
				<legend></legend>
				<div class="form-group">
					<label><?= $this->lang->line('use_dpp_resources'); ?> <span class="text-danger">*</span></label>
					<div>
				        <select name="use_dpp_resources" id="use_dpp_resources" class="form-control" required onchange="return dataSaved();">
							<option value="">Select Option</option>
					        <option value="yes" <?php if ( $this->meta->find('use_dpp_resources') == 'yes' ) echo 'selected'; ?>><?php echo $this->lang->line('yes'); ?></option>
					        <option value="no" <?php if ( $this->meta->find('use_dpp_resources') == 'no' ) echo 'selected'; ?>><?php echo $this->lang->line('no'); ?></option>
					        
					    </select>
					</div>
			    </div>

				
			</fieldset>

			<div class="form-group text-center" style="width:100%">
				<input type="submit" class="btn btn-primary" value="<?= $this->lang->line('button_save_continue'); ?>" id="checkBtn" />
				<br>
				<br>
		        <a href="<?=site_url('apply/step/6')?>" class="btn btn-secondary"><?= $this->lang->line('button_previous'); ?></a>
			</div>
			
		</div>
	
	</div>
</form>
<style type="text/css">
.btn-secondary {
    color: #333;
    background-color: #ccc;
    border-color: #ccc;
}	
</style>
<script type="text/javascript">
function dataSaved(){
  //var data = $('#add-form').serializeArray();
  var data = $('#add-form')[0];
  var formData = new FormData(data);
  event.preventDefault();
  $.ajax({
      data: formData,
      type: $('#add-form').attr('method'),
      url: $('#add-form').attr('action'),
      processData: false,
      contentType: false,
      success: function(response)
      {
        // console.log(response);
     
      }
      });
}	
$(document).ready(function () {
    $('#checkBtn').click(function() {
		var hear_dpp = document.getElementsByClassName( 'hear_dpp' );
		var hear_dppisChecked = false;
		    for (var i = 0; i < hear_dpp.length; i++) {
		        if ( hear_dpp[i].checked ) {
		            hear_dppisChecked = true;
		        };
		    };

		          
		    if (!hear_dppisChecked ) {
		        $(".hear_dpp_error").html('This field is required.');
			      $(".hear_dpp_error").fadeIn('slow', function(){
			        $(".hear_dpp_error").delay(3000).fadeOut(); 
			     }); 
			     var success = $(".hear_dpp_error");
                 scrollTo(success,-100);  
		           return false;
		    }
		    


    });
});

// other
	$('#option14').click(function() {
  if ($(this).is(':checked')) {
     $('.option14_other').val('');
     $('.option14_other').show();
  }else{
  	$('.option14_other').val('');
  	$('.option14_other').hide();
  }
});
</script>