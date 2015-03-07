<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Guests.php
 * 
 * Model for wedding guests. Corresponds to the guest table.
 */
class Guests extends MY_Model
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct('guest');
    }
    
    /**
     * @param int $group_id  The ID of a guest group.
     * @return An array of all guests of this group.
     */
    public function get_by_group($group_id)
    {                
        return $this->db->where('group_id', $group_id)
                        ->get($this->table_name)->result();
    }
}

/* End of file Guests.php */
/* Location: ./application/models/Guests.php */