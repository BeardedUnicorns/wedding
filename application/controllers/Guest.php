<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Guest.php
 * 
 * Controller for the Guests page.
 */
class Guest extends MY_Controller
{
	/**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guests');
    }
    
    /**
	 * Index page for this controller.
     * Gets one group from the Guets model.
     */
    public function index()
    {
        if(!$this->session->has_userdata())
        {
            redirect('/');
        }
        // will be implemented once we have real stuff
        //$group_name = $this->session->get_userdata('username');
        
        $group_name = 'mom';
        $group = $this->guests->group_by_name($group_name);
        
        // jeff to do stuff
        $this->data['page_body']  = 'guest';
        $this->data['group_name'] = $group['name'];
        $this->data['responses']  = $group['responses'];
        $this->data['comments']   = $group['comments'];
        $this->render();
    }
}

/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */