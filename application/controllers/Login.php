<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Login.php
 * 
 * Controller for the Login page.
 */
class Login extends MY_Controller
{
	/**
     * Default constructor..
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
	 * Index page for this controller.
     */
    public function index()
	{
		$this->data['page_body'] = 'login';
        $this->render();
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */