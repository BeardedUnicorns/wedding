<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Gifts.php
 * 
 * Model for gift items.
 */
class Gifts extends CI_Model
{
    private $data = array(
        array('id' => 1, 'title' => 'TV',           'value' => 600, 'description' => 'great!', 'checkbox' => '<input type="checkbox" name="c1">'),
        array('id' => 2, 'title' => 'HoneyMoon',    'value' => 3000, 'description' => 'Greece!', 'checkbox' => '<input type="checkbox" name="c2">'),
        array('id' => 3, 'title' => 'Toaster',      'value' => 36, 'description' => 'meh', 'checkbox' => '<input type="checkbox" name="c3">'),
        array('id' => 4, 'title' => 'Fruit Basket', 'value' => 21, 'description' => 'yum', 'checkbox' => '<input type="checkbox" name="c4">'),
        array('id' => 5, 'title' => 'Goldfish',     'value' => 5, 'description' => 'flush', 'checkbox' => '<input type="checkbox" name="c5">')
    );
    
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Returns the gift item with the given ID.
     * 
     * @param type $id an item ID
     * @return type the item with this ID 
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
     * Returns all gift items.
     * 
     * @return type all items
     */
    public function get_all()
    {
        return $this->data;
    }
}

/* End of file Gifts.php */
/* Location: ./application/models/Gifts.php */