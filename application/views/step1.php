<?php 

if ($response=='yes'){

$xmlString =  APPPATH . 'schools/Schools-Export.xml';
//echo $xmlString;exit();
$xml = simplexml_load_file($xmlString);
	
$json = json_encode($xml);
$schoolAlls = json_decode($json,TRUE);
$schoolAll = $schoolAlls['post'];
$keys = array_column($schoolAll, 'Title');
array_multisort($keys, SORT_ASC, $schoolAll);

	// echo "<pre>";
 //    print_r($schoolAll);
 //    echo "</pre>";
 //    exit();	
?>

<form action="<?=site_url('apply/process/'.$current_step)?>" method="post" id="add-form">
	<div class="row yes-row" style="padding-top: 1rem;">
	
		<div class="col-12">
                <input type="hidden" name="step" value="<?=$current_step;?>">
					<div class="form-group">
						<label><?= $this->lang->line('preschool_name'); ?> <span class="text-danger">*</span></label>
						<div>
							<select id="preschool_name" name="preschool_name" class="chosen-select" required onchange="return dataSaved();">
								<!-- <option value="">Choose option</option> -->
								<?php foreach ($schoolAll as $school) { 
                                      if(isset($school['Title']) && $school['Title']!=""){
                                      	if(is_array($school['Title'])){}else{
									?>
									<option value="<?php echo $school['Title']; ?>" <?php if ( $this->meta->find('preschool_name') == $school['Title'] ){ echo 'selected'; }?> data-rating="<?php echo $school['ColoradoShinesCurrentRating']; ?>"><?php echo $school['Title']; ?></option>
								<?php } } } ?>
							</select>
						</div>
					<label  class="preschool_name_error" style="color: red; display:none;"></label>
					</div>

				<div id="card-dps-alert" style="display:none">
					<p><?= $this->lang->line('dps_already_enrolled'); ?></p>
				</div>

				
				
				<div id="card-estimate">
					<hr />
				<h4 class="pt-2"><?= $this->lang->line('estimate_dpp_tuition_title'); ?></h4>
				
				<p class="py-2"><?= $this->lang->line('estimate_dpp_tuition_description'); ?></p>
				<hr />
				
				<div class="form-group">
					<label><?= $this->lang->line('place_x_household'); ?> <span class="text-muted">(<?= $this->lang->line('including_yourself'); ?>)</span> <span class="text-danger">*</span></label>
					<div>
				        <select name="total_household" id="total_household" class="form-control" required onchange="return dataSaved();">
							<option value="">Select Option</option>
					        <option value="2" <?php if ( $this->meta->find('total_household') == '2' ) echo 'selected'; ?>>2</option>
					        <option value="3" <?php if ( $this->meta->find('total_household') == '3' ) echo 'selected'; ?>>3</option>
					        <option value="4" <?php if ( $this->meta->find('total_household') == '4' ) echo 'selected'; ?>>4</option>
					        <option value="5" <?php if ( $this->meta->find('total_household') == '5' ) echo 'selected'; ?>>5</option>
					        <option value="6" <?php if ( $this->meta->find('total_household') == '6' ) echo 'selected'; ?>>6</option>
					        <option value="7" <?php if ( $this->meta->find('total_household') == '7' ) echo 'selected'; ?>>7</option>
					        <option value="8" <?php if ( $this->meta->find('total_household') == '8' ) echo 'selected'; ?>>8</option>
						</select>
					</div>
					<label  class="total_household_error" style="color: red; display:none;"></label>
				</div>
				<style type="text/css">
					#income {
					    width: auto;
					}
				</style>

				<div class="form-group">
					<label><?= $this->lang->line('monthly_household_income'); ?> <span class="text-danger">*</span></label>
					
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="input-group-text ">$</span>
						</div>
						<input id="income" name="income" class="form-control form-control-sm  estimate-form-input income" value="<?=$this->meta->find('income') ?>" onchange="return dataSaved();" />
						<div class="input-group-append">
							<span class="input-group-text">per month</span>
						</div>
					</div>
					<div class="income_error error-div"></div>
					
				</div>
				<script>
						$(document).ready(function(){
							var cleave = new Cleave('.estimate-form-input', {
								numeral: true,
								numerialThousandsGroupStyle: 'thousand'
							});
						});
					</script>
				<div class="form-group">
					<label><?= $this->lang->line('choose_one_schedule'); ?> <span class="text-danger">*</span></label>
					<div>
				        <select name="part_full_day" id="part_full_day" class="form-control" required onchange="return dataSaved();">
							<option value="half" id="option1" <?php if ( $this->meta->find('part_full_day') == 'half' ) echo 'selected'; ?>>
								<label for="option1" class="form-check-label">
									&nbsp;<?php echo $this->lang->line('part_day'); ?> 
									<span class="text-muted">(<?php echo $this->lang->line('5_hours_wk'); ?>)</span>
								</label>
							</option>
							<option value="full" id="option2" <?php if ( $this->meta->find('part_full_day') == 'full' ) echo 'selected'; ?>>
								<label for="option2" class="form-check-label">
									&nbsp;<?php echo $this->lang->line('full_day'); ?> <span class="text-muted"> (<?php echo $this->lang->line('25_hours_wk'); ?>)</span>
								</label>
							</option>
							<option value="extended" id="option3" <?php if ( $this->meta->find('part_full_day') == 'extended' ) echo 'selected'; ?>>
								<label for="option3" class="form-check-label">
									&nbsp;<?php echo $this->lang->line('extended_day'); ?> <span class="text-muted"> (<?php echo $this->lang->line('33_hours_wk'); ?>)</span>
								</label>
							</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label><?= $this->lang->line('school_year'); ?> <span class="text-danger">*</span></label>
					<div>
				        <select name="school_year" id="school_year" class="form-control" required onchange="return dataSaved();">
							<option value="2019/2020" id="option1" <?php if ( $this->meta->find('school_year') == '2019/2020' ) echo 'selected'; ?>>
								<label for="option1" class="form-check-label">
								2019/2020									
								</label>
							</option>
							<option value="2019/2020" id="option1" <?php if ( $this->meta->find('school_year') == '2020/2021' ) echo 'selected'; ?>>
								<label for="option1" class="form-check-label">
								2020/2021									
								</label>
							</option>
							<option value="Other" id="option1" <?php if ( $this->meta->find('school_year') == 'Other' ) echo 'selected'; ?>>
								<label for="option1" class="form-check-label">
								Other									
								</label>
							</option>
						</select>
					</div>
				</div>

				<div class="row school_year_show" style="display:none; padding-top: 1rem;">
					<div class="col-12">
						<p><?= $this->lang->line('school_year_other'); ?></p>
					</div>
				</div>
				
				
				<div class="calculate-button text-center">
				<a href="javascript:estimate_tuition();" class="btn btn-primary"><?php echo $this->lang->line('estimate_tuition_credit_button'); ?></a>
				</div>
				
				<div class="credit-results" style="display:none;">
				
					<div class="card">
						<?php echo $this->lang->line('your_estimated_tuition_credit'); ?>
					</div>
					
					<input type="hidden" name="estimated_tuition_credit" id="estimated_tuition_credit" value="<?=$this->meta->find('estimated_tuition_credit') ?>" />
						
					<div class="form-group text-center" style="width:100%">
						<input type="submit" class="btn btn-primary" value="<?= $this->lang->line('button_save_continue'); ?>" />
					<br>
					<br>
			        <a href="<?=site_url('apply/step/1')?>" class="btn btn-secondary"><?= $this->lang->line('button_previous'); ?></a>
			        </div>
								
				</div>
				
			</div>				
			
			

			


		</div>
	
	</div>
</form>

<?php } else { ?>

<div class="row">
	<div class="col-12" style="text-align: center;">
		<legend><?= $this->lang->line('is_child_enrolled'); ?></legend>
		<div >
			<a href="<?=site_url('apply/step/1/yes')?>" class="btn btn-primary btn-lg btn-yes"><?= $this->lang->line('yes'); ?></a>&nbsp;<button class="btn btn-lg btn-primary btn-no"><?= $this->lang->line('no'); ?></button>
		</div>
		<br>
		<br>
        <a href="<?=site_url('apply')?>" class="btn btn-secondary btn-lg btn-yes"><?= $this->lang->line('button_previous'); ?></a>
		
	</div>
</div>



<div class="row no-row" style="display:none; padding-top: 1rem;">
	<div class="col-12">
		<p><?= $this->lang->line('not_enrolled'); ?></p>
		<a href='https://dpp.org/find-a-preschool-app' target='_blank' class="btn btn-primary"><?= $this->lang->line('find_preschool'); ?></a>
	</div>
</div>

<?php  } ?>
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
  var school_year = $('#school_year').val();

	if(school_year=='Other'){
		$(".school_year_show").slideDown();
	}else{

      $(".school_year_show").slideUp();
    }
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
         //console.log(response);
     
      }
      });
}



$(document).ready(function(){
	
	tuition_calculated=false;

	$(document).on("keyup", function(e) {
	    var key = e.which;

	    if (key == 13) // the enter key ascii code
	    {
	    	estimate_tuition();
	        //login();
	    }
	});
	$(".btn-no").click(function(){
		$(".no-row").slideDown();
	});




	var v = $("form").validate({
		
	})

	$("#income").blur(function(){
		v.element("#income");
	})

	$("#total_household").blur(function(){
		v.element("#total_household");
	})
	
});

$(document).ready(function($){
				
	$("#preschool_name").on('change', function(){
		if ( $(this).val().indexOf("Denver Public Schools") > -1 ) {
			$('#card-dps-alert').slideDown();
			$('#card-estimate').slideUp();
		} else {
			$('#card-dps-alert').slideUp();
			$('#card-estimate').slideDown();
		}
	});
});
	
	
	
	function estimate_tuition() {
		
		if(!$('#total_household').val()){
			$(".total_household_error").html('This field is required.');
			    $(".total_household_error").fadeIn('slow', function(){
			    $(".total_household_error").delay(3000).fadeOut(); 
			}); 
	    }
	    
	    if(!$('#income').val()){
			$(".income_error").html('This field is required.');
			    $(".income_error").fadeIn('slow', function(){
			    $(".income_error").delay(3000).fadeOut(); 
			}); 
	    }
	    if(!$('#preschool_name').val()){
			$(".preschool_name_error").html('This field is required.');
			    $(".preschool_name_error").fadeIn('slow', function(){
			    $(".preschool_name_error").delay(3000).fadeOut(); 
			});
			return false; 
	    }
	    
		result = getCalc();
		
		$('#estimated_tuition_credit').val(result);
		if(!$('#income').val()){
			$(".income_error").html('This field is required.');
			    $(".income_error").fadeIn('slow', function(){
			    $(".income_error").delay(3000).fadeOut(); 
			}); 
	    }else{
		  
		  $(".calculate-button").slideUp();
		  $(".credit-results").slideDown();
		  
		  tuition_calculated=true;
		  
		  $('#total_household, #income, #part_full_day, #preschool_name').change( function() {
			  estimate_tuition();
		  });
		  
		  
		  
		}  
				
	}
</script>