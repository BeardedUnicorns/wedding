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
        $this->get_members($group);
        
        $this->data['id'] = $group->id;
        $this->data['page_body']  = 'guest';
        $this->data['group_name'] = $group->name;
        $this->data['members']  = $group->members;
        $this->data['notes']   = $group->notes;
        $this->render();
    }
    
    // the admin version of the page
    public function admin()
    {
        if( !($this->session->userdata('username') === 'admin') )
        {
            redirect('/not_admin');
        }
        
        $groups = $this->guests->all();
        foreach($groups as $g)
        {
            $this->get_members_admin($g);
        }
        
        $this->data['page_body']  = 'groups_all';
        $this->data['groups'] = $groups;
        $this->render();
    }
    
    // the admin version of the page
    public function admin_show_group($group_id)
    {
        if( !($this->session->userdata('username') === 'admin') )
        {
            redirect('/not_admin');
        }
        
        $group = $this->guests->get($group_id);
        $this->get_members_admin($group);

        $this->data['page_body']  = 'guest_admin';
        $this->data['id'] = $group->id;
        $this->data['group_name'] = $group->name;
        $this->data['group_password'] = $group->password;
        $this->data['members']  = $group->members;
        $this->data['notes']   = $group->notes;
        $this->render();
    }
    
    public function update($group_id)
    {
        if( !($this->session->userdata('username') === 'admin') )
        {
            redirect('/not_admin');
        }
        
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
    
    private function get_members($group)
    {
        $group->members = $this->guests->get_users($group->id);
        
        foreach($group->members as $m)
        {
            $m->responses = array();
            for($i = 0; $i < 3; $i++)
            {
               $m->responses[$i]['name'] = $group->name . '_' . $m->first_name;
               $m->responses[$i]['value'] = '' . $i;
               $m->responses[$i]['checked'] = ($i == $m->status) ? "checked":"";
            }
    }
    }
    
    private function get_members_admin($group)
    {
        $group->members = $this->guests->get_users($group->id);
        
        foreach($group->members as $m)
        {
            $m->status = $this->responses->get($m->status)->description;
        }
    }
}

/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */