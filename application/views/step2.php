<?php
	$states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "District of Columbia", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming", "AA - Armed Forces Americas", "AE - Armed Forces Africa", "AE - Armed Forces Canada", "AE - Armed Forces Europe", "AE - Armed Forces Middle East", "AP - Armed Forces Pacific");
?>

<form action="<?=site_url('apply/process/'.$current_step)?>" method="post" id="add-form" enctype="multipart/form-data">
	<div class="row">
	<input type="hidden" name="step" value="<?=$current_step;?>">
		<div class="col-12">
			<?php if (!$preschool) : ?>
				<div class="alert alert-danger" role="alert"><?= $this->lang->line('choose_preschool_before'); ?><a href="<?=site_url('apply/step/1')?>"><?= $this->lang->line('click_here'); ?></a><?=$this->lang->line('choose_preschool_after'); ?></div>
			<?php endif;?>
			<fieldset>
				<legend><?= $this->lang->line('child_full_legal_name'); ?></legend>
				
				<div class="form-group">
					<label><?= $this->lang->line('child_first_name'); ?> <span class="text-danger">*</span></label>
					<input type="text" name="child_first_name" id="child_first_name" class="form-control" required value="<?=$this->meta->find('child_first_name') ?>" data-toggle="tooltip" title="Please type your child’s first name only!" onchange="return dataSaved();"/>
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('child_middle_name'); ?></label>
					<input type="text" name="child_middle_name" class="form-control" value="<?=$this->meta->find('child_middle_name') ?>" onchange="return dataSaved();" />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('child_last_name'); ?> <span class="text-danger">*</span></label>
					<input type="text" name="child_last_name" id="child_middle_name"  class="form-control" required value="<?=$this->meta->find('child_middle_name') ?>" onchange="return dataSaved();" />
				</div>

				<div class="form-group">
					<label><?= $this->lang->line('child_gender'); ?> <span class="text-muted"></span></label>
					<div>
				        <select name="gender" id="gender" class="form-control" required onchange="return dataSaved();">
							<option value="">Select Option</option>
					        <option value="<?php echo $this->lang->line('child_gender_female'); ?>" <?php if ( $this->meta->find('gender') == 'Female' ) echo 'selected'; ?>><?php echo $this->lang->line('child_gender_female'); ?></option>
					        <option value="<?php echo $this->lang->line('child_gender_male'); ?>" <?php if ( $this->meta->find('gender') == 'Male' ) echo 'selected'; ?>><?php echo $this->lang->line('child_gender_male'); ?></option>
					        <option value="<?php echo $this->lang->line('child_gender_other'); ?>" <?php if ( $this->meta->find('gender') == 'Other' ) echo 'selected'; ?>><?php echo $this->lang->line('child_gender_other'); ?></option>
					        <option value="<?php echo $this->lang->line('child_gender_prefer'); ?>" <?php if ( $this->meta->find('gender') == 'Prefer not to say' ) echo 'selected'; ?>><?php echo $this->lang->line('child_gender_prefer'); ?></option>
					    </select>
					</div>
				</div>
				
				
				<div class="form-group">
					<label><?= $this->lang->line('child_dob'); ?> <span class="text-danger">*</span></label>
					<div class="row">
						<div class="col-6">
							<select name="birth_month" class="form-control" onchange="return dataSaved();">
								<option <?php if ( $this->meta->find('birth_month') == '1' ) echo 'selected'; ?> value="1"><?php echo $this->lang->line('month_jan'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '2' ) echo 'selected'; ?> value="2"><?php echo $this->lang->line('month_feb'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '3' ) echo 'selected'; ?> value="3"><?php echo $this->lang->line('month_mar'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '4' ) echo 'selected'; ?> value="4"><?php echo $this->lang->line('month_apr'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '5' ) echo 'selected'; ?> value="5"><?php echo $this->lang->line('month_may'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '6' ) echo 'selected'; ?> value="6"><?php echo $this->lang->line('month_jun'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '7' ) echo 'selected'; ?> value="7"><?php echo $this->lang->line('month_jul'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '8' ) echo 'selected'; ?> value="8"><?php echo $this->lang->line('month_aug'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '9' ) echo 'selected'; ?> value="9"><?php echo $this->lang->line('month_sep'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '10' ) echo 'selected'; ?> value="10"><?php echo $this->lang->line('month_oct'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '11' ) echo 'selected'; ?> value="11"><?php echo $this->lang->line('month_nov'); ?></option>
								<option <?php if ( $this->meta->find('birth_month') == '12' ) echo 'selected'; ?> value="12"><?php echo $this->lang->line('month_dec'); ?></option>
							</select>
						</div>
						<div class="col-3">
							<select name="birth_day" class="form-control" onchange="return dataSaved();">
								<option <?php if ( $this->meta->find('birth_day') == '1' ) echo 'selected'; ?> value="1">01</option>
								<option <?php if ( $this->meta->find('birth_day') == '2' ) echo 'selected'; ?> value="2">02</option>
								<option <?php if ( $this->meta->find('birth_day') == '3' ) echo 'selected'; ?> value="3">03</option>
								<option <?php if ( $this->meta->find('birth_day') == '4' ) echo 'selected'; ?> value="4">04</option>
								<option <?php if ( $this->meta->find('birth_day') == '5' ) echo 'selected'; ?> value="5">05</option>
								<option <?php if ( $this->meta->find('birth_day') == '6' ) echo 'selected'; ?> value="6">06</option>
								<option <?php if ( $this->meta->find('birth_day') == '7' ) echo 'selected'; ?> value="7">07</option>
								<option <?php if ( $this->meta->find('birth_day') == '8' ) echo 'selected'; ?> value="8">08</option>
								<option <?php if ( $this->meta->find('birth_day') == '9' ) echo 'selected'; ?> value="9">09</option>
								<option <?php if ( $this->meta->find('birth_day') == '10' ) echo 'selected'; ?> value="10">10</option>
								<option <?php if ( $this->meta->find('birth_day') == '11' ) echo 'selected'; ?> value="11">11</option>
								<option <?php if ( $this->meta->find('birth_day') == '12' ) echo 'selected'; ?> value="12">12</option>
								<option <?php if ( $this->meta->find('birth_day') == '13' ) echo 'selected'; ?> value="13">13</option>
								<option <?php if ( $this->meta->find('birth_day') == '14' ) echo 'selected'; ?> value="14">14</option>
								<option <?php if ( $this->meta->find('birth_day') == '15' ) echo 'selected'; ?> value="15">15</option>
								<option <?php if ( $this->meta->find('birth_day') == '16' ) echo 'selected'; ?> value="16">16</option>
								<option <?php if ( $this->meta->find('birth_day') == '17' ) echo 'selected'; ?> value="17">17</option>
								<option <?php if ( $this->meta->find('birth_day') == '18' ) echo 'selected'; ?> value="18">18</option>
								<option <?php if ( $this->meta->find('birth_day') == '19' ) echo 'selected'; ?> value="19">19</option>
								<option <?php if ( $this->meta->find('birth_day') == '20' ) echo 'selected'; ?> value="20">20</option>
								<option <?php if ( $this->meta->find('birth_day') == '21' ) echo 'selected'; ?> value="21">21</option>
								<option <?php if ( $this->meta->find('birth_day') == '22' ) echo 'selected'; ?> value="22">22</option>
								<option <?php if ( $this->meta->find('birth_day') == '23' ) echo 'selected'; ?> value="23">23</option>
								<option <?php if ( $this->meta->find('birth_day') == '24' ) echo 'selected'; ?> value="24">24</option>
								<option <?php if ( $this->meta->find('birth_day') == '25' ) echo 'selected'; ?> value="25">25</option>
								<option <?php if ( $this->meta->find('birth_day') == '26' ) echo 'selected'; ?> value="26">26</option>
								<option <?php if ( $this->meta->find('birth_day') == '27' ) echo 'selected'; ?> value="27">27</option>
								<option <?php if ( $this->meta->find('birth_day') == '28' ) echo 'selected'; ?> value="28">28</option>
								<option <?php if ( $this->meta->find('birth_day') == '29' ) echo 'selected'; ?> value="29">29</option>
								<option <?php if ( $this->meta->find('birth_day') == '30' ) echo 'selected'; ?> value="30">30</option>
								<option <?php if ( $this->meta->find('birth_day') == '31' ) echo 'selected'; ?> value="31">31</option>
							</select>
						</div>
						<div class="col-3">
							<select name="birth_year" class="form-control" onchange="return dataSaved();">
								<?php
								$curr_year = (int) date("Y");
								$years = $curr_year - 2;
								for ($i = 0; $i > -5; $i--) { 
									$year = $years + $i;
									?>
									<option <?php if ( $this->meta->find('birth_year') == strval( $year ) ) echo 'selected'; ?> value="<?= $year ?>"><?php echo $year ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
			</fieldset>

			<div class="form-group">
				<label><?= $this->lang->line('household_telephone'); ?> <span class="text-muted"></span></label>
				<input type="text" name="household_telephone" id="household_telephone" class="form-control phone-input" value="<?=$this->meta->find('household_telephone') ?>" onchange="return dataSaved();" />
			</div>

			<div class="form-group">
				<label><?= $this->lang->line('child_home_address'); ?> <span class="text-danger">*</span></label>
				<input type="text" name="child_home_address" id="child_home_address" class="form-control" required value="<?=$this->meta->find('child_home_address') ?>" onchange="return dataSaved();"/>
			</div>
			<div class="row">
				<div class="col-7 form-group">
					<label><?= $this->lang->line('child_home_city'); ?> <span class="text-danger">*</span></label>
					<input type="text" name="child_home_city" id="child_home_city" class="form-control" required value="<?=$this->meta->find('child_home_city') ?>" onchange="return dataSaved();"/>
				</div>

				<div class="col-5 form-group">
					<label><?= $this->lang->line('child_home_state'); ?> <span class="text-danger">*</span></label>
					<!-- <input type="text" name="child_home_state" class="form-control" required value="<?=$this->meta->find('child_home_state') ?>" /> -->
					<select id="child_home_state" name="child_home_state" class="form-control" value="<?=$this->meta->find('child_home_state') ?>" required onchange="return dataSaved();">
						<?php foreach ($states as $state){ ?>
							<option value="<?php echo $state; ?>" <?php if ( $this->meta->find('child_home_state') == $state ){ echo 'selected';}else if
							( $state=='Colorado'){ echo 'selected';} ?>> <?php echo $state; ?> </option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label><?= $this->lang->line('child_home_zip'); ?> <span class="text-danger">*</span></label>
				<input type="text" name="child_home_zip" id="child_home_zip" class="form-control" required value="<?=$this->meta->find('child_home_zip') ?>" onchange="return dataSaved();" />
			</div>


			<fieldset>
				<div class="form-group">
					
					<label><?= $this->lang->line('verify_birthdate_residence'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>

					<div class="form-check">
						<input type="radio"  class="form-check-input" name="upload_document" id="ready_upload_document" value="<?= $this->lang->line('ready_upload_document'); ?>"  required onchange="return dataSaved();">
						<label for="option11"  class="form-check-label">
							&nbsp;<?= $this->lang->line('ready_upload_document'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio"  class="form-check-input" name="upload_document" id="email_documents_later" value="<?= $this->lang->line('email_documents_later'); ?>" required onchange="return dataSaved();">
						<label for="option12" class="form-check-label">
							&nbsp;<?= $this->lang->line('email_documents_later'); ?>
						</label>
					</div>
					
				</div>
			</fieldset>

			<fieldset id="document_upload" style="display: none;">
				<legend><?= $this->lang->line('required_documents'); ?></legend>

				<div class="form-group card">

                   <label for="verification_document_age"><?= $this->lang->line('verification_child_age'); ?> (<?= $this->lang->line('field_required'); ?>)</label>
					<p><?= $this->lang->line('upload_birth_certificate'); ?></p>

		            <div class="preview-zone hidden">
		              <div class="box box-solid">
		                <div class="box-header with-border">
		                </div>
		                <div class="box-body"></div>
		              </div>
		            </div>
		            <div class="dropzone-wrapper">
		              <div class="dropzone-desc">
		                <i class="glyphicon glyphicon-download-alt"></i>
		                <p><?= $this->lang->line('choose_file'); ?></p>
		              </div>
		              <!-- <input type="file" name="img_logo" class="dropzone"> -->
		             <input type="file" id="verification_document_age" class="form-control-file dropzone" name="verification_document_age" required />
		            </div>

				</div>
				<div class="form-group card">
                    <label for="verification_document_address"><?= $this->lang->line('verification_address'); ?> (<?= $this->lang->line('field_required'); ?>)</label>
                    <p><?= $this->lang->line('upload_Lease'); ?></p>

		            <div class="preview-zone2">
		              <div class="box2 box-solid">
		                <div class="box-header2 with-border">
		                </div>
		                <div class="box-body2"></div>
		              </div>
		            </div>
		            <div class="dropzone-wrapper2">
		              <div class="dropzone-desc2">
		                <i class="glyphicon glyphicon-download-alt"></i>
		                <p><?= $this->lang->line('choose_file'); ?></p>
		              </div>
		              <!-- <input type="file" name="img_logo" class="dropzone"> -->
		             <input type="file" id="verification_document_address" class="form-control-file dropzone2" name="verification_document_address" required/>
		            </div>

				</div>
			</fieldset>

			

			<div class="form-group text-center" style="width:100%">

				<input type="submit" class="btn btn-primary" value="<?= $this->lang->line('button_save_continue'); ?>" />
				<br>
				<br>
		        <a href="<?=site_url('apply/step/1/yes')?>" class="btn btn-secondary"><?= $this->lang->line('button_previous'); ?></a>	

			    
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
.box {
  position: relative;
  background: #ffffff;
  width: 100%;
}

.box-header {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}

.box-tools {
  position: absolute;
  right: 10px;
  top: 5px;
}

.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}

.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}

.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}

.preview-zone {
  text-align: center;
}

.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}


/*file 2*/
.box2 {
  position: relative;
  background: #ffffff;
  width: 100%;
}

.box-header2 {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}

.box-tools2 {
  position: absolute;
  right: 10px;
  top: 5px;
}

.dropzone-wrapper2 {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}

.dropzone-desc2 {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}

.dropzone2,
.dropzone2:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper2:hover,
.dropzone-wrapper2.dragover2 {
  background: #ecf0f5;
}

.preview-zone2 {
  text-align: center;
}

.preview-zone2 .box2 {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}

</style>
<script>
///////////////

function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var htmlPreview =
        // '<img width="200" src="' + e.target.result + '" />' +
        '<p>' + input.files[0].name + '</p>';
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find('.preview-zone');
      var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

      wrapperZone.removeClass('dragover');
      previewZone.removeClass('hidden');
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$(".dropzone").change(function() {
  readFile(this);
});


// file 2
function readFiles(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var htmlPreview =
        // '<img width="200" src="' + e.target.result + '" />' +
        '<p>' + input.files[0].name + '</p>';
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find('.preview-zone2');
      var boxZone = $(input).parent().parent().find('.preview-zone2').find('.box2').find('.box-body2');

      wrapperZone.removeClass('dragover2');
      previewZone.removeClass('hidden2');
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$(".dropzone2").change(function() {
  readFiles(this);
});

/////////////////

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


$('#ready_upload_document').click(function() {
  if ($('#ready_upload_document').is(':checked')) {
     $('#verification_document_address').val('');
     $('#verification_document_age').val('');
     $('#document_upload').show();
  }
});

$('#email_documents_later').click(function() {
  if ($('#email_documents_later').is(':checked')) {
     $('#verification_document_address').val('');
     $('#verification_document_age').val('');
     $('#document_upload').hide();
  }
});

$(document).ready(function(){
		
		var v = $("form").validate({
		})

		$("#child_first_name").blur(function(){
			v.element("#child_first_name");
		})
		$("#child_middle_name").blur(function(){
			v.element("#child_middle_name");
		})
		$("#child_last_name").blur(function(){
			v.element("#child_last_name");
		})
		$("#household_telephone").blur(function(){
			v.element("#household_telephone");
		})
		$("#child_home_address").blur(function(){
			v.element("#child_home_address");
		})
		$("#child_home_city").blur(function(){
			v.element("#child_home_city");
		})
		$("#child_home_zip").blur(function(){
			v.element("#child_home_zip");
		})

		$("#household_telephone").keydown(function (e) {
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
		
		$('[data-toggle="tooltip"]').tooltip();

		
	});
</script>