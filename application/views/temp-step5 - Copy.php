<div class="row">
	<form action="<?php echo site_url('apply/process/'.$current_step) ;?>" method="post">
		<div class="col-12">
			<?php if (!$preschool) { ?>
				<div class="alert alert-danger" role="alert"><?= $this->lang->line('choose_preschool_before'); ?><a href="<?=site_url('apply/step/1')?>"><?= $this->lang->line('click_here'); ?></a><?=$this->lang->line('choose_preschool_after'); ?></div>
			<?php } ?>
			
			
			
			
			<div class="card">
				<p>Your estimated tuition credit is <strong class="large" style="background:#afa;">$<?=$this->meta->find('estimated_tuition_credit') ?> per month</strong>. This result is an estimate, not a guarantee. Your final tuition credit will be determined when you complete your application.</p>
				<p>To receive your tuition credit, <strong>fill out the form below</strong> and e-mail your income verification documents to <a href="mailto:apply@dpp.org">apply@dpp.org</a>. If you'd prefer not to provide verification documents, choose "No" below and you will receive the minimum level of financial assistance.</p>
				<p>The amount of support a family receives depends on family size and income, the quality of the preschool chosen, and the length of day and number of days per week a child attends preschool. Only children attending one of DPP’s contracted preschools can receive DPP Tuition Credits.</p>
			</div>
						
			<div class="card">
				<h4><?= $this->lang->line('provide_income'); ?></h4>

				<div class="form-group">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="disclose_income" value="yes" id="disclose_income_yes" autocomplete="off" <?php if ( $this->meta->find('disclose_income') !== 'no' ) echo 'checked'; ?>>
						<label for="disclose_income_yes" class="form-check-label" >
							&nbsp;<?= $this->lang->line('like_to_provide'); ?> (<?= $this->lang->line('information_required'); ?>)
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="disclose_income" value="no" id="disclose_income_no" autocomplete="off"  <?php if ( $this->meta->find('disclose_income') == 'no' ) echo 'checked'; ?>>
						<label for="disclose_income_no" class="form-check-label">
							&nbsp;<?= $this->lang->line('skip_disclosal'); ?> (<?= $this->lang->line('minimum_financial'); ?>)
						</label>
					</div>
					
				</div>
			</div>
			
			<fieldset class="income-table-container" style="margin-top:1em;">
				
				<legend><?= $this->lang->line('household_gross_income'); ?></legend>

				<p><?= $this->lang->line('fill_in_chart'); ?></p>

				<ul>
					<li><?= $this->lang->line('work_income_includes'); ?></li>
					<li><?= $this->lang->line('complete_income_affidavit'); ?></li>
					<li><?= $this->lang->line('non_work_income'); ?></li>
				</ul>

				<div class="form-group">
					<label>What is <?= $this->meta->find('parent_1_first_name'); ?> <?=$this->meta->find('parent_1_middle_name') ?>  <?=$this->meta->find('parent_1_last_name') ?>  monthly work income? <span class="text-muted"></span></label>
					<input type="text" id="income_monthly_income_1" name="income_monthly_income_1" class="form-control" required value="<?= $this->meta->find('income_monthly_income_1'); ?>" />
				</div>

				<div class="form-group">
					<label>What is <?= $this->meta->find('parent_2_first_name'); ?> <?= $this->meta->find('parent_2_middle_name'); ?>  <?= $this->meta->find('parent_2_last_name'); ?>  monthly work income? <span class="text-muted"></span></label>
					<input type="text" id="income_monthly_income_2" name="income_monthly_income_2" class="form-control" required value="<?= $this->meta->find('income_monthly_income_2'); ?>" />
				</div>
                
                <div class="form-group">
					<label>Your total household monthly income is</label>
					<span class="all-total"></span>
				</div>
				
                
				<!-- <table class="table income-table" data-ptotal="1">
					<thead>
						<tr>
							<th scope="col">Name of Parent/Guardian<br><span class="subtext">Last Name, First Name</span></th>
							<th scope="col">Monthly Work Income<br><span class="subtext">Most Recent Gross Monthly Income/Salary/Wages/Tips</span></th>
							<th scope="col">Monthly Non-Work Income<br><span class="subtext">TANF, Child Support, Trust Income, etc.</span></th>
							<th scope="col">Monthly Total Income<br><span class="subtext">All Work and Non-Work Income</span></th>
						</tr>
					</thead>
					<tbody>
						<tr data-pid="1">
							<td><input type="text" name="income_name_1" value="<?= $this->meta->find('income_name_1'); ?>" class="form-control"></td>
							<td><input type="text" name="income_monthly_income_1" value="<?= $this->meta->find('income_monthly_income_1'); ?>" class="form-control monthly-income"></td>
							<td><input type="text" name="income_monthly_nonwork_income_1" value="<?= $this->meta->find('income_monthly_nonwork_income_1'); ?>" class="form-control monthly-nonwork-income"></td>
							<td><input type="hidden" class="total" name="income_total_1" value="<?= $this->meta->find('income_total_1', 0); ?>"><span class="total">$0.00</span></td>
						</tr>
						<?php
						$next_row = 2;
						$next_row_test = $this->meta->find( 'income_name_' . $next_row );
						while( $next_row_test ) {
							?>
							<tr data-pid="<?= $next_row; ?>">
								<td><input type="text" name="income_name_<?= $next_row; ?>" value="<?= $this->meta->find('income_name_' . $next_row); ?>" class="form-control"></td>
								<td><input type="text" name="income_monthly_income_<?= $next_row; ?>" value="<?= $this->meta->find('income_monthly_income_' . $next_row); ?>" class="form-control monthly-income"></td>
								<td><input type="text" name="income_monthly_nonwork_income_<?= $next_row; ?>" value="<?= $this->meta->find('income_monthly_nonwork_income_' . $next_row); ?>" class="form-control monthly-nonwork-income"></td>
								<td><input type="hidden" class="total" name="income_total_<?= $next_row; ?>" value="<?= $this->meta->find('income_total_' . $next_row, 0); ?>"><span class="total">$0.00</span></td>
							</tr>
							<?php
							$next_row++;
							$next_row_test = $this->meta->find( 'income_name_' . $next_row );
						} 
						?>
						<tr id="total-row">
							<th scope="row">Total</th>
							<td><span class="income-total">$0.00</span><input type="hidden" name="work_income_total" value="0" class="income-total-input" /></td>
							<td><span class="nonwork-income-total">$0.00</span><input type="hidden" name="nonwork_income_total" value="0" class="nonwork-income-total-input" /></td>
							<td><span class="all-total">$0.00</span><input type="hidden" name="all_income_total" value="0" class="all-total-input" /></td>
						</tr>
					</tbody>
				</table>
				<button class="btn btn-default add-parent" type="button">+ Add Parent/Guardian</button> -->
			</fieldset>
			<hr>
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
			</div>
			<div class="help-block mb-4">
				<small class="text-muted" style="visibility:hidden;"><?= $this->lang->line('email_phone_use'); ?></small>
			</div>
		</div>
	</form>
</div>