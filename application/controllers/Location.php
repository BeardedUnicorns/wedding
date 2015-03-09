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
        
        if ($this->session->userdata('is_admin'))
        {
          // User is logged in as admin.
          $this->admin();
          return;
        }
        
        
        $this->data['page_body'] = 'locations/location';
        $this->data['places_list'] = $locations;
        $this->render();
    }
    
    /**
     * Loads the admin version of this page.
     */
    public function admin()
    {
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        $locations = $this->locations->all();
        
        $this->data['page_body'] = 'locations/location_admin';
        $this->data['places_list'] = $locations;
        $this->render();
    }
    
    /**
     * Allows an admin to edit a location.
     * @param $location_id  The ID of the location to edit.
     */
    public function edit_location($location_id)
    {
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        
        $location = $this->locations->get($location_id);  
        
        $this->data['page_body']  = 'locations/edit_location';
        $this->data['id'] = $location_id;
        $this->data['location_id'] = $location->id;
        $this->data['event_title'] = $location->event_title;
        $this->data['description'] = $location->description;
        $this->data['start_time'] = $location->start_time;
        $this->data['notes'] = $location->notes;
        $this->data['address'] = $location->address;
        //$this->data['html'] = $location->html;
        $this->render();
    }
    
    /**
     * Allows an admin to submit an edit to a location.
     * @param $location_id  The ID of the location to edit.
     */
    public function submit_location($location_id)
    {        
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        
        $location = $this->locations->get($location_id);  
        
        $location->event_title = $this->input->post('event_title');
        $location->description = $this->input->post('description');
        $location->start_time = $this->input->post('start_time');
        $location->notes = $this->input->post('notes'); 
        $location->address = $this->input->post('address');
        //$location->html = $this->input->post('html');

        $this->locations->update($location);
        redirect('/location/admin');
    }
}

/* End of file Location.php */
/* Location: ./application/controllers/Location.php */