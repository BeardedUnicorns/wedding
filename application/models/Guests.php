<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Guests.php
 * 
 * Model for guest groups.
 */
class Guests extends CI_Model
{
    private $data = array(
        array('id' => '1', 'name' => 'The Starks', 'comments' => 'No comment',
            'responses' => array(
                array('name' => 'Eddard Stark',  'status' => 'Cannot attend', 'radio' => '<input type="radio" name="r1"><input type="radio" name="r1"><input type="radio" name="r1">'),
                array('name' => 'Catelyn Tully', 'status' => 'Will attend',   'radio' => '<input type="radio" name="r2"><input type="radio" name="r2"><input type="radio" name="r2">'),
                array('name' => 'Robb Stark',    'status' => 'Cannot attend', 'radio' => '<input type="radio" name="r3"><input type="radio" name="r3"><input type="radio" name="r3">'),
                array('name' => 'Sansa Stark',   'status' => 'Will attend',   'radio' => '<input type="radio" name="r4"><input type="radio" name="r4"><input type="radio" name="r4">'),
                array('name' => 'Bran Stark',    'status' => 'Not sure yet',  'radio' => '<input type="radio" name="r5"><input type="radio" name="r5"><input type="radio" name="r5">'),
                array('name' => 'Arya Stark',    'status' => 'Cannot attend', 'radio' => '<input type="radio" name="r6"><input type="radio" name="r6"><input type="radio" name="r6">'),
                array('name' => 'Rickon Stark',  'status' => 'Will attend',   'radio' => ''))
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
     * Returns the guest group with the given ID.
     * 
     * @param type $id a group ID
     * @return type the group with this ID 
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
     * Returns all guest groups.
     * 
     * @return type all groups
     */
    public function get_all()
    {
        return $this->data;
    }
}

/* End of file Guests.php */
/* Location: ./application/models/Guests.php */