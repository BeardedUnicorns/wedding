<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gifts extends CI_Model
{
    private $data = array(
            array('giftId' => 1, 'title' => 'TV',           'value' => 600),
            array('giftId' => 2, 'title' => 'HoneyMoon',    'value' => 3000),
            array('giftId' => 3, 'title' => 'Toaster',      'value' => 36),
            array('giftId' => 4, 'title' => 'Fruit Basket', 'value' => 21),
            array('giftId' => 5, 'title' => 'Goldfish',     'value' => 5)
    );
    
     public function __construct()
    {
        parent::__construct();
    }
    
    public function get($id)
    {
        foreach ($this->data as $record)
        {
            if ($record['giftId'] == $id)
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



