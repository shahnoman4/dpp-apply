<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $this->lang->line('tuition_credit_application'); ?> | <?= $this->lang->line('dpp'); ?></title>
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Sanchez|Nunito+Sans:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/css/custom.css">
    <link rel="stylesheet" href="<?= base_url() ?>/js/chosen/chosen.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>/js/cleave/cleave.min.js"></script>
    <script src="<?= base_url() ?>/js/cleave/cleave-phone.us.js"></script>
    <script src="<?= base_url() ?>/js/chosen/chosen.jquery.min.js"></script>
    <script src="<?= base_url() ?>/js/dpp-calculator-apply.js"></script>
  <style type="text/css">
    .btn-primary:hover {
    background-color: #6f2620;
    border-color: #6f2620;
}

.btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgb(151, 52, 43);
}
.btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #6f2620;
    border-color: #6f2620;
}

.btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #6f2620;
    border-color: #6f2620;
}
  </style>  
  </head>

  <body>

    <div class="container">
      <div class="py-3 text-center">
        <img class="d-block mx-auto mb-4" src="https://dpp.org/wp-content/themes/dpporg-theme/assets/images/dpp-logo.png" width="150" alt="Denver Preschool Program">
        <h2><?= $this->lang->line('tuition_credit_application'); ?></h2>
      </div>
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: <?= (isset($current_step) ? $current_step / 8 * 100 : 0) ?>%"></div>
      </div>
      
      <div class="card">