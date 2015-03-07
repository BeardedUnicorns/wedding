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
        
        foreach($members as $m)
        {
            $m->responses = array();
            for($i = 0; $i < 3; $i++)
            {
               $m->responses[$i]['name'] = $group_name . '_' . $m->first_name;
               $m->responses[$i]['value'] = '' . $i;
               $m->responses[$i]['checked'] = ($i == $m->status) ? "checked":"";
            }
        }
        
        $this->data['id'] = $group->id;
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
    
    public function update($group_id)
    {
        $this->set_group($this->guests->get($group_id));
        $this->guests->update($this->group);
        foreach($this->members as $m)
        {
            $this->users->update($m);
        }
        redirect('/guest');
        //redirect('/update_success');
    }
    
    private function set_group($group)
    {
        $group->notes = $this->input->post('notes');
        $members = $this->guests->get_users($group->id);
        
        foreach($members as $m)
        {
            unset($m->responses);
            $m->status = $this->input->post($group->name . '_' . $m->first_name);
        } 
        
        $this->group = $group;
        $this->members = $members;
    }
}

/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */