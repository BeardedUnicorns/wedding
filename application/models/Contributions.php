<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Contributions.php
 * 
 * Model for wedding gift contributions. Corresponds to the contribution table.
 */
class Contributions extends CI_Model
{
    private $table_name = 'contribution';
    
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @param int $group_id  The ID of a guest group.
     * @return array(int)  The IDs of all gifts the group contributed to.
     */
    public function get_gifts($group_id)
    {
        $gift_ids = array();
        $query    = $this->db->where('group_id', $group_id)
                             ->get($this->table_name);
        
        // Extract the gift IDs from the result.
        foreach ($query->result() as $record)
        {
            $gift_ids[] = $record->gift_id;
        }
        
        return $gift_ids;
    }
    
    /**
     * Adds a contribution entry to the table (unless it already exists).
     * @param int $group_id  The ID of the group that makes the contribution.
     * @param int $gift_id   The ID of the gift that is being contributed to.
     */
    public function add($group_id, $gift_id)
    {
        $query = $this->db->where('group_id', $group_id)
                          ->where('gift_id', $gift_id)
                          ->get($this->table_name);
        
        if ($query->num_rows() == 0)
        {
            $record = new StdClass;
            $record->group_id = $group_id;
            $record->gift_id  = $gift_id;
            $this->db->insert($this->table_name, $record);
        }
    }
    
    /**
     * Deletes a contribution entry from the table.
     * @param int $group_id  The ID of the group that made the contribution.
     * @param int $gift_id   The ID of the gift that has been contributed to.
     */
    public function delete($group_id, $gift_id)
    {
        $this->db->where('group_id', $group_id)
                 ->where('gift_id', $gift_id)
                 ->delete($this->table_name);
    }
}

/* End of file Contributions.php */
/* Location: ./application/models/Contributions.php */