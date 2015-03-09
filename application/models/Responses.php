<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * models/Responses.php
 * 
 * Model for guest responses. Corresponds to the response table.
 */
class Responses extends MY_Model
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct('response');
    }
}

/* End of file Responses.php */
/* Location: ./application/models/Responses.php */