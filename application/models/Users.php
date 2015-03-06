<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Users.php
 * 
 * Model for user accounts.
 */
class Users extends CI_Model
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
        return $this->db->where('users', array('group_id' => $group_id)).results();  
    }
}

/* End of file Users.php */
/* Location: ./application/models/Users.php */