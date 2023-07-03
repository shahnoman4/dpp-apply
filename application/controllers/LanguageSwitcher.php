<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LanguageSwitcher extends CI_Controller
{
    public function __construct() {
        parent::__construct();     
    }
 
    function switchLang($language = "") {
        
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('language', $language);

        $this->user->changeLanguage($language);


        if (!!$this->input->get('redirect')) {
        	$redirect = $this->input->get('redirect');
        } else if (!!($_SERVER['HTTP_REFERER'])) {
        	$redirect = $_SERVER['HTTP_REFERER'];
        } else {
        	$redirect = base_url();
        }
        
        redirect($redirect);

    }
}