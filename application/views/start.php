<div class="row">
	<form action="<?=site_url('apply/process/start')?>" method="post">
	    <div class="col-12 text-center">
	        <div class="form-group">
	        	<div class="text-left"><?= $this->lang->line('application_start_before'); ?><a href="<?=$pdf?>" target="_blank"><?= $this->lang->line('download'); ?></a><?=$this->lang->line('application_start_after'); ?></div>
	        	<hr />
		        <label>Choose Language <span class="text-muted">/ Elegir Idioma</span></label>
		        <div>
			        <div >
					  <label class="btn language-button">
					    <input type="radio" name="language" value="english" id="english" autocomplete="off" <?php if($this->session->userdata('language') == 'english' || !$this->session->userdata('language')) echo 'checked="checked"'; ?>> English
					  </label>
					  <label class="btn language-button">
					    <input type="radio" name="language" value="spanish" id="spanish" autocomplete="off" <?php if($this->session->userdata('language') == 'spanish') echo 'checked="checked"'; ?>> Espa&nacute;ol
					  </label>
					</div>
		        </div>
	        </div>
	        <span class="text-danger small" style="display: none;"><?= $this->lang->line('emmail_or_Phone'); ?></span>
	        <div class="form-group">
		        <label><?= $this->lang->line('email_address'); ?></label>
		        <input type="email" name="email" id="email" class="form-control email-input"/>
	        </div>
	        <div class="form-group">
		        <label><?= $this->lang->line('mobile_phone'); ?></label>
		        <input type="text" name="phone" id="phone" class="form-control phone-input" />
	        </div>
	        <div class="help-block mb-4">
		        <small class="text-muted"><?= $this->lang->line('email_phone_use'); ?></small>
	        </div>
	        <div class="form-group">
		        <input type="submit" class="btn btn-primary" id="continue_submit" value="<?= $this->lang->line('button_save_continue'); ?>" disabled/>
	        </div>
	    </div>
	</form>
</div>

<div class="row">
	<div class="col-12">
		<hr />
		<p><small><?= $this->lang->line('application_start_footer'); ?></small></p>
	</div>
</div>
<script>
	$(document).ready(function(){
		if($(".email-input").val() || $(".phone-input").val()) {
			$(".small").hide();
			$("#continue_submit").attr("disabled", null);
		}
	
		var flagEmail = 0;
		var flagPhone = 0;

		$(".email-input").on("keyup", function(){
			var emailVal = $(".email-input").val();
			if( emailVal != "" ){
				flagEmail = 1;
				$("#continue_submit").attr("required", "required");
				$("#continue_submit").attr("disabled", null);
				$(".small").hide();
			} else if ( emailVal == "") {
				flagEmail = 0;
				if( flagPhone == 0 ){
					$("#continue_submit").attr("disabled", "disabled");
				    $(".small").show();
				}
			}
		})

		$(".phone-input").on("keyup", function(){
			var phoneVal = $(".phone-input").val();
			if( phoneVal != ""){
				flagPhone = 1;
				$("#continue_submit").attr("disabled", null);
				$(".small").hide();
			} else if( phoneVal == "" ) {
				flagPhone = 0;
				if ( flagEmail == 0 ){
					$("#continue_submit").attr("disabled", "disabled");
				    $(".small").show();
				}
				
			}
		})

		$("#phone").keydown(function (e) {
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