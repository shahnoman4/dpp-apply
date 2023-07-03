<?php

class Meta_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

       
    }
    
    function add($postdata) {
	    
	    $user_id = $this->session->user_id;
	    //echo "<pre>";print_r($postdata);"</pre>";exit();
	    foreach ($postdata as $key=>$value) {
	      if($key!='step'){
	    	if (is_array($value)) {
	    		$value = serialize($value);
	    	}
		    
		    $query = $this->db->get_where('meta', ['user_id'=>$user_id, 'field'=>$key]);
		    if ($query->num_rows() > 0) {
			    $row=$query->row();
			    $this->db->update('meta', ['field'=>$key, 'value'=>$value,'step'=>$postdata['step']], ['meta_id'=>$row->meta_id]);
		    } else {
			    $this->db->insert('meta', ['field'=>$key, 'value'=>$value, 'user_id'=>$user_id,'step'=>$postdata['step']]);
		    }
		   } 
		    		    
	    }
	    
    }

    function upload_files($postdata) {
	    
	    $user_id = $this->session->user_id;
	    print_r($postdata);exit();
	    foreach ($postdata as $key=>$value) {
	    	if (is_array($value)) {
	    		$value = serialize($value);
	    	}
		    
		    $query = $this->db->get_where('meta', ['user_id'=>$user_id, 'field'=>$key]);
		    if ($query->num_rows() > 0) {
			    $row=$query->row();
			    $this->db->update('meta', ['field'=>$key, 'value'=>$value], ['meta_id'=>$row->meta_id]);
		    } else {
			    $this->db->insert('meta', ['field'=>$key, 'value'=>$value, 'user_id'=>$user_id]);
		    }
		    		    
	    }
	    
    }

    function find( $field, $default = null ) {
    	$user_id = $this->session->user_id;
    	//print_r($user_id);exit();
    	if (!$user_id) {
    		return $default;
    	}

		$first = $this->db->query("SELECT * FROM meta WHERE user_id = $user_id AND field = '$field' LIMIT 1;")->row();
		if (!!$first) {
			$data = @unserialize($first->value);
			if ($data !== false) {
				return $data;
			}
			return $first->value;
		}
		return $default;
	}

} // end class