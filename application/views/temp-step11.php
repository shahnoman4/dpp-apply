
<?php  if ( $response == 'email' ) { ?>

	<div class="row">
		<div class="col-12">
			<p>Great! Please check your email. You will receive an email detailing what documents to provide. Simply reply to that email with the documents attached.</p>
		</div>
	</div>

<?php } else { ?>

	<form id="step10-form" action="<?=site_url('apply/process/'.$current_step)?>" method="post" style="width: 100%">

		<div class="card">

			<fieldset>
				<!-- <legend>Required Documents</legend> -->

				<!-- <div class="form-group mb-5">
					<label for="verification_document_age">VERIFICATION OF CHILD’S AGE (<?= $this->lang->line('field_required'); ?>)</label>
					<p><em>A copy of the child’s Birth Certificate, baptismal record, or hospital record showing child’s birth. In order to receive DPP funds the student must be 4-years-old on or before October 1 of the school year.</em></p>
					<input type="file" id="verification_document_age" class="form-control-file" name="verification_document_age" required />
				</div>
				<div class="form-group mb-5">
					<label for="verification_document_address">	VERIFICATION OF CURRENT ADDRESS IN THE CITY AND COUNTY OF DENVER (<?= $this->lang->line('field_required'); ?>)</label>
					<p><em>A copy of current lease, proof of home ownership, or utility bill (with service or premise address listed) such as your bill for gas, electric, water or cable.</em></p>
					<input type="file" id="verification_document_address" class="form-control-file" name="verification_document_address" required />
				</div> -->
				<!-- <?php if ( $this->meta->find('disclose_income') == 'yes' ) : ?>
					<div class="form-group mb-5">
						<label for="verification_document_income">VERIFICATION OF ONE MONTH’S INCOME <span class="text-danger">*</span></label>
						<p><em>Most current check stubs (if paid more than once a month, include all stubs for month), wage statement, tax return or other work documents for each parent/guardian’s income. If none of these documents are available, you may provide an income affidavit by contacting 303.595.4DPP(4377).</em></p>
						<input type="file" id="verification_document_income" class="form-control-file" name="verification_document_income" required />
					</div>
				<?php endif; ?> -->

				<!-- <div class="form-group">
					<input type="submit" class="btn btn-primary" value="<?= $this->lang->line('button_save_continue'); ?>" />
				</div> -->
			</fieldset>

		</div>

		<div id="what-happens-next" class="card" style="display:none">
			<h4>What Happens Next?</h4>
			<p>Upon approval, DPP will send a letter informing you and your preschool of the tuition credit for your child. The Tuition Credit will be paid directly to your child’s preschool and deducted from your tuition. Let us know if your family circumstances change after you apply.</p>
		</div>
	</form>	

	<script>


		
		$(document).ready(function($){
	
			// $('#step10-form').on( 'submit', function(e){
			// 	e.preventDefault();
			// 	$('#what-happens-next').slideDown();
			// });
	
		});
	

	
	</script>

<?php } ?>