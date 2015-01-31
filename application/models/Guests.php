<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guests extends CI_Model
{
    private $data = array(
        array('id' => '1', 'name' => 'The Starks', 'comments' => 'No comment',
            'responses' => array(
                array('name' => 'Eddard Stark',  'status' => 'Cannot attend'),
                array('name' => 'Catelyn Tully', 'status' => 'Will attend'),
                array('name' => 'Robb Stark',    'status' => 'Cannot attend'),
                array('name' => 'Sansa Stark',   'status' => 'Will attend'),
                array('name' => 'Bran Stark',    'status' => 'Not sure yet'),
                array('name' => 'Arya Stark',    'status' => 'Cannot attend'),
                array('name' => 'Rickon Stark',  'status' => 'Will attend'))
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