<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Groups.php
 * 
 * Model for guest groups. Corresponds to the group table.
 */
class Groups extends MY_Model
{    
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct('group');	
    }
    
    /**
     * @param string $username  The username of a group.
     * @return The group with this username.
     */
    public function get_by_username($username)
    {
        $query = $this->db->where('username', $username)
                          ->get($this->table_name);
        
        if ($query->num_rows() == 0)
        {
            return null;
        }
        
        return $query->row();
    }

    /**
     * @param int $id  The ID of a guest group.
     * @return An array of all guests of this group.
     */
    public function get_guests($id)
    {
        $CI = &get_instance();
        $CI->load->model('guests');
        return $CI->guests->get_by_group($id);
    }
    
    /**
     * Adds a guest to a guest group.
     * @param int $group_id  The ID of a guest group.
     * @param $guest  The guest to be added to this group.
     */
    public function add_guest($group_id, $guest)
    {
        $guest->group_id = $group_id;
        
        $CI = &get_instance();
        $CI->load->model('guests');
        $CI->guests->add($guest);        
    }
}

/* End of file Groups.php */
/* Location: ./application/models/Groups.php */