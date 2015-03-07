<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Status.php
 * 
 * Model for user accounts.
 */
class Responses extends MY_Model
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct('status', 'id');
    }
    
}

/* End of file Users.php */
/* Location: ./application/models/Users.php */