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
        echo 'first';
        if(!$this->session->has_userdata('username'))
        {
            redirect('/login');
            return;
        }
        else if($this->session->userdata('username') === 'admin')
        {
            $this->admin();
            return;
        }
        // will be implemented once we have real stuff
        //$group_name = $this->session->get_userdata('username');
        
        $group_name = 'Mom';
        $group = $this->guests->get_group_by_name($group_name);
        $members = $this->guests->get_users($group->id);
        
        // jeff to do stuff
        $this->data['page_body']  = 'guest';
        $this->data['group_name'] = $group->name;
        $this->data['members']  = $members;
        $this->data['notes']   = $group->notes;
        $this->render();
    }
    
    // the admin version of the page
    public function admin()
    {
        echo 'admin things';
    }
}

/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */