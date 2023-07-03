<form action="<?php echo site_url('apply/process/'.$current_step) ;?>" method="post" id="add-form" enctype="multipart/form-data">
	<input type="hidden" name="step" value="<?=$current_step;?>">

	<div class="row">
	
		<div class="col-12">
			<?php if (!$preschool) { ?>
				<div class="alert alert-danger" role="alert"><?= $this->lang->line('choose_preschool_before'); ?><a href="<?=site_url('apply/step/1')?>"><?= $this->lang->line('click_here'); ?></a><?=$this->lang->line('choose_preschool_after'); ?></div>
			<?php } ?>
						
			<div class="card">
				<h4><?= $this->lang->line('provide_income'); ?></h4>
				<ul>
				   <li><?= $this->lang->line('provide_income_more_detail'); ?></li>
				</ul>

				<div class="form-group">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="disclose_income" value="yes" id="disclose_income_yes" autocomplete="off" <?php if ( $this->meta->find('disclose_income') !== 'no' ) echo 'checked'; ?>  onchange="return dataSaved();">
						<label for="disclose_income_yes" class="form-check-label" >
							&nbsp;<?= $this->lang->line('like_to_provide'); ?> (<?= $this->lang->line('information_required'); ?>)
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="disclose_income" value="no" id="disclose_income_no" autocomplete="off"  <?php if ( $this->meta->find('disclose_income') == 'no' ) echo 'checked'; ?>  onchange="return dataSaved();">
						<label for="disclose_income_no" class="form-check-label">
							&nbsp;<?= $this->lang->line('skip_disclosal'); ?> (<?= $this->lang->line('minimum_financial'); ?>)
							<ul>
							   <li><?= $this->lang->line('hundreds_of_dollars'); ?></li>
							</ul>
						</label>
					</div>
					
				</div>
			</div>
			
			<fieldset class="income-table-container" style="margin-top:1em;">
				
				<legend><?= $this->lang->line('household_gross_income'); ?></legend>

				<p><?= $this->lang->line('fill_in_chart'); ?></p>

				<ul>
					<li><?= $this->lang->line('work_income_includes'); ?></li>
					<li><?= $this->lang->line('non_work_income'); ?></li>
				</ul>
               <?php if ( $this->meta->find('parent_guardian_2') && $this->meta->find('parent_2_first_name') && $this->meta->find('parent_2_middle_name')){ 
                    $incomeStep1 = '';
                 }else{

                  $incomeStep1 = $this->meta->find('income');
                 }
               	?>
				<div class="form-group">
					<label>What is <?= $this->meta->find('parent_1_first_name'); ?> <?=$this->meta->find('parent_1_last_name') ?>'s  <span class="highlight">monthly</span> work and non-work income? <span class="text-muted"></span></label>
					
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="input-group-text ">$</span>
						</div>
						<input type="text" id="income_monthly_income_1" name="income_monthly_income_1" class="form-control" required value="<?php if($this->meta->find('income_monthly_income_1')){echo $this->meta->find('income_monthly_income_1');}else{echo $incomeStep1 ; } ?>"  onchange="return dataSaved();"/>
						<div class="input-group-append">
							<span class="input-group-text">per month</span>
						</div>
					</div>	
				</div>
                 
            <?php if ( $this->meta->find('parent_guardian_2') && $this->meta->find('parent_2_first_name') && $this->meta->find('parent_2_middle_name')){ ?> 
				<div class="form-group">
					<label>What is <?= $this->meta->find('parent_2_first_name'); ?> <?= $this->meta->find('parent_2_last_name'); ?>'s  <span class="highlight">monthly</span> work and non-work income? <span class="text-muted"></span></label>
					
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="input-group-text ">$</span>
						</div>
						<input type="text" id="income_monthly_income_2" name="income_monthly_income_2" class="form-control" required value="<?= $this->meta->find('income_monthly_income_2'); ?>"  onchange="return dataSaved();"/>
						<div class="input-group-append">
							<span class="input-group-text">per month</span>
						</div>
					</div>
				</div>
			<?php } ?>

			   <?php if ( $this->meta->find('parent_guardian_2') && $this->meta->find('parent_2_first_name') && $this->meta->find('parent_2_middle_name')){ 
                   
                   $incom2 = str_replace(',', '', $this->meta->find('income_monthly_income_2'));

                 }else{
                   $incom2 = 0;
                 }
			   	?> 
				<input type="hidden" name="all_income_total" value="<?php if($this->meta->find('income_monthly_income_1')){echo str_replace(',', '', $this->meta->find('income_monthly_income_1')) + $incom2 ;}else{echo $incomeStep1 ; } ?>" class="all-total-inputs"  onchange="return dataSaved();"/>
                
                <div class="form-group">
					<label><?= $this->lang->line('your_total_monthly_income'); ?></label>
					<span class="all-totals">$<?php if($this->meta->find('income_monthly_income_1')){echo str_replace(',', '', $this->meta->find('income_monthly_income_1')) + $incom2 ;}else{echo $incomeStep1 ; } ?></span>
				</div>
			</fieldset>
			<hr>

			<fieldset>
				<div class="form-group">
				
					<div class="form-check">
						<input type="radio"  class="form-check-input" name="upload_documents" id="ready_upload_document" value="<?= $this->lang->line('ready_upload_document_income'); ?>" required onchange="return dataSaved();">
						<label for="option11" class="form-check-label">
							&nbsp;<?= $this->lang->line('ready_upload_document_income'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio"  class="form-check-input" name="upload_documents" id="email_documents_later" value="<?= $this->lang->line('email_documents_later_income'); ?>" required onchange="return dataSaved();">
						<label for="option12" class="form-check-label">
							&nbsp;<?= $this->lang->line('email_documents_later_income'); ?>
						</label>
					</div>
				</div>
			</fieldset>

		<div class="form-group mb-5" style="display: none;" id="document_upload">

            <legend for="verification_document_income"><?= $this->lang->line('verification_one_month_income'); ?> <span class="text-danger">*</span></legend>
				<?= $this->lang->line('most_current_check_stubs'); ?>

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
              <br>
             <input type="file" id="verification_document_income" class="form-control-file dropzone" name="verification_document_income[]" multiple="multiple" required="required" />

            </div>
	    </div>


<style type="text/css">
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


</style>			
<script type="text/javascript">
///////////////

function readFile(input) {
  if (input.files && input.files[0]) {
  	for(let i = 0; i<input.files.length;i++)
  	{

    var reader = new FileReader();

    var htmlPreview = "";

    reader.onload = function(e) {
       htmlPreview +=
        // '<img width="200" src="' + e.target.result + '" />' +
        '<p>' + input.files[i].name + '</p>';
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find('.preview-zone');
      var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

      wrapperZone.removeClass('dragover');
      previewZone.removeClass('hidden');
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[i]);
  }
  }
}


$(".dropzone").change(function() {
  readFile(this);
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
     $('#verification_document_income').val('');
     $("#verification_document_income").prop('required',true);
     $('#document_upload').show();
  }
});

$('#email_documents_later').click(function() {
  if ($('#email_documents_later').is(':checked')) {
     $('#verification_document_income').val('');
     $("#verification_document_income").prop('required',false);
     $('#document_upload').hide();
  }
});

	$("#income_monthly_income_1").change(function() {
	    var income_1_comma = parseInt($("#income_monthly_income_1").val());
	    var income_1 = income_1_comma.toString().replace(/,/g, "");
	    if(income_1){
	    	income_1 = parseInt(income_1);
	    }else{
	    	income_1 = 0;
	    }
	    var income_2_comma = parseInt($("#income_monthly_income_2").val());
	    var income_2 = income_2_comma.toString().replace(/,/g, "");
	    if(income_2){
	    	income_2 = parseInt(income_2);
	    }else{
	    	income_2 = 0;
	    }
	    var totalsum = income_1 + income_2;
	    $(".all-totals").text("$"+totalsum.toFixed(2));
	    $(".all-total-inputs").val(totalsum.toFixed(2));

	});

	$("#income_monthly_income_2").change(function() {
	     var income_1_comma = parseInt($("#income_monthly_income_1").val());
	     var income_1 = income_1_comma.toString().replace(/,/g, "");
	    if(income_1){
	    	income_1 = parseInt(income_1);
	    }else{
	    	income_1 = 0;
	    }
	    var income_2_comma = parseInt($("#income_monthly_income_2").val());
	    var income_2 = income_2_comma.toString().replace(/,/g, "");
	    if(income_2){
	    	income_2 = parseInt(income_2);
	    }else{
	    	income_2 = 0;
	    }
	    var totalsum = income_1 + income_2;
	    $(".all-totals").text("$"+totalsum.toFixed(2));
	    $(".all-total-inputs").val(totalsum.toFixed(2));

	});
</script>			
			<script>

    $(document).ready(function(){

		// Determine initial state.
		if ( $("#disclose_income_no:checked").length > 0 ) {
			$(".income-table-container").slideUp();
		} else {
			runIncomeComplete();
		}

		// Add a new parent/guardian row.
        $(".add-parent").click(function(){
        	var $income_table = $(".income-table");
        	var ptotal = $income_table.data("ptotal");
        	ptotal++;
        	$income_table.data("ptotal", ptotal);
        	$('<tr data-pid="'+ptotal+'">\
				<td><input type="text" name="income_name_'+ptotal+'" class="form-control"></td>\
				<td><input type="text" name="income_monthly_income_'+ptotal+'" class="form-control monthly-income"></td>\
				<td><input type="text" name="income_monthly_nonwork_income_'+ptotal+'" class="form-control monthly-nonwork-income"></td>\
				<td><input type="hidden" class="total" name="income_total_'+ptotal+'" value="0"><span class="total">$0.00</span></td>\
			</tr>').insertBefore("#total-row");
        });

		// Hide income table.
        $("#disclose_income_no").click(function(){
			$(".income-table-container").slideUp();
		});

		// Show income table.
		$("#disclose_income_yes").click(function(){
			$(".income-table-container").slideDown();
		});

		// Run income table update on change
		$('.income-table').on('change', 'input[type=text]', runIncomeComplete);

		function runIncomeComplete(){
			// Set ptotal.
			var $income_table = $(".income-table");
        	$income_table.data("ptotal", $('[data-pid]').length );
        	$income_table.attr("data-ptotal", $('[data-pid]').length );

			// Loop through rows and update individually.
			$('[data-pid]').each( function() {
				var $parent = $(this);
				var income = parseInt(0+$parent.find("input.monthly-income").val());
				var nonwork_income = parseInt(0+$parent.find("input.monthly-nonwork-income").val());
				var total = (income + nonwork_income).toFixed(2);
				console.log(total);
				$parent.find("span.total").text("$"+total);
				$parent.find("input.total").val(total);income-total
			});

			// Runs complete
			var income_total = 0;
			var nonwork_income_total = 0;
			var all_total = 0;
			$('.monthly-income').each(function() {
				income_total += Number($(this).val());
			});
			$('.monthly-nonwork-income').each(function() {
				nonwork_income_total += Number($(this).val());
			});
			var all_total = income_total + nonwork_income_total;
			$(".income-total").text("$"+income_total.toFixed(2));
			$(".nonwork-income-total").text("$"+nonwork_income_total.toFixed(2));
			$(".all-total").text("$"+all_total.toFixed(2));
			$(".income-total-input").val(income_total);
			$(".nonwork-income-total-input").val(nonwork_income_total);
			$(".all-total-input").val(all_total);

		}
    });
			</script>

			<fieldset>
				
			</fieldset>

			

			<div class="form-group text-center" style="width:100%">
				<input type="submit" class="btn btn-primary" value="<?= $this->lang->line('button_save_continue'); ?>" />
				<br>
				<br>
		        <a href="<?=site_url('apply/step/4')?>" class="btn btn-secondary"><?= $this->lang->line('button_previous'); ?></a>
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