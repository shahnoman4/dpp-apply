<div class="row">
	<form id="step8-form" action="<?=site_url('apply/process/'.$current_step)?>" method="post">
		<div class="col-12">
			<?php if (!$preschool) : ?>
				<div class="alert alert-danger" role="alert"><?= $this->lang->line('choose_preschool_before'); ?><a href="<?=site_url('apply/step/1')?>"><?= $this->lang->line('click_here'); ?></a><?=$this->lang->line('choose_preschool_after'); ?></div>
			<?php endif;?>
			<fieldset>
				<legend><?= $this->lang->line('review_information'); ?></legend>

				<div class="form-group">
					<label><?= $this->lang->line('preschool_name'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<input type="text" name="preschool_name" class="form-control" value="<?= $this->meta->find('preschool_name'); ?>" required />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('street_address_apt'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<input type="text" name="preschool_street_address_apt" class="form-control" value="<?= $this->meta->find('preschool_street_address_apt'); ?>" required />
				</div>

				<div class="form-group">
					<label><?= $this->lang->line('city_state_zip'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<input type="text" name="preschool_city_state_zip" class="form-control" value="<?= $this->meta->find('preschool_city_state_zip'); ?>" required />
				</div>

				<div class="form-group">
					<label><?= $this->lang->line('choose_one'); ?></label>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="part_full_day" value="part_day" id="option1" autocomplete="off" <?= $this->meta->find('part_full_day') == 'part_day' ? 'checked="checked"' : '' ?>>
						<label for="option1" class="form-check-label">
							&nbsp;<?= $this->lang->line('part_day'); ?> <span class="text-muted">(<?= $this->lang->line('5_hours_wk'); ?>)</span>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="part_full_day" value="full_day" id="option2" autocomplete="off" <?= $this->meta->find('part_full_day') == 'full_day' ? 'checked="checked"' : '' ?>>
						<label for="option2" class="form-check-label">
							&nbsp;<?= $this->lang->line('full_day'); ?> <span class="text-muted"> (<?= $this->lang->line('25_hours_wk'); ?>)</span>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="part_full_day" value="extended_day" id="option3" autocomplete="off" <?= $this->meta->find('part_full_day') == 'extended_day' ? 'checked="checked"' : '' ?>>
						<label for="option3" class="form-check-label">
							&nbsp;<?= $this->lang->line('extended_day'); ?> <span class="text-muted"> (<?= $this->lang->line('33_hours_wk'); ?>)</span>
						</label>
					</div>
				</div>

				<div class="form-group">
					<label><?= $this->lang->line('first_name'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<input type="text" name="child_first_name" class="form-control" value="<?= $this->meta->find('child_first_name'); ?>" required />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('middle_name'); ?></label>
					<input type="text" name="child_middle_name"  class="form-control" value="<?= $this->meta->find('child_middle_name'); ?>" />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('last_name'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<input type="text" name="child_last_name"  class="form-control" value="<?= $this->meta->find('child_last_name'); ?>" required />
				</div>
				
				<div class="form-group">
			        <label><?= $this->lang->line('child_gender'); ?></span></label>
			        <div>
				        <div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-secondary <?= $this->meta->find('gender') == 'Female' ? 'active' : '' ?>">
						    <input type="radio" name="gender" value="Female" id="female" autocomplete="off" <?= $this->meta->find('gender') == 'Female' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('child_gender_female'); ?>
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('gender') == 'Male' ? 'active' : '' ?>">
						    <input type="radio" name="gender" value="Male" id="male" autocomplete="off" <?= $this->meta->find('gender') == 'Male' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('child_gender_male'); ?>
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('gender') == 'Other' ? 'active' : '' ?>">
						    <input type="radio" name="gender" value="Other" id="other" autocomplete="off" <?= $this->meta->find('gender') == 'Other' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('child_gender_other'); ?>
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('gender') == 'Prefer not to say' ? 'active' : '' ?>">
						    <input type="radio" name="gender" value="Prefer not to say" id="prefer_not_to_say" autocomplete="off" <?= $this->meta->find('gender') == 'Prefer not to say' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('child_gender_prefer'); ?>
						  </label>
						</div>
			        </div>
		        </div>
				<div class="form-group">
					<label><?= $this->lang->line('child_dob'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<div class="row">
						<div class="col-6">
							<select name="birth_month" class="form-control">
								<option value="1" <?= $this->meta->find('birth_month') == '1' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_jan'); ?></option>
								<option value="2" <?= $this->meta->find('birth_month') == '2' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_feb'); ?></option>
								<option value="3" <?= $this->meta->find('birth_month') == '3' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_mar'); ?></option>
								<option value="4" <?= $this->meta->find('birth_month') == '4' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_apr'); ?></option>
								<option value="5" <?= $this->meta->find('birth_month') == '5' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_may'); ?></option>
								<option value="6" <?= $this->meta->find('birth_month') == '6' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_jun'); ?></option>
								<option value="7" <?= $this->meta->find('birth_month') == '7' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_jul'); ?></option>
								<option value="8" <?= $this->meta->find('birth_month') == '8' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_aug'); ?></option>
								<option value="9" <?= $this->meta->find('birth_month') == '9' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_sep'); ?></option>
								<option value="10" <?= $this->meta->find('birth_month') == '10' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_oct'); ?></option>
								<option value="11" <?= $this->meta->find('birth_month') == '11' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_nov'); ?></option>
								<option value="12" <?= $this->meta->find('birth_month') == '12' ? 'selected="selected"' : '' ?>><?= $this->lang->line('month_dec'); ?></option>
							</select>
						</div>
						<div class="col-3">
							<select name="birth_day" class="form-control">
								<option value="1" <?= $this->meta->find('birth_day') == '1' ? 'selected="selected"' : '' ?>>01</option>
								<option value="2" <?= $this->meta->find('birth_day') == '2' ? 'selected="selected"' : '' ?>>02</option>
								<option value="3" <?= $this->meta->find('birth_day') == '3' ? 'selected="selected"' : '' ?>>03</option>
								<option value="4" <?= $this->meta->find('birth_day') == '4' ? 'selected="selected"' : '' ?>>04</option>
								<option value="5" <?= $this->meta->find('birth_day') == '5' ? 'selected="selected"' : '' ?>>05</option>
								<option value="6" <?= $this->meta->find('birth_day') == '6' ? 'selected="selected"' : '' ?>>06</option>
								<option value="7" <?= $this->meta->find('birth_day') == '7' ? 'selected="selected"' : '' ?>>07</option>
								<option value="8" <?= $this->meta->find('birth_day') == '8' ? 'selected="selected"' : '' ?>>08</option>
								<option value="9" <?= $this->meta->find('birth_day') == '9' ? 'selected="selected"' : '' ?>>09</option>
								<option value="10" <?= $this->meta->find('birth_day') == '10' ? 'selected="selected"' : '' ?>>10</option>
								<option value="11" <?= $this->meta->find('birth_day') == '11' ? 'selected="selected"' : '' ?>>11</option>
								<option value="12" <?= $this->meta->find('birth_day') == '12' ? 'selected="selected"' : '' ?>>12</option>
								<option value="13" <?= $this->meta->find('birth_day') == '13' ? 'selected="selected"' : '' ?>>13</option>
								<option value="14" <?= $this->meta->find('birth_day') == '14' ? 'selected="selected"' : '' ?>>14</option>
								<option value="15" <?= $this->meta->find('birth_day') == '15' ? 'selected="selected"' : '' ?>>15</option>
								<option value="16" <?= $this->meta->find('birth_day') == '16' ? 'selected="selected"' : '' ?>>16</option>
								<option value="17" <?= $this->meta->find('birth_day') == '17' ? 'selected="selected"' : '' ?>>17</option>
								<option value="18" <?= $this->meta->find('birth_day') == '18' ? 'selected="selected"' : '' ?>>18</option>
								<option value="19" <?= $this->meta->find('birth_day') == '19' ? 'selected="selected"' : '' ?>>19</option>
								<option value="20" <?= $this->meta->find('birth_day') == '20' ? 'selected="selected"' : '' ?>>20</option>
								<option value="21" <?= $this->meta->find('birth_day') == '21' ? 'selected="selected"' : '' ?>>21</option>
								<option value="22" <?= $this->meta->find('birth_day') == '22' ? 'selected="selected"' : '' ?>>22</option>
								<option value="23" <?= $this->meta->find('birth_day') == '23' ? 'selected="selected"' : '' ?>>23</option>
								<option value="24" <?= $this->meta->find('birth_day') == '24' ? 'selected="selected"' : '' ?>>24</option>
								<option value="25" <?= $this->meta->find('birth_day') == '25' ? 'selected="selected"' : '' ?>>25</option>
								<option value="26" <?= $this->meta->find('birth_day') == '26' ? 'selected="selected"' : '' ?>>26</option>
								<option value="27" <?= $this->meta->find('birth_day') == '27' ? 'selected="selected"' : '' ?>>27</option>
								<option value="28" <?= $this->meta->find('birth_day') == '28' ? 'selected="selected"' : '' ?>>28</option>
								<option value="29" <?= $this->meta->find('birth_day') == '29' ? 'selected="selected"' : '' ?>>29</option>
								<option value="30" <?= $this->meta->find('birth_day') == '30' ? 'selected="selected"' : '' ?>>30</option>
								<option value="31" <?= $this->meta->find('birth_day') == '31' ? 'selected="selected"' : '' ?>>31</option>
							</select>
						</div>
						<div class="col-3">
							<select name="birth_year" class="form-control">
								<option value="2016" <?= $this->meta->find('birth_year') == '2016' ? 'selected="selected"' : '' ?>>2016</option>
								<option value="2015" <?= $this->meta->find('birth_year') == '2015' ? 'selected="selected"' : '' ?>>2015</option>
								<option value="2014" <?= $this->meta->find('birth_year') == '2014' ? 'selected="selected"' : '' ?>>2014</option>
								<option value="2013" <?= $this->meta->find('birth_year') == '2013' ? 'selected="selected"' : '' ?>>2013</option>
								<option value="2012" <?= $this->meta->find('birth_year') == '2012' ? 'selected="selected"' : '' ?>>2012</option>
								<option value="2011" <?= $this->meta->find('birth_year') == '2011' ? 'selected="selected"' : '' ?>>2011</option>
								<option value="2010" <?= $this->meta->find('birth_year') == '2010' ? 'selected="selected"' : '' ?>>2010</option>
								<option value="2009" <?= $this->meta->find('birth_year') == '2009' ? 'selected="selected"' : '' ?>>2009</option>
								<option value="2008" <?= $this->meta->find('birth_year') == '2008' ? 'selected="selected"' : '' ?>>2008</option>
								<option value="2007" <?= $this->meta->find('birth_year') == '2007' ? 'selected="selected"' : '' ?>>2007</option>
								<option value="2006" <?= $this->meta->find('birth_year') == '2006' ? 'selected="selected"' : '' ?>>2006</option>
								<option value="2005" <?= $this->meta->find('birth_year') == '2005' ? 'selected="selected"' : '' ?>>2005</option>
								<option value="2004" <?= $this->meta->find('birth_year') == '2004' ? 'selected="selected"' : '' ?>>2004</option>
								<option value="2003" <?= $this->meta->find('birth_year') == '2003' ? 'selected="selected"' : '' ?>>2003</option>
								<option value="2002" <?= $this->meta->find('birth_year') == '2002' ? 'selected="selected"' : '' ?>>2002</option>
								<option value="2001" <?= $this->meta->find('birth_year') == '2001' ? 'selected="selected"' : '' ?>>2001</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label><?= $this->lang->line('parent_1'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<div>
				        <div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-secondary <?= $this->meta->find('parent_guardian_1') == 'parent' ? 'active' : '' ?>">
						    <input type="radio" name="parent_guardian_1" value="parent" id="parent_1" autocomplete="off" <?= $this->meta->find('parent_guardian_1') == 'parent' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('parent'); ?>
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('parent_guardian_1') == 'guardian' ? 'active' : '' ?>">
						    <input type="radio" name="parent_guardian_1" value="guardian" id="guardian_1" autocomplete="off" <?= $this->meta->find('parent_guardian_1') == 'guardian' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('guardian'); ?>
						  </label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('first_name'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<input type="text" name="parent_1_first_name" class="form-control" value="<?= $this->meta->find('parent_1_first_name'); ?>" required />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('middle_name'); ?></label>
					<input type="text" name="parent_1_middle_name" class="form-control" value="<?= $this->meta->find('parent_1_middle_name'); ?>" />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('last_name'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<input type="text" name="parent_1_last_name" class="form-control" value="<?= $this->meta->find('parent_1_last_name'); ?>" required />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('email'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<input type="email" name="parent_1_email" class="form-control" value="<?= $this->session->userdata('email'); ?>" />
				</div>
				<div class="form-group row">
					<div class="col-12">
						<label><?= $this->lang->line('work_telephone'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
						<input type="text" name="parent_1_telephone" class="form-control phone-input" value="<?= $this->session->userdata('phone'); ?>" required />
					</div>
					
				</div>

				<div class="form-group">
					<label><?= $this->lang->line('dpp_send_messages'); ?> <span
							class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></label>
					<div>
				        <div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-secondary <?= $this->meta->find('parent_1_dpp_send_messages') == 'yes' ? 'active' : '' ?>">
						    <input type="radio" name="parent_1_dpp_send_messages" value="yes" id="dpp_send_messages_1_yes" autocomplete="off" <?= $this->meta->find('parent_1_dpp_send_messages') == 'yes' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('yes'); ?>
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('parent_1_dpp_send_messages') == 'no' ? 'active' : '' ?>">
						    <input type="radio" name="parent_1_dpp_send_messages" value="no" id="dpp_send_messages_1_no" autocomplete="off" <?= $this->meta->find('parent_1_dpp_send_messages') == 'no' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('no'); ?>
						  </label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('parent_2'); ?></label>
					<div>
				        <div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-secondary <?= $this->meta->find('parent_guardian_2') == 'parent' ? 'active' : '' ?>">
						    <input type="radio" name="parent_guardian_2" value="parent" id="parent_2" autocomplete="off" <?= $this->meta->find('parent_guardian_2') == 'parent' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('parent'); ?>
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('parent_guardian_2') == 'guardian' ? 'active' : '' ?>">
						    <input type="radio" name="parent_guardian_2" value="guardian" id="guardian_2" autocomplete="off" <?= $this->meta->find('parent_guardian_2') == 'guardian' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('guardian'); ?>
						  </label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('first_name'); ?></label>
					<input type="text" name="parent_2_first_name" class="form-control" value="<?= $this->meta->find('parent_2_first_name'); ?>" />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('middle_name'); ?></label>
					<input type="text" name="parent_2_middle_name" class="form-control" value="<?= $this->meta->find('parent_2_middle_name'); ?>" />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('last_name'); ?></label>
					<input type="text" name="parent_2_last_name" class="form-control" value="<?= $this->meta->find('parent_2_last_name'); ?>" />
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('email'); ?></label>
					<input type="email" name="parent_2_email" class="form-control" value="<?= $this->meta->find('parent_2_email'); ?>" />
				</div>
				<div class="form-group row">
					<div class="col-12">
						<label><?= $this->lang->line('work_telephone'); ?></label>
						<input type="text" name="parent_2_telephone" class="form-control phone-input2" value="<?= $this->meta->find('parent_2_telephone'); ?>" />
					</div>
					
				</div>

				<div class="form-group">
					<label><?= $this->lang->line('dpp_send_messages'); ?></label>
					<div>
				        <div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-secondary <?= $this->meta->find('parent_2_dpp_send_messages') == 'yes' ? 'active' : '' ?>">
						    <input type="radio" name="parent_2_dpp_send_messages" value="yes" id="dpp_send_messages_2_yes" autocomplete="off" <?= $this->meta->find('parent_2_dpp_send_messages') == 'yes' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('yes'); ?>
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('parent_2_dpp_send_messages') == 'no' ? 'active' : '' ?>">
						    <input type="radio" name="parent_2_dpp_send_messages" value="no" id="dpp_send_messages_2_no" autocomplete="off" <?= $this->meta->find('parent_2_dpp_send_messages') == 'no' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('no'); ?>
						  </label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<legend><?= $this->lang->line('child_race'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></legend>

					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="child_race[]" id="child_race_1" value="american_indian_alaskan" autocomplete="off" <?= in_array('american_indian_alaskan', $this->meta->find('child_race')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="child_race_1">
							&nbsp;<?= $this->lang->line('american_indian_alaskan'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="child_race[]" id="child_race_2" value="black" autocomplete="off" <?= in_array('black', $this->meta->find('child_race')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="child_race_2">
							&nbsp;<?= $this->lang->line('black'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="child_race[]" id="child_race_3" value="asian" autocomplete="off" <?= in_array('asian', $this->meta->find('child_race')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="child_race_3">
							&nbsp;<?= $this->lang->line('asian'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="child_race[]" id="child_race_4" value="hispanic" autocomplete="off" <?= in_array('hispanic', $this->meta->find('child_race')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="child_race_4">
							&nbsp;<?= $this->lang->line('hispanic'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="child_race[]" id="child_race_5" value="white" autocomplete="off" <?= in_array('white', $this->meta->find('child_race')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="child_race_5">
							&nbsp;<?= $this->lang->line('white'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="child_race[]" id="child_race_6" value="other" autocomplete="off" <?= in_array('other', $this->meta->find('child_race')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="child_race_6">
							&nbsp;<?= $this->lang->line('nationality_other'); ?>:
						</label>
						<input type="text" name="child_race_other" class="form-control" value="<?= $this->meta->find('child_race_other'); ?>" />
					</div>
				</div>

				<legend><?= $this->lang->line('child_language'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></legend>

				<div class="form-group">
					<h6></h6>

					<div class="form-check">
						<input type="radio" class="form-check-input" name="primary_language" id="primary_language_1" value="english" autocomplete="off" <?= $this->meta->find('primary_language') == 'english' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="primary_language_1">
							&nbsp;<?= $this->lang->line('english'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="primary_language" id="primary_language_2" value="spanish" autocomplete="off" <?= $this->meta->find('primary_language') == 'spanish' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="primary_language_2">
							&nbsp;<?= $this->lang->line('spanish'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="primary_language" id="primary_language_3" value="vietnamese" autocomplete="off" <?= $this->meta->find('primary_language') == 'vietnamese' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="primary_language_3">
							&nbsp;<?= $this->lang->line('vietnamese'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="primary_language" id="primary_language_4" value="arabic" autocomplete="off" <?= $this->meta->find('primary_language') == 'arabic' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="primary_language_4">
							&nbsp;<?= $this->lang->line('arabic'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="primary_language" id="primary_language_5" value="russian" autocomplete="off" <?= $this->meta->find('primary_language') == 'russian' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="primary_language_5">
							&nbsp;<?= $this->lang->line('russian'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="primary_language" id="primary_language_6" value="other" autocomplete="off" <?= $this->meta->find('primary_language') == 'other' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="primary_language_6">
							&nbsp;<?= $this->lang->line('language_other'); ?>:
						</label>
						<input type="text" name="primary_language_other" class="form-control" value="<?= $this->meta->find('primary_language_other'); ?>" />
					</div>
				</div>

				<legend><?= $this->lang->line('home_language'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></legend>

				<div class="form-group">
					<h6></h6>

					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="home_language[]" id="home_language_1" value="english" autocomplete="off" <?= in_array('english', $this->meta->find('home_language')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="home_language_1">
							&nbsp;<?= $this->lang->line('english'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="home_language[]" id="home_language_2" value="spanish" autocomplete="off" <?= in_array('spanish', $this->meta->find('home_language')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="home_language_2">
							&nbsp;<?= $this->lang->line('spanish'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="home_language[]" id="home_language_3" value="vietnamese" autocomplete="off" <?= in_array('vietnamese', $this->meta->find('home_language')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="home_language_3">
							&nbsp;<?= $this->lang->line('vietnamese'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="home_language[]" id="home_language_4" value="arabic" autocomplete="off" <?= in_array('arabic', $this->meta->find('home_language')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="home_language_4">
							&nbsp;<?= $this->lang->line('arabic'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="home_language[]" id="home_language_5" value="russian" autocomplete="off" <?= in_array('russian', $this->meta->find('home_language')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="home_language_5">
							&nbsp;<?= $this->lang->line('russian'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="home_language[]" id="home_language_6" value="other" autocomplete="off" <?= in_array('other', $this->meta->find('home_language')) ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="home_language_6">
							&nbsp;<?= $this->lang->line('language_other'); ?>:
						</label>
						<input type="text" name="home_language_other" class="form-control" value="<?= $this->meta->find('home_language_other'); ?>" />
					</div>
				</div>

				<legend><?= $this->lang->line('provide_income'); ?></legend>

				<div class="form-group">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="disclose_income" value="yes" id="disclose_income_yes" autocomplete="off" <?= $this->meta->find('disclose_income') == 'yes' ? 'checked="checked"' : '' ?>>
						<label for="disclose_income_yes" class="form-check-label">
							&nbsp;<?= $this->lang->line('like_to_provide'); ?> (<?= $this->lang->line('information_required'); ?>)
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="disclose_income" value="no" id="disclose_income_no" autocomplete="off" <?= $this->meta->find('disclose_income') == 'no' ? 'checked="checked"' : '' ?>>
						<label for="disclose_income_no" class="form-check-label">
							&nbsp;<?= $this->lang->line('skip_disclosal'); ?> (<?= $this->lang->line('minimum_financial'); ?>)
						</label>
					</div>
					
				</div>

				<em>[Income section to be added...]</em>

				<div class="form-group">
					<label><?= $this->lang->line('place_x_household'); ?> <span class="text-muted">(<?= $this->lang->line('including_yourself'); ?>)</span></label>
					<div>
				        <div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-secondary <?= $this->meta->find('total_household') == '2' ? 'active' : '' ?>">
						    <input type="radio" name="total_household" value="2" id="total_household_2" autocomplete="off" <?= $this->meta->find('total_household') == '2' ? 'checked="checked"' : '' ?>> 2
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('total_household') == '3' ? 'active' : '' ?>">
						    <input type="radio" name="total_household" value="3" id="total_household_3" autocomplete="off" <?= $this->meta->find('total_household') == '3' ? 'checked="checked"' : '' ?>> 3
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('total_household') == '4' ? 'active' : '' ?>">
						    <input type="radio" name="total_household" value="4" id="total_household_4" autocomplete="off" <?= $this->meta->find('total_household') == '4' ? 'checked="checked"' : '' ?>> 4
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('total_household') == '5' ? 'active' : '' ?>">
						    <input type="radio" name="total_household" value="5" id="total_household_5" autocomplete="off" <?= $this->meta->find('total_household') == '5' ? 'checked="checked"' : '' ?>> 5
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('total_household') == '6' ? 'active' : '' ?>">
						    <input type="radio" name="total_household" value="6" id="total_household_6" autocomplete="off" <?= $this->meta->find('total_household') == '6' ? 'checked="checked"' : '' ?>> 6
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('total_household') == '7' ? 'active' : '' ?>">
						    <input type="radio" name="total_household" value="7" id="total_household_7" autocomplete="off" <?= $this->meta->find('total_household') == '7' ? 'checked="checked"' : '' ?>> 7
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('total_household') == '8' ? 'active' : '' ?>">
						    <input type="radio" name="total_household" value="8" id="total_household_8" autocomplete="off" <?= $this->meta->find('total_household') == '8' ? 'checked="checked"' : '' ?>> 8
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('total_household') == '9' ? 'active' : '' ?>">
						    <input type="radio" name="total_household" value="9" id="total_household_9" autocomplete="off" <?= $this->meta->find('total_household') == '9' ? 'checked="checked"' : '' ?>> 9
						  </label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label><?= $this->lang->line('applying_for_programs'); ?></label>

					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="participate_ccap" value="yes" id="option11" autocomplete="off" <?= $this->meta->find('participate_ccap') == 'yes' ? 'checked="checked"' : '' ?>>
						<label for="option11" class="form-check-label">
							&nbsp;<?= $this->lang->line('ccap'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="participate_head_start" value="yes" id="option12" autocomplete="off" <?= $this->meta->find('participate_head_start') == 'yes' ? 'checked="checked"' : '' ?>>
						<label for="option12" class="form-check-label">
							&nbsp;<?= $this->lang->line('head_start'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="participate_cpp" value="yes" id="option13" autocomplete="off" <?= $this->meta->find('participate_cpp') == 'yes' ? 'checked="checked"' : '' ?>>
						<label for="option13" class="form-check-label">
							&nbsp;<?= $this->lang->line('cpp'); ?>
						</label>
					</div>
				</div>

				<fieldset>
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

				<div class="btn-group btn-group-toggle" data-toggle="buttons">
				  <label class="btn btn-secondary <?= $this->meta->find('research_study_contact') == 'yes' ? 'active' : '' ?>">
				    <input type="radio" name="research_study_contact" value="yes" autocomplete="off" <?= $this->meta->find('research_study_contact') == 'yes' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('yes'); ?>
				  </label>
				  <label class="btn btn-secondary <?= $this->meta->find('research_study_contact') == 'no' ? 'active' : '' ?>">
				    <input type="radio" name="research_study_contact" value="no" autocomplete="off" <?= $this->meta->find('research_study_contact') == 'no' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('no'); ?>
				  </label>
				</div>

				<legend style="padding-top: 2rem;"><?= $this->lang->line('how_did_you_hear'); ?> <span class="text-muted">(<?= $this->lang->line('field_required'); ?>)</span></legend>

				<div class="form-group">
					<h6></h6>

					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="brochure" id="option1" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'brochure' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option1">
							&nbsp;<?= $this->lang->line('hear_option_1'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="postcard" id="option2" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'postcard' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option2">
							&nbsp;<?= $this->lang->line('hear_option_2'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="showcase" id="option3" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'showcase' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option3">
							&nbsp;<?= $this->lang->line('hear_option_3'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="community" id="option4" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'community' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option4">
							&nbsp;<?= $this->lang->line('hear_option_4'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="friend" id="option5" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'friend' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option5">
							&nbsp;<?= $this->lang->line('hear_option_5'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="staff" id="option6" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'staff' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option6">
							&nbsp;<?= $this->lang->line('hear_option_6'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="ad" id="option7" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'ad' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option7">
							&nbsp;<?= $this->lang->line('hear_option_7'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="search" id="option8" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'search' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option8">
							&nbsp;<?= $this->lang->line('hear_option_8'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="print" id="option9" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'print' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option9">
							&nbsp;<?= $this->lang->line('hear_option_9'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="radio" id="option10" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'radio' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option10">
							&nbsp;<?= $this->lang->line('hear_option_10'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="sign" id="option11" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'sign' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option11">
							&nbsp;<?= $this->lang->line('hear_option_11'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="social" id="option12" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'social' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option12">
							&nbsp;<?= $this->lang->line('hear_option_12'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="tv" id="option13" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'tv' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option13">
							&nbsp;<?= $this->lang->line('hear_option_13'); ?>
						</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="hear_dpp" value="other" id="option14" autocomplete="off" <?= $this->meta->find('hear_dpp') == 'other' ? 'checked="checked"' : '' ?>>
						<label class="form-check-label" for="option14">
							&nbsp;<?= $this->lang->line('hear_option_14'); ?>
						</label>
						<input type="text" name="hear_dppother_text" class="form-control" value="<?= $this->meta->find('hear_dppother_text'); ?>" />
					</div>

				</div>

				<div class="form-group">
					<label><?= $this->lang->line('use_dpp_resources'); ?></label>
					<div>
				        <div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-secondary <?= $this->meta->find('use_dpp_resources') == 'yes' ? 'active' : '' ?>">
						    <input type="radio" name="use_dpp_resources" value="yes" id="use_dpp_resources_yes" autocomplete="off" <?= $this->meta->find('use_dpp_resources') == 'yes' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('yes'); ?>
						  </label>
						  <label class="btn btn-secondary <?= $this->meta->find('use_dpp_resources') == 'no' ? 'active' : '' ?>">
						    <input type="radio" name="use_dpp_resources" value="no" id="use_dpp_resources_no" autocomplete="off" <?= $this->meta->find('use_dpp_resources') == 'no' ? 'checked="checked"' : '' ?>> <?= $this->lang->line('no'); ?>
						  </label>
						</div>
					</div>
				</div>

			</fieldset>
		</div>
	</form>
</div>