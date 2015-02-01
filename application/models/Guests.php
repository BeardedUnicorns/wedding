<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guests extends CI_Model
{
    private $data = array(
        array('id' => '1', 'name' => 'The Starks', 'comments' => 'No comment',
            'responses' => array(
                array('radio' => '<input type="radio" name="r1"><input type="radio" name="r1" checked><input type="radio" name="r1">', 'name' => 'Eddard Stark', 'status' => 'Cannot attend'),
                array('radio' => '<input type="radio" name="r2" checked><input type="radio" name="r2"><input type="radio" name="r2">', 'name' => 'Catelyn Tully', 'status' => 'Will attend'),
                array('radio' => '<input type="radio" name="r3"><input type="radio" name="r3" checked><input type="radio" name="r3">', 'name' => 'Robb Stark', 'status' => 'Cannot attend'),
                array('radio' => '<input type="radio" name="r4" checked><input type="radio" name="r4"><input type="radio" name="r4">', 'name' => 'Sansa Stark',   'status' => 'Will attend'),
                array('radio' => '<input type="radio" name="r5"><input type="radio" name="r5"><input type="radio" name="r5" checked>', 'name' => 'Bran Stark',    'status' => 'Not sure yet'),
                array('radio' => '<input type="radio" name="r6"><input type="radio" name="r6" checked><input type="radio" name="r6">', 'name' => 'Arya Stark',    'status' => 'Cannot attend'),
                array('radio' => '<input type="radio" name="r7" checked><input type="radio" name="r7"><input type="radio" name="r7">', 'name' => 'Rickon Stark',  'status' => 'Will attend'))
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