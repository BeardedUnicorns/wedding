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
        $this->load->model('responses');
    }
    
    /**
	 * Index page for this controller.
     * Loads groups and decides which view to load depending on session data.
     */
    public function index()
    {
        if (!$this->session->has_userdata('username'))
        {
            // User is not logged in.
            $this->data['page_body'] = 'guests/default';
            $this->render();
            return;
        }
        
        if ($this->session->userdata('is_admin'))
        {
            // User is logged in as admin.
            $this->admin();
            return;
        }
        
        //User is logged in as a guest. right now we dont distinguish
       //  between guests, so I'm hard coding a group
        $group = $this->groups->get_by_username(
                 $this->session->userdata('username'));
          

      //  $group = $this->groups->get_by_username(
        //         $this->session->userdata('mom'));
        
        $this->get_guests($group);
        
        $this->data['group_name'] = $group->name;
        $this->data['responses']  = $this->responses->all();
        $this->data['guests']     = $group->guests;
        $this->data['notes']      = $group->notes;
        $this->data['page_body']  = 'guests/guest';
        $this->render();
    }
    
    /**
     * Allows a user to update their group response.
     */
    public function respond()
    {
        if (!$this->session->has_userdata('username'))
        {
            // User is not logged in.
            $this->data['page_body'] = 'guests/default';
            $this->render();
            return;
        }
        
        // User is logged in as a guest.
        $group = $this->groups->get_by_username(
                 $this->session->userdata('username'));
        
        $this->update_guests($group);
        $group->notes = $this->input->post('notes');
        $this->groups->update($group);
        redirect('/guest');
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
        
        $groups = $this->groups->all();
        
        foreach($groups as $group)
        {
            $this->get_guests_admin($group);
        }
        
        $this->data['page_body']  = 'guests/all_groups';
        $this->data['groups'] = $groups;
        $this->render();
    }
    
    /**
     * Allows an admin to edit the specified group.
     * @param $group_id  The ID of the group to edit.
     */
    public function edit($group_id)
    {
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        
        if ($this->input->post('submit'))
        {
            // User has submitted the form.
            $group = $this->groups->get($group_id);
            $group->name     = $this->input->post('name');
            $group->username = $this->input->post('username');
            $group->password = $this->input->post('password');
            $group->notes    = $this->input->post('notes');
            $this->groups->update($group);
            
            foreach ($this->groups->get_guests($group_id) as $guest)
            {
                $id = $guest->id;
                $guest->first_name = $this->input->post("first_name_$id");
                $guest->last_name  = $this->input->post("last_name_$id");
                $guest->email      = $this->input->post("email_$id");
                $guest->phone      = $this->input->post("phone_$id");
                $this->guests->update($guest);
            }
            
            redirect('/guest');
        }
        
        $group = $this->groups->get($group_id);
        $this->get_guests_admin($group);
        
        //$this->data['id'] = $group->id;
        $this->data['group_name'] = $group->name;
        $this->data['username']   = $group->username;
        $this->data['password']   = $group->password;
        $this->data['guests']     = $group->guests;
        $this->data['notes']      = $group->notes;
        $this->data['page_body']  = 'guests/admin_one';
        $this->render();
    }
    /**
     * Allows an admin to edit a user within a group.
     * @param $guest_id  The ID of the guest to edit.
     */
    public function edit_guest($guest_id)
    {
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        
        $guest = $this->guests->get($guest_id);        
        $this->data['page_body']  = 'guests/guest_edit';
        $this->data['id'] = $guest_id;
        $this->data['group_id'] = $guest->group_id;
        $this->data['first_name'] = $guest->first_name;
        $this->data['last_name'] = $guest->last_name;
        $this->data['phone'] = $guest->phone;
        $this->data['email'] = $guest->email; 
        $this->render();
    }
    /**
     * Allows an admin to submit an edit to a user within a group.
     * @param $guest_id  The ID of the guest to edit.
     */
    public function submit_guest($guest_id)
    {        
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        
        $guest = $this->guests->get($guest_id);        
        $guest->first_name = $this->input->post('first_name');
        $guest->last_name = $this->input->post('last_name');
        $guest->phone = $this->input->post('phone');
        $guest->email = $this->input->post('email');

        $this->guests->update($guest);
        redirect('/guest/admin_show_group/' . $guest->group_id);
    }
    
    /**
     * Allows an admin to submit an edit to a user within a group.
     * @param $guest_id  The ID of the guest to edit.
     */
    public function delete_guest($group_id, $guest_id)
    {
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        
        $this->guests->delete($guest_id);
        redirect('/guest/admin_show_group/' . $group_id);
    }
    
    /**
     * Shows the members of a specific group for the admin
     * @param $group_id  The id of the group to be shown.
     */
    public function admin_show_group($group_id)
    {
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        
        $group = $this->groups->get($group_id);
        $this->get_guests_admin($group);

        $this->data['page_body']  = 'guests/group_admin';
        $this->data['id'] = $group->id;
        $this->data['group_name'] = $group->name;
        $this->data['group_password'] = $group->password;
        $this->data['guests']  = $group->guests;
        $this->data['notes']   = $group->notes;
        $this->render();
    }
    
    /**
     * Injects the guests of the specified group with attributes needed to
     * display their reponses.
     * @param $group  The group to be updated.
     */
    private function get_guests($group)
    {
        $group->guests = $this->groups->get_guests($group->id);
        
        foreach($group->guests as $guest)
        {
            $guest->responses = array();
            for($i = 0; $i < $this->responses->size(); $i++)
            {
               $guest->responses[$i]['name']    = 'guest_' . $guest->id;
               $guest->responses[$i]['value']   = $i;
               $guest->responses[$i]['checked'] = ($i == $guest->response_id)
                                                ? ' checked' : '';
            }
        }
    }
    
    /**
     * Injects the guests of the specified group with attributes needed to
     * display their reponses.
     * @param $group  The group to be updated.
     */
    private function get_guests_admin($group)
    {
        $group->guests = $this->guests->get_by_group($group->id);
        
        foreach($group->guests as $guest)
        {
            $guest->response = $this->responses
                             ->get($guest->response_id)->description;
        }
    }
    
    /**
     * Updates the guest responses for the specified group. 
     * @param $group  The group to be updated.
     */
    private function update_guests($group)
    {
        foreach ($this->groups->get_guests($group->id) as $guest)
        {
            unset($guest->responses);
            $guest->response_id = $this->input->post('guest_' . $guest->id);
            $this->guests->update($guest);
        }
    }
    
    
}

/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */