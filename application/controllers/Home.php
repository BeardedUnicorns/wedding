<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Home.php
 * 
 * Controller for the Home page.
 */
class Home extends MY_Controller
{
	/**
     * Default constructor.
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
		$this->data['page_body'] = 'home';
        $this->render();
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */