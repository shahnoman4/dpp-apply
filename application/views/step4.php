<form action="<?=site_url('apply/process/'.$current_step)?>" method="post" id="add-form">
	<input type="hidden" name="step" value="<?=$current_step;?>">

	<div class="row">
	
		<div class="col-12">

			<?php if (!$preschool) : ?>
				<div class="alert alert-danger" role="alert"><?= $this->lang->line('choose_preschool_before'); ?><a href="<?=site_url('apply/step/1')?>"><?= $this->lang->line('click_here'); ?></a><?=$this->lang->line('choose_preschool_after'); ?></div>
			<?php endif;?>

			<!-- <h5><?= $this->lang->line('place_x'); ?></h5> -->

			<fieldset>
				<legend><?= $this->lang->line('child_race', array()); ?> <span class="text-danger">*</span></legend>


				<div class="form-group">
					<h6></h6>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('american_indian_alaskan', $this->meta->find('child_race', array() ) ) ) echo 'checked'; ?> class="form-check-input child_race_1" name="child_race[]" id="child_race_1" value="american_indian_alaskan" autocomplete="on"  onchange="return dataSaved();">
						<label class="form-check-label" for="child_race_1">
							&nbsp;<?= $this->lang->line('american_indian_alaskan'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array( 'black', $this->meta->find('child_race', array()) ) ) echo 'checked'; ?> class="form-check-input child_race_1" name="child_race[]" id="child_race_2" value="black" autocomplete="on"  onchange="return dataSaved();">
						<label class="form-check-label" for="child_race_2">
							&nbsp;<?= $this->lang->line('black'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array( 'asian', $this->meta->find('child_race', array()) ) ) echo 'checked'; ?> class="form-check-input child_race_1" name="child_race[]" id="child_race_3" value="asian" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="child_race_3">
							&nbsp;<?= $this->lang->line('asian'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array( 'hispanic', $this->meta->find('child_race', array()) ) ) echo 'checked'; ?> class="form-check-input child_race_1" name="child_race[]" id="child_race_4" value="hispanic" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="child_race_4">
							&nbsp;<?= $this->lang->line('hispanic'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array( 'white', $this->meta->find('child_race', array()) ) ) echo 'checked'; ?> class="form-check-input child_race_1" name="child_race[]" id="child_race_5" value="white" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="child_race_5">
							&nbsp;<?= $this->lang->line('white'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('nationality_other', $this->meta->find('child_race', array()) ) ) echo 'checked'; ?> class="form-check-input child_race_1" name="child_race[]" id="child_race_6" value="nationality_other" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="child_race_6">
							&nbsp;<?= $this->lang->line('nationality_other'); ?>
						</label>
						<input type="text" name="child_race_other" class="form-control child_race_other"  style="display: none;"  onchange="return dataSaved();"/>
					</div>
				 <label  class="child_race_error" style="color: red;"></label>
				</div>

			</fieldset>

			<hr>

			<fieldset>
				<legend><?= $this->lang->line('child_language'); ?> <span class="text-danger">*</span></legend>

				<div class="form-group">
					<h6></h6>

					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('english', $this->meta->find('primary_language', array()) ) )  echo 'checked'; ?> class="form-check-input primary_language" name="primary_language[]" id="primary_language_1" value="english" autocomplete="on"  onchange="return dataSaved();">
						<label class="form-check-label" for="primary_language_1">
							&nbsp;<?= $this->lang->line('english'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array( 'spanish', $this->meta->find('primary_language', array()) ) )  echo 'checked'; ?> class="form-check-input primary_language" name="primary_language[]" id="primary_language_2" value="spanish" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="primary_language_2">
							&nbsp;<?= $this->lang->line('spanish'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('vietnamese', $this->meta->find('primary_language', array()) ) )  echo 'checked'; ?> class="form-check-input primary_language" name="primary_language[]" id="primary_language_3" value="vietnamese" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="primary_language_3">
							&nbsp;<?= $this->lang->line('vietnamese'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('arabic', $this->meta->find('primary_language', array()) ) ) echo 'checked'; ?> class="form-check-input primary_language" name="primary_language[]" id="primary_language_4" value="arabic" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="primary_language_4">
							&nbsp;<?= $this->lang->line('arabic'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('russian', $this->meta->find('primary_language', array()) ) ) echo 'checked'; ?> class="form-check-input primary_language" name="primary_language[]" id="primary_language_5" value="russian" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="primary_language_5">
							&nbsp;<?= $this->lang->line('russian'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('language_other', $this->meta->find('primary_language', array()) ) ) echo 'checked'; ?> class="form-check-input primary_language" name="primary_language[]" id="primary_language_6" value="language_other" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="primary_language_6">
							&nbsp;<?= $this->lang->line('language_other'); ?>
						</label>
						<input type="text" name="primary_language_other"  class="form-control primary_language_other primary_language" style="display: none;"  onchange="return dataSaved();"/>
					</div>
					<label  class="primary_language_error" style="color: red;"></label>
				</div>

			</fieldset>

			<hr>
			

			<fieldset>
				<legend><?= $this->lang->line('home_language'); ?> <span class="text-danger">*</span></legend>

				<div class="form-group">
					<h6></h6>

					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('english', $this->meta->find('home_language', array()) ) ) echo 'checked'; ?>  class="form-check-input home_language" name="home_language[]" id="home_language_1" value="english" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="home_language_1">
							&nbsp;<?= $this->lang->line('english'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array( 'spanish', $this->meta->find('home_language', array()) ) ) echo 'checked'; ?>  class="form-check-input home_language" name="home_language[]" id="home_language_2" value="spanish" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="home_language_2">
							&nbsp;<?= $this->lang->line('spanish'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('vietnamese', $this->meta->find('home_language', array()) ) ) echo 'checked'; ?>  class="form-check-input home_language" name="home_language[]" id="home_language_3" value="vietnamese" autocomplete="on" onchange="return dataSaved();">
						<label class="form-check-label" for="home_language_3">
							&nbsp;<?= $this->lang->line('vietnamese'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array( 'arabic', $this->meta->find('home_language', array()) ) ) echo 'checked'; ?>  class="form-check-input home_language" name="home_language[]" id="home_language_4" value="arabic" autocomplete="on"  onchange="return dataSaved();">
						<label class="form-check-label" for="home_language_4">
							&nbsp;<?= $this->lang->line('arabic'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('russian', $this->meta->find('home_language', array()) ) ) echo 'checked'; ?>  class="form-check-input home_language" name="home_language[]" id="home_language_5" value="russian" autocomplete="on" onchange="return dataSaved();" >
						<label class="form-check-label" for="home_language_5">
							&nbsp;<?= $this->lang->line('russian'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( in_array('language_other', $this->meta->find('home_language', array()) ) ) echo 'checked'; ?>  class="form-check-input home_language" name="home_language[]" id="home_language_6" value="language_other" autocomplete="on" onchange="return dataSaved();" >
						<label class="form-check-label" for="home_language_6">
							&nbsp;<?= $this->lang->line('language_other'); ?>
						</label>
						<input type="text" name="home_language_other" class="form-control home_language_other" style="display: none;" onchange="return dataSaved();"  />
					</div>
					<label  class="home_language_error" style="color: red;"></label>
				</div>
			</fieldset>
			
			
			<!-- <fieldset>
				<legend><?= $this->lang->line('applying_for_programs'); ?></legend>
				<div class="form-group">
					

					<div class="form-check">
						<input type="checkbox" <?php if ( $this->meta->find('participate_ccap') == 'yes' ) echo 'checked'; ?>  class="form-check-input" name="participate_ccap" value="yes" id="option11" autocomplete="on">
						<label for="option11" class="form-check-label">
							&nbsp;<?= $this->lang->line('ccap'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( $this->meta->find('participate_head_start') == 'yes' ) echo 'checked'; ?>  class="form-check-input" name="participate_head_start" value="yes" id="option12" autocomplete="on">
						<label for="option12" class="form-check-label">
							&nbsp;<?= $this->lang->line('head_start'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( $this->meta->find('participate_cpp') == 'yes' ) echo 'checked'; ?>  class="form-check-input" name="participate_cpp" value="yes" id="option13" autocomplete="on">
						<label for="option13" class="form-check-label">
							&nbsp;<?= $this->lang->line('cpp'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( $this->meta->find('i_am_not_sure') == 'yes' ) echo 'checked'; ?>  class="form-check-input" name="i_am_not_sure" value="yes" id="option13" autocomplete="on">
						<label for="option13" class="form-check-label">
							&nbsp;<?= $this->lang->line('not_sure'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" <?php if ( $this->meta->find('not_participating_program') == 'yes' ) echo 'checked'; ?>  class="form-check-input" name="not_participating_program" value="yes" id="option13" autocomplete="on">
						<label for="option13" class="form-check-label">
							&nbsp;<?= $this->lang->line('not_participating'); ?>
						</label>
					</div>
				</div>
			</fieldset> -->
			
			<hr />

			<div class="form-group text-center" style="width:100%">
				<input type="submit" class="btn btn-primary" id="checkBtn" value="<?= $this->lang->line('button_save_continue'); ?>" />
				<br>
				<br>
		        <a href="<?=site_url('apply/step/3')?>" class="btn btn-secondary"><?= $this->lang->line('button_previous'); ?></a>
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
		var child_race = document.getElementsByClassName( 'child_race_1' );
		var child_raceisChecked = false;
		    for (var i = 0; i < child_race.length; i++) {
		        if ( child_race[i].checked ) {
		            child_raceisChecked = true;
		        };
		    };

		var primary_language = document.getElementsByClassName( 'primary_language_1' );
		var primary_languageisChecked = false;
		    for (var i = 0; i < primary_language.length; i++) {
		        if ( primary_language[i].checked ) {
		            primary_languageisChecked = true;
		        };
		    };

		var primary_language = document.getElementsByClassName( 'primary_language' );
		var primary_languageisChecked = false;
		    for (var i = 0; i < primary_language.length; i++) {
		        if ( primary_language[i].checked ) {
		            primary_languageisChecked = true;
		        };
		    };
		var home_language = document.getElementsByClassName( 'home_language' );
		var home_languageisChecked = false;
		    for (var i = 0; i < home_language.length; i++) {
		        if ( home_language[i].checked ) {
		            home_languageisChecked = true;
		        };
		    };            
		    if ((!child_raceisChecked) && (!primary_languageisChecked) && (!home_languageisChecked) ) {
		        $(".child_race_error").html('This field is required.');
			      $(".child_race_error").fadeIn('slow', function(){
			        $(".child_race_error").delay(3000).fadeOut(); 
			     }); 
			     var success = $(".child_race_error");
                 scrollTo(success,-100); 
		           
		        $(".primary_language_error").html('This field is required.');
			      $(".primary_language_error").fadeIn('slow', function(){
			        $(".primary_language_error").delay(3000).fadeOut(); 
			     }); 
			     var success = $(".primary_language_error");
                 scrollTo(success,-100); 

                 $(".home_language_error").html('This field is required.');
			      $(".home_language_error").fadeIn('slow', function(){
			        $(".home_language_error").delay(3000).fadeOut(); 
			     }); 
			     var success = $(".home_language_error");
                 scrollTo(success,-100);
		           return false;   
		    }
		    else if (!child_raceisChecked ) {
		        $(".child_race_error").html('This field is required.');
			      $(".child_race_error").fadeIn('slow', function(){
			        $(".child_race_error").delay(3000).fadeOut(); 
			     }); 
			     var success = $(".child_race_error");
                 scrollTo(success,-100);  
		           return false;
		    }
		    else if (!primary_languageisChecked ) {
		        $(".primary_language_error").html('This field is required.');
			      $(".primary_language_error").fadeIn('slow', function(){
			        $(".primary_language_error").delay(3000).fadeOut(); 
			     }); 
			     //var success = $(".primary_language_error");
                 //scrollTo(success,-100); 
		           return false;
		    }
		    else if (!home_languageisChecked ) {
		        $(".home_language_error").html('This field is required.');
			      $(".home_language_error").fadeIn('slow', function(){
			        $(".home_language_error").delay(3000).fadeOut(); 
			     }); 
			     //var success = $(".home_language_error");
                 //scrollTo(success,-100); 
		           return false;
		    }


    });
});
// child's race
$('#child_race_6').click(function() {
  if ($(this).is(':checked')) {
     $('.child_race_other').val('');
     $('.child_race_other').show();
  }else{
  	$('.child_race_other').val('');
  	$('.child_race_other').hide();
  }
});

//child's primary language
$('#primary_language_6').click(function() {
  if ($(this).is(':checked')) {
     $('.primary_language_other').val('');
     $('.primary_language_other').show();
  }else{
  	$('.primary_language_other').val('');
  	$('.primary_language_other').hide();
  }
});

//language(s) speak at home
$('#home_language_6').click(function() {
  if ($(this).is(':checked')) {
     $('.home_language_other').val('');
     $('.home_language_other').show();
  }else{
  	$('.home_language_other').val('');
  	$('.home_language_other').hide();
  }
});

</script>



