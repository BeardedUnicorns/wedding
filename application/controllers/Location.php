<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends MY_Controller 
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('locations');
    }
    
    public function index() 
    {
        $places = $this->locations->get_all();
        
        $this->data['page_body'] = 'location';
        $this->data['places_list'] = $places;
        $this->render();
    }

}

/* End of file Location.php */
/* Location: ./application/controllers/Location.php */