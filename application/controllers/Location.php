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
     * Default constructor.
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
        $locations = $this->locations->all();
        
        // if ($this->session->userdata('is_admin'))
        // {
        //  // User is logged in as admin.
        //  $this->admin();
        //  return;
        // }
        
        
        $this->data['page_body'] = 'location';
        $this->data['places_list'] = $locations;
        $this->render();
    }
    
}

/* End of file Location.php */
/* Location: ./application/controllers/Location.php */