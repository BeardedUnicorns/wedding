<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Contributions.php
 * 
 * Model for gift contributions.
 */
class Contributions extends CI_Model
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @param type $group_id
     * @return type
     */
    public function get_gifts($group_id)
    {
        $records = $this->db
                ->from('contributions')
                ->where('group_id', $group_id)
                ->get()->result();
        
        $list = array();
        
        foreach ($records as $record)
        {
            $list[] = $record->gift_id;
        }
        
        return $list;
    }
    
    public function add($group_id, $gift_id)
    {
        $count = $this->db
                ->from('contributions')
                ->where('group_id', $group_id)
                ->where('gift_id', $gift_id)
                ->count_all_results();
        
        if ($count === 0)
        {
            $record = new StdClass;
            $record->group_id = $group_id;
            $record->gift_id  = $gift_id;
            $this->db->insert('contributions', $record);
        }
    }
    
    public function delete($group_id, $gift_id)
    {
        $this->db->delete('contributions',
                array('group_id' => $group_id, 'gift_id' => $gift_id));
    }
}

/* End of file Contributions.php */
/* Location: ./application/models/Contributions.php */