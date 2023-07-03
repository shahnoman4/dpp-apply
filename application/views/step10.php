<form action="<?=site_url('apply/process/'.$current_step)?>" method="post">
	<div class="row">
	        <?php 
                  //echo $this->meta->find('verification_document_address'); exit();
	        if($this->meta->find('upload_document')==$this->lang->line('ready_upload_document') && $this->meta->find('upload_documents')==$this->lang->line('ready_upload_document')) { ?>
		    <div class="col-12">

				<div class="form-group text-center" style="width:100%">
					<p><?= $this->lang->line('thank_you'); ?></p> 

					
					[ If required documents haven't been submitted, ask them to check their e-mail now. ]

					
				</div>

			</div>
            <?php }else{ ?>
			

	        <fieldset >
				<legend><?= $this->lang->line('required_documents'); ?></legend>
               <?php if($this->meta->find('upload_document')==$this->lang->line('email_documents_later')){?>
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
				<input type="hidden"  class="form-check-input" name="upload_document" value="<?= $this->lang->line('ready_upload_document'); ?>" onchange="return dataSaved();">

               <?php }?>
               <?php if($this->meta->find('upload_documents')==$this->lang->line('email_documents_later')){?>
				<div class="form-group card">
                    <legend for="verification_document_income"><?= $this->lang->line('verification_one_month_income'); ?> <span class="text-danger">*</span></legend>
				    <?= $this->lang->line('most_current_check_stubs'); ?>

		            <div class="preview-zone3">
		              <div class="box3 box-solid">
		                <div class="box-header3 with-border">
		                </div>
		                <div class="box-body3"></div>
		              </div>
		            </div>
		            <div class="dropzone-wrapper3">
		              <div class="dropzone-desc3">
		                <i class="glyphicon glyphicon-download-alt"></i>
		                <p><?= $this->lang->line('choose_file'); ?></p>
		              </div>
		              <!-- <input type="file" name="img_logo" class="dropzone"> -->
		              <input type="file" id="verification_document_income" class="form-control-file dropzone3" name="verification_document_income[]" multiple="multiple" required="required" />
		            </div>
				</div>
				<input type="hidden"  class="form-check-input" name="upload_documents" value="<?= $this->lang->line('ready_upload_document'); ?>" onchange="return dataSaved();">
				<?php }?>
			</fieldset>	
			

			<div class="form-group text-center" style="width:100%">
				<input type="submit" class="btn btn-primary" value="<?= $this->lang->line('button_save_continue'); ?>" />
        <br>
        <br>
            <a href="<?=site_url('apply/step/8')?>" class="btn btn-secondary"><?= $this->lang->line('button_previous'); ?></a>
			</div>
			<?php } ?>	
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


/*file 3*/
.box3 {
  position: relative;
  background: #ffffff;
  width: 100%;
}

.box-header3 {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}

.box-tools3 {
  position: absolute;
  right: 10px;
  top: 5px;
}


.dropzone-wrapper3 {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}

.dropzone-desc3 {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}

.dropzone3,
.dropzone3:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper3:hover,
.dropzone-wrapper3.dragover3 {
  background: #ecf0f5;
}

.preview-zone3 {
  text-align: center;
}

.preview-zone3 .box3 {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}
</style>

<script>
///////////////
// file 1
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

//file 3
function readFile3(input) {
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
      var previewZone = $(input).parent().parent().find('.preview-zone3');
      var boxZone = $(input).parent().parent().find('.preview-zone3').find('.box3').find('.box-body3');

      wrapperZone.removeClass('dragover3');
      previewZone.removeClass('hidden3');
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[i]);
  }
  }
}


$(".dropzone3").change(function() {
  readFile3(this);
});


/////////////////
</script>