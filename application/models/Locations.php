<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Locations.php
 * 
 * Model for location records.
 */
class Locations extends MY_Model
{
    private $data = array(
        array('id' => '1', 'name' => 'Wedding Service', 'address' => 'King\'s Landing',
            'events' => array(
                array('name' => 'Arrival Time',                 'time' => '12:00pm'),
                array('name' => 'Guest Preparation',            'time' => '12:30pm'),
                array('name' => 'Vow Ceremony',                 'time' => '1:30pm')),
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5206.510754019963!2d-123.13055997951508!3d49.271558004209545!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548673d04dfc1167%3A0xc8918321d1a3de4a!2sKings+Landing!5e0!3m2!1sen!2sca!4v1425501133918" width="600" height="450" frameborder="0" style="border:0"></iframe>'
        ),
        array('id' => '2', 'name' => 'Reception', 'address' => 'King\'s Landing',
            'events' => array(
                array('name' => 'Arrival Time',                 'time' => '4:00pm'),
                array('name' => 'Toast to Bride and Groom',     'time' => '4:30pm'),
                array('name' => 'Dinner',                       'time' => '5:30pm')),
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5206.510754019963!2d-123.13055997951508!3d49.271558004209545!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548673d04dfc1167%3A0xc8918321d1a3de4a!2sKings+Landing!5e0!3m2!1sen!2sca!4v1425501133918" width="600" height="450" frameborder="0" style="border:0"></iframe>'
        )
    );
    
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Returns the location record with the given ID.
     * 
     * @param type $id an record ID
     * @return type the record with this ID 
     */
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
    
    /**
     * Returns all location records.
     * 
     * @return type all records
     */
    public function get_all()
    {
        return $this->data;
    }
}

/* End of file Locations.php */
/* Location: ./application/models/Locations.php */