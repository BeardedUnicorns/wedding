<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Gifts.php
 * 
 * Model for gift items.
 */
class Gifts extends MY_Model
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct('gifts', 'id');
    }
}

/* End of file Gifts.php */
/* Location: ./application/models/Gifts.php */