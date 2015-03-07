<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Locations.php
 * 
 * Model for location records.
 */
class Locations extends MY_Model
{   
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct('location');
    }  
}

/* End of file Locations.php */
/* Location: ./application/models/Locations.php */