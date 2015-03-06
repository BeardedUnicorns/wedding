<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Guests.php
 * 
 * Model for guest groups.  Corresponds to the groups table.
 */
class Guests extends MY_Model
{    
        // Constructor
    public function __construct() {
       parent::__construct('groups', 'id');	
    }

    public function get_users($key)
    {
        $ci = &get_instance();
        return $ci->users->getGroup($key);
    }
    
    public function get_group_by_name($group_name)
    {
        $this->db->from('groups')->where('name', $group_name);
        return $this->db->get()->result();
    }
    
    public function add_user($group_id, $user)
    {
        $ci = &get_instance();
        $user['group_id'] = $group_id;
        $ci->users->add($user);        
    }
}

/* End of file Guests.php */
/* Location: ./application/models/Guests.php */