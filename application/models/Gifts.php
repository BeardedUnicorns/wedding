<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Gifts.php
 * 
 * Model for wedding gifts. Corresponds to the gift table.
 */
class Gifts extends MY_Model
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct('gift');
    }
}

/* End of file Gifts.php */
/* Location: ./application/models/Gifts.php */