<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guests extends CI_Model
{
    private $data = array(
        array('id' => '1', 'comments' => '', 'responses' => array(
            array('name' => 'Eddard Stark',  'status' => 0),
            array('name' => 'Catelyn Tully', 'status' => 1),
            array('name' => 'Robb Stark',    'status' => 0),
            array('name' => 'Sansa Stark',   'status' => 1),
            array('name' => 'Bran Stark',    'status' => 2),
            array('name' => 'Arya Stark',    'status' => 1),
            array('name' => 'Rickon Stark',  'status' => 1))
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