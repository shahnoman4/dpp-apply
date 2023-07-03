<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');
        $siteLang = $ci->session->userdata('language');
        if (!!$siteLang && $siteLang != 'undefined') {
            $ci->lang->load('steps', $siteLang);
        } else {
            $ci->lang->load('steps','english');
        }
    }
}