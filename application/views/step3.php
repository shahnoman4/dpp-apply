<form action="<?=site_url('apply/process/'.$current_step)?>" method="post" id="add-form">
	<input type="hidden" name="step" value="<?=$current_step;?>">

	<div class="row">
		<div class="col-12">
			<?php if (!$preschool) : ?>
				<div class="alert alert-danger" role="alert"><?= $this->lang->line('choose_preschool_before'); ?><a href="<?=site_url('apply/step/1')?>"><?= $this->lang->line('click_here'); ?></a><?=$this->lang->line('choose_preschool_after'); ?></div>
			<?php endif;?>
			<h4></h4>
			<fieldset>
				<legend><?= $this->lang->line('parent_full_name'); ?></legend>

				<div class="form-group">
					<label><?= $this->lang->line('child_applicant_who'); ?> <span class="text-danger">*</span></label>
					<div>
				        <select name="parent_guardian_1" id="parent_guardian_1" class="form-control" required onchange="return dataSaved();">
							<option value="">Select Option</option>
					        <option value="parent" <?php if ( $this->meta->find('parent_guardian_1') == 'parent' ) echo 'selected'; ?>><?php echo $this->lang->line('parent'); ?></option>
					        <option value="guardian" <?php if ( $this->meta->find('parent_guardian_1') == 'guardian' ) echo 'selected'; ?>><?php echo $this->lang->line('guardian'); ?></option>
					        
					    </select>
					</div>
			    </div>
				
				<div class="form-group">
					<label><?= $this->lang->line('my_first_name'); ?> <span class="text-danger">*</span></label>
					<input type="text" id="parent_1_first_name" name="parent_1_first_name" class="form-control" required value="<?= $this->meta->find('parent_1_first_name'); ?>" onchange="return dataSaved();"/>
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('my_middle_name'); ?></label>
					<input type="text" name="parent_1_middle_name" class="form-control" value="<?=$this->meta->find('parent_1_middle_name') ?>" onchange="return dataSaved();"/>
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('my_last_name'); ?> <span class="text-danger">*</span></label>
					<input type="text" id="parent_1_last_name" name="parent_1_last_name" class="form-control" required value="<?=$this->meta->find('parent_1_last_name') ?>" onchange="return dataSaved();" />
				</div>
				<div class="form-group">
					<label>My <?= $this->lang->line('my_email'); ?> <span class="text-muted"></span></label>
					<input type="email" id="parent_1_email" name="parent_1_email" class="form-control" value="<?php if ($this->session->userdata('email')) { echo $this->session->userdata('email'); }else { echo $this->meta->find('parent_1_email'); } ?>" <?php if ($this->session->userdata('email')) { echo 'disabled'; } ?> onchange="return dataSaved();"/>
				</div>
				<div class="form-group row">
					<div class="col-12">
						<label><?= $this->lang->line('my_work_telephone'); ?> <span class="text-muted"></span></label>
						<input type="text" id="parent_1_telephone" name="parent_1_telephone" class="form-control phone-input" value="<?php if ($this->session->userdata('phone')) { echo $this->session->userdata('phone'); }else { echo $this->meta->find('parent_1_telephone'); } ?>"  <?php if ($this->session->userdata('phone')) echo 'disabled'; ?> onchange="return dataSaved();" />
					</div>
				</div>
			
			</fieldset>

			<hr>
            <legend><?= $this->lang->line('add_second_parent'); ?></legend>
            <p><?= $this->lang->line('child_has_second_parent'); ?></p>
			<fieldset>

				<div class="form-group">
					<label><?= $this->lang->line('parent_2'); ?>      <span
							class="text-muted" style="margin-left: 5px;">    (<?= $this->lang->line('field_optional'); ?>)</span></label>
					<div>
				        <select name="parent_guardian_2" id="parent_guardian_2" class="form-control" onchange="return dataSaved();">
							<option value="">Select Option</option>
					        <option value="parent" <?php if ( $this->meta->find('parent_guardian_2') == 'parent' ) echo 'selected'; ?>><?php echo $this->lang->line('parent'); ?></option>
					        <option value="guardian" <?php if ( $this->meta->find('parent_guardian_2') == 'guardian' ) echo 'selected'; ?>><?php echo $this->lang->line('guardian'); ?></option>
					        
					    </select>
					</div>
			    </div>

				
				<div class="form-group">
					<label><?= $this->lang->line('first_name'); ?></label>
					<input type="text" name="parent_2_first_name" id="parent_2_first_name" class="form-control" value="<?= $this->meta->find('parent_2_first_name'); ?>" onchange="return dataSaved();" />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('middle_name'); ?></label>
					<input type="text" name="parent_2_middle_name" class="form-control" value="<?= $this->meta->find('parent_2_middle_name'); ?>" onchange="return dataSaved();"/>
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('last_name'); ?></label>
					<input type="text" name="parent_2_last_name" class="form-control" value="<?= $this->meta->find('parent_2_last_name'); ?>" onchange="return dataSaved();"/>
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('my_email'); ?></label>
					<input type="email" name="parent_2_email" class="form-control" value="<?= $this->meta->find('parent_2_email'); ?>" onchange="return dataSaved();" />
				</div>
				<div class="form-group row">
					<div class="col-12">
						<label><?= $this->lang->line('work_telephone'); ?></label>
						<input type="text" name="parent_2_telephone" id="parent_2_telephone" class="form-control phone-input2" value="<?= $this->meta->find('parent_2_telephone'); ?>" onchange="return dataSaved();" />
					</div>
					
				</div>

				

				<!-- <div class="form-group">
					<label><?= $this->lang->line('dpp_send_messages'); ?> <span
							class="text-muted"></span></label>
					<div>
				        <select name="parent_2_dpp_send_messages" id="parent_2_dpp_send_messages" class="form-control" required>
							<option value="">Select Option</option>
					        <option value="yes" <?php if ( $this->meta->find('parent_2_dpp_send_messages') == 'yes' ) echo 'selected'; ?>><?php echo $this->lang->line('yes'); ?></option>
					        <option value="no" <?php if ( $this->meta->find('parent_2_dpp_send_messages') == 'no' ) echo 'selected'; ?>><?php echo $this->lang->line('no'); ?></option>
					        
					    </select>
					</div>
			    </div> -->

				
			</fieldset>


			<div class="form-group text-center" style="width:100%">
				<input type="submit" class="btn btn-primary" value="<?= $this->lang->line('button_save_continue'); ?>" />
				<br>
				<br>
		        <a href="<?=site_url('apply/step/2')?>" class="btn btn-secondary"><?= $this->lang->line('button_previous'); ?></a>
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
<script>



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

$(document).ready(function(){
$("#parent_2_first_name").keyup(function(){
  	var first_name = $('#parent_2_first_name').val();
    if(first_name!=""){
    	$('#parent_guardian_2').val('parent');
    }
});		
		// var cleave = new Cleave('.phone-input', {
		// 	phone: true,
		// 	phoneRegionCode: 'us'
		// });
		// var cleave2 = new Cleave('.phone-input2', {
		// 	phone: true,
		// 	phoneRegionCode: 'us'
		// });

		var v = $("form").validate({
			
		})

		$("#parent_1_first_name").blur(function(){
			v.element("#parent_1_first_name");
		})

		$("#parent_1_last_name").blur(function(){
			v.element("#parent_1_last_name");
		})

		$("#parent_1_email").blur(function(){
			v.element("#parent_1_email");
		})

		$("#parent_1_telephone").blur(function(){
			v.element("#parent_1_telephone");
		})
		
		$("#parent_1_telephone").keydown(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            var curchr = this.value.length;
			var curval = $(this).val();
			
			if (curchr == 0 && e.which != 8 && e.which != 0) {
				$(this).val("(" + curval);
			} else if( curchr == 4  && e.which != 8 && e.which != 0 ){
				$(this).val( curval + ") " );
			}

            if (curchr == 9 && e.which != 8 && e.which != 0) {
                $(this).val(curval + "-");
			}
			
            $(this).attr('maxlength', '14');
		});
		
		$("#parent_2_telephone").keydown(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            var curchr = this.value.length;
			var curval = $(this).val();
			
			if (curchr == 0 && e.which != 8 && e.which != 0) {
				$(this).val("(" + curval);
			} else if( curchr == 4  && e.which != 8 && e.which != 0 ){
				$(this).val( curval + ") " );
			}

            if (curchr == 9 && e.which != 8 && e.which != 0) {
                $(this).val(curval + "-");
			}
			
            $(this).attr('maxlength', '14');
        });
	});
</script>