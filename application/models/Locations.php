<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Locations extends CI_Model
{
    private $data = array(
        array('id' => '1', 'name' => 'Wedding Service', 'address' => 'King\'s Landing',
            'events' => array(
                array('name' => 'Arrival Time',                 'time' => '12:00pm'),
                array('name' => 'Guest Preparation',            'time' => '12:30pm'),
                array('name' => 'Vow Ceremony',                 'time' => '1:30pm'))
        ),
        array('id' => '2', 'name' => 'Reception', 'address' => 'King\'s Landing',
            'events' => array(
                array('name' => 'Arrival Time',                 'time' => '4:00pm'),
                array('name' => 'Toast to Bride and Groom',     'time' => '4:30pm'),
                array('name' => 'Dinner',                       'time' => '5:30pm'))
        )
    );
    
    
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function get($id)
    {
        foreach ($this->data as $record)
        {
            if ($record['id'] == $id)
            {
                return $record;
            }
        }
        
        return null;
    }
    
    
    public function get_all()
    {
        return $this->data;
    }
}