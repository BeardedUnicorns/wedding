<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Users.php
 * 
 * Model for user accounts.
 */
class Users extends MY_Model
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct('users', 'id');
    }
    
    public function getGroup($group_id)
    {                
        $this->db->from('users')->where('group_id', $group_id);
        return $this->db->get()->result();
    }
}

/* End of file Users.php */
/* Location: ./application/models/Users.php */