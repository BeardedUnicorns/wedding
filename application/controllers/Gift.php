<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Gift.php
 * 
 * Controller for the Gifts page.
 */
class Gift extends MY_Controller
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contributions');
        $this->load->model('gifts');
        $this->load->library('upload', array(
            'upload_path'   => './assets/images/gifts',
            'allowed_types' => 'gif|jpg|png'));
    }
    
    /**
	 * Index page for this controller.
     * Loads gifts and decides which view to load depending on session data.
     */
    public function index()
	{
        $gifts = $this->gifts->all();
        $ids   = array();
        
        if (!$this->session->has_userdata('username'))
        {
            // User is not logged in.
            $this->data['page_body'] = 'gifts/default';
        }
        else
        {
            if ($this->session->userdata('is_admin'))
            {
                // User is logged in as admin.
                $this->data['page_body'] = 'gifts/admin_all';
            }
            else
            {
                // User is logged in as guest.
                $this->data['page_body'] = 'gifts/guest';
                $ids = $this->get_contributed_gifts();
            }
        }
        
        // Inject properties that are needed by the views.
        foreach ($gifts as $gift)
        {
            $gift->status   = $gift->fulfilled ? 'Fulfilled' : 'Open';
            $gift->disabled = $gift->fulfilled ? ' disabled' : '';
            $gift->checked  = in_array($gift->id, $ids) ? ' checked' : '';
        }
        
        $this->data['gift_items'] = $gifts;
        $this->render();
    }
    
    /**
     * Updates the user's gift contributions.
     */
    public function contribute()
    {
        if (!$this->session->has_userdata('username'))
        {
            // No access if not logged in.
            redirect('/login');
        }
        
        $group = $this->groups->get_by_username(
                $this->session->userdata('username'));
        
        $gifts = $this->gifts->all();
        
        foreach ($gifts as $gift)
        {
            if ($this->input->post('check_' . $gift->id))
            {
                $this->contributions->add($group->id, $gift->id);
            }
            else
            {
                $this->contributions->delete($group->id, $gift->id);
            }
        }
        
        redirect('/gift');
    }
    
    /**
     * Lets the admin add a new gift entry.
     */
    public function add()
    {
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        
        if ($this->input->post('submit'))
        {
            // User has submitted the form.
            $gift = $this->gifts->create();
            $this->populate_from_input($gift);
            $this->gifts->add($gift);
            redirect('/gift');
        }
        
        $this->data['title']       = '';
        $this->data['cost']        = '';
        $this->data['picture']     = 'placeholder.png';
        $this->data['description'] = '';
        $this->data['page_body']   = 'gifts/admin_one';
        $this->render();
    }
    
    /**
     * Lets the admin edit an existing gift entry.
     */
    public function edit($gift_id)
    {
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        
        $gift = $this->gifts->get($gift_id);
        
        if ($this->input->post('submit'))
        {
            // User has submitted the form.
            $this->populate_from_input($gift);
            $this->gifts->update($gift);
            redirect('/gift');
        }
        
        $this->data['title']       = $gift->title;
        $this->data['cost']        = $gift->cost;
        $this->data['picture']     = $gift->picture ? $gift->picture
                                                    : 'placeholder.png';
        $this->data['description'] = $gift->description;
        $this->data['page_body']   = 'gifts/admin_one';
        $this->render();
    }
    
    /**
     * Deletes a specified gift entry.
     */
    public function delete($gift_id)
    {
        if (!$this->session->userdata('is_admin'))
        {
            // No access if not admin.
            redirect('/not_admin');
        }
        
        $this->gifts->delete($gift_id);
        redirect('/gift');
    }
    
    /**
     * Returns an array contributed gift IDs.
     */
    private function get_contributed_gifts()
    {
        $group = $this->groups->get_by_username(
                $this->session->userdata('username'));
        
        return $this->contributions->get_gifts($group->id);
    }
    
    /**
     * Updates the given gift with the form input.
     */
    private function populate_from_input($gift)
    {
        $gift->title       = $this->input->post('title');
        $gift->description = $this->input->post('description');
        $gift->cost        = $this->input->post('cost');
        
        if ($this->upload->do_upload('picture'))
        {
            $gift->picture = $this->upload->data('file_name');
        }
    }
}

/* End of file Gift.php */
/* Location: ./application/controllers/Gift.php */