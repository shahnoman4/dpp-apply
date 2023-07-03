<form id="step8-form" action="<?=site_url('apply/process/'.$current_step)?>" method="post" >
	<div class="row">
	
		<div class="col-12">
			<?php if (!$preschool) : ?>
				<div class="alert alert-danger" role="alert"><?= $this->lang->line('choose_preschool_before'); ?><a href="<?=site_url('apply/step/1')?>"><?= $this->lang->line('click_here'); ?></a><?=$this->lang->line('choose_preschool_after'); ?></div>
			<?php endif;?>

			<div class="card">
				<p><?= $this->lang->line('estimate_tuition_credit'); ?> <strong class="large" style="background:#afa;">$<?=$this->meta->find('estimated_tuition_credit') ?> <?= $this->lang->line('per_month'); ?></strong><?= $this->lang->line('result_estimate'); ?></p>
			</div>
			
			<fieldset style="width:100%;">
				<legend><?= $this->lang->line('review_information'); ?></legend>
				
				 <div class="form-group text-center" style="width:100%">
					<input type="submit" class="btn btn-primary" value="<?= $this->lang->line('button_save_submit'); ?>" />
				</div>
				<table class="table table-striped table-hover" style="width:100%;">
					<tr class="edit-tr">
						<th style="width:33%">
							<?= $this->lang->line('preschool_name'); ?>
							<a href="<?=site_url('apply/step/1/yes/edit')?>" class="edit-link">Edit</a>
						</th>
						<td><?= $this->meta->find('preschool_name'); ?> </td>
					</tr>
					<tr  class="edit-tr">
						<th>
							
							<?= $this->lang->line('estimate_information'); ?>
							<a href="<?=site_url('apply/step/1/yes/edit')?>" class="edit-link">Edit</a>
						</th>
						<td>
							<?= $this->lang->line('annual_income'); ?>: <?= $this->meta->find('income'); ?><br>
							<?= $this->lang->line('household'); ?>: <?= $this->meta->find('total_household'); ?><br>
							<?=ucwords(str_replace('_',' ', $this->meta->find('part_full_day'))); ?><br>
						</td>
					</tr>
					<tr class="edit-tr">
						<th>
							<?= $this->lang->line('child_full_legal_name'); ?>
							<a href="<?=site_url('apply/step/2/edit')?>" class="edit-link">Edit</a>
						</th>
						<td>
							<?=$this->meta->find('child_first_name'); ?>  <?=$this->meta->find('child_middle_name'); ?> <?=$this->meta->find('child_last_name'); ?><br>
							<?= $this->lang->line('child_gender'); ?>: <?=$this->meta->find('gender'); ?><br>
							<?= $this->lang->line('child_dob'); ?>: <?=$this->meta->find('birth_month'); ?> <?=$this->meta->find('birth_day'); ?>, <?=$this->meta->find('birth_year'); ?><br>
							<?= $this->lang->line('household_telephone'); ?>: <?=$this->meta->find('household_telephone'); ?><br>
							<?= $this->lang->line('child_home_address'); ?>: <?=$this->meta->find('child_home_address'); ?><br>
							<?= $this->lang->line('child_home_city'); ?>: <?=$this->meta->find('child_home_city'); ?><br>
							<?= $this->lang->line('child_home_state'); ?>: <?=$this->meta->find('child_home_state'); ?><br>
							<?= $this->lang->line('child_home_zip'); ?>: <?=$this->meta->find('child_home_zip'); ?>
						</td>
					</tr>
					<tr class="edit-tr">
						<th>
						<?= $this->lang->line('parent_full_name'); ?>
							<a href="<?=site_url('apply/step/3/edit')?>" class="edit-link">Edit</a>
						</th>
						<td>
							<?= $this->lang->line('parent_1'); ?>: <?=$this->meta->find('parent_guardian_1'); ?><br> <?= $this->meta->find('parent_1_first_name'); ?> <?= $this->meta->find('parent_1_middle_name'); ?> <?= $this->meta->find('parent_1_last_name'); ?><br>
							<?= $this->lang->line('email'); ?>: <?= $this->meta->find('parent_1_email'); ?><br>
							<?= $this->lang->line('dpp_send_messages'); ?> <?php if($this->meta->find('parent_1_dpp_send_messages')=='yes') { echo "Yes";}else if($this->meta->find('parent_1_dpp_send_messages')=='no') {echo "No";} ?><br>

						<?php if(($this->meta->find('parent_2_first_name')) && $this->meta->find('parent_2_first_name')!=""){ ?>
							<?= $this->lang->line('parent_2'); ?>: <?=$this->meta->find('parent_guardian_2'); ?><br> <?= $this->meta->find('parent_2_first_name'); ?> <?= $this->meta->find('parent_2_middle_name'); ?> <?= $this->meta->find('parent_2_last_name'); ?><br>
							<?php if ( $this->meta->find('parent_2_email') ){ ?>
								<?= $this->lang->line('email'); ?>: <?= $this->meta->find('parent_2_email'); ?><br>
							<?php } ?>
							<?php if ( $this->meta->find('parent_2_dpp_send_messages') ){ ?>
								<?= $this->lang->line('dpp_send_messages'); ?> <?=$this->meta->find('parent_2_dpp_send_messages'); ?><br>
							<?php } 
                            
                        }

							?>
							
						</td>
					</tr>
					<tr class="edit-tr">
						<th>
							<?= $this->lang->line('child_race'); ?>
							<a href="<?=site_url('apply/step/4/edit')?>" class="edit-link">Edit</a>
						</th>
						<td><?php  //print_r($this->meta->find('child_race') );exit(); ?>
							<?= $this->lang->line('child_race'); ?>: <?php if ( in_array('american_indian_alaskan', $this->meta->find('child_race', array()) ) ){ echo $this->lang->line('american_indian_alaskan').", ";} 
							if ( in_array('black', $this->meta->find('child_race', array()) ) ){ echo $this->lang->line('black').", ";}
							if ( in_array('asian', $this->meta->find('child_race', array()) ) ){ echo $this->lang->line('asian').",";}
							if ( in_array('hispanic', $this->meta->find('child_race', array()) ) ){ echo $this->lang->line('hispanic').", ";}
							if ( in_array('white', $this->meta->find('child_race', array()) ) ){ echo $this->lang->line('white').", ";}
							if ( in_array('nationality_other', $this->meta->find('child_race', array()) ) ){ echo $this->lang->line('nationality_other');}
							?>
                               <br>
							<!-- <?= $this->lang->line('home_language'); ?>: <?=$this->meta->find('primary_language');?><br> -->
							<?= $this->lang->line('home_language'); ?>: 
                              <?php if ( in_array('english', $this->meta->find('home_language', array()) ) ){ echo $this->lang->line('english').", ";}
                              if ( in_array('spanish', $this->meta->find('home_language', array()) ) ){ echo $this->lang->line('spanish').", ";}
                              if ( in_array('vietnamese', $this->meta->find('home_language', array()) ) ){ echo $this->lang->line('vietnamese').", ";}
                              if ( in_array('arabic', $this->meta->find('home_language', array()) ) ){ echo $this->lang->line('arabic').", ";}
                              if ( in_array('russian', $this->meta->find('home_language', array()) ) ){ echo $this->lang->line('russian').", ";}
                              if ( in_array('language_other', $this->meta->find('home_language', array()) ) ){ echo $this->lang->line('language_other');}
                               
                               ?>
						</td>
					</tr>
					<!-- <tr class="edit-tr">
						<th>
						<?= $this->lang->line('applying_for_programs'); ?>
							<a href="<?=site_url('apply/step/4/edit')?>" class="edit-link">Edit</a>
						</th>
						<td>
							<?= $this->lang->line('ccap'); ?>: <?php if($this->meta->find('participate_ccap', 'No')=='yes'){echo "Yes";}else {echo $this->meta->find('participate_ccap', 'No');}?><br>
							<?= $this->lang->line('head_start'); ?>: <?php if($this->meta->find('participate_head_start', 'No')=='yes'){echo "Yes";}else { echo $this->meta->find('participate_head_start', 'No');} ?><br>
							<?= $this->lang->line('cpp'); ?>: <?php if($this->meta->find('participate_cpp', 'No')=='yes'){echo "Yes";}else { echo $this->meta->find('participate_cpp', 'No');} ?>
						</td>
					</tr> -->
					<tr class="edit-tr">
						<th>
							<?= $this->lang->line('provide_income'); ?>
							<a href="<?=site_url('apply/step/5/edit')?>" class="edit-link">Edit</a>
						</th>
						<td>
							<?php if($this->meta->find('disclose_income')=='yes'){echo "Yes";}else{echo $this->meta->find('disclose_income');} ?>
							<?php if( 'yes' == $this->meta->find('disclose_income') ){ ?>
								<br>
								<?= $this->lang->line('monthly_total_income'); ?>: $<?= number_format( $this->meta->find('all_income_total', 0), 2 ); ?>
							<?php } ?>
						</td>
					</tr>
					<tr class="edit-tr">
						<th>
							<?= $this->lang->line('how_did_you_hear'); ?>
							<a href="<?=site_url('apply/step/7/edit')?>" class="edit-link">Edit</a>
						</th>
						<td>
							<?= implode( ', ', $this->meta->find('hear_dpp', array()) ); ?><br><?= $this->meta->find('hear_dppother_text') ?>
						</td>
					</tr>
					<tr class="edit-tr">
						<th>
							<?= $this->lang->line('use_dpp_resources'); ?>
							<a href="<?=site_url('apply/step/7/edit')?>" class="edit-link">Edit</a>
						</th>
						<td>
							<?php if($this->meta->find('use_dpp_resources')=='yes'){echo "Yes";}else{ echo $this->meta->find('use_dpp_resources');}?>
						</td>
					</tr>
				</table>
				
				<div class="form-group text-center" style="width:100%">
					<input type="submit" class="btn btn-primary" value="<?= $this->lang->line('button_save_submit'); ?>" />
				<br>
				<br>
		        <a href="<?=site_url('apply/step/7')?>" class="btn btn-secondary"><?= $this->lang->line('button_previous'); ?></a>
				</div>
				
				
			</fieldset>
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