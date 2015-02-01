<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Location.php
 * 
 * Controller for the Locations page.
 */
class Location extends MY_Controller
{
    /**
     * Default constructor..
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('locations');
    }
    
    /**
	 * Index page for this controller.
     * Gets all the location items from the Locations model.
     */
    public function index()
    {
        $this->data['page_body'] = 'location';
        $this->data['places_list'] = $this->locations->get_all();;
        $this->render();
    }
}

/* End of file Location.php */
/* Location: ./application/controllers/Location.php */