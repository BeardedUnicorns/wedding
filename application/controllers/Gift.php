<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Gift.php
 * 
 * Controller for the Gifts page.
 */
class Gift extends MY_Controller
{
	private $gift;
    
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gifts');
    }
    
    /**
	 * Index page for this controller.
     * Gets all the gift items from the Gifts model.
     */
    public function index()
	{
        if ($this->session->userdata('username') == 'admin')
        {
            $this->data['page_body'] = 'gift_admin';
        }
        else
        {
            $this->data['page_body'] = 'gift';
        }
        
        $this->data['gift_items'] = $this->gifts->all();
        $this->render();
	}
    
    public function add()
    {
        if ($this->input->post('title') != NULL)
        {
            $this->set_gift($this->gifts->create());
            $this->gifts->add($this->gift);
            redirect('/gift');
        }
        
        $this->data['page_body'] = 'gift_add';
        $this->render();
    }
    
    public function edit($gift_id)
    {
        $this->data = array_merge($this->data,
                (array) $this->gifts->get($gift_id));
        $this->data['page_body'] = 'gift_edit';
        $this->render();
    }
    
    public function update($gift_id)
    {
        $this->set_gift($this->gifts->get($gift_id));
        $this->gifts->update($this->gift);
        redirect('/gift');
    }
    
    public function delete($gift_id)
    {
        $this->gifts->delete($gift_id);
        redirect('/gift');
    }
    
    private function set_gift($gift)
    {
        $gift->title = $this->input->post('title');
        $gift->description = $this->input->post('description');
        $gift->cost = $this->input->post('cost');
        $gift->contributed = $this->input->post('contributed');
        
        $this->gift = $gift;
    }
}

/* End of file Gift.php */
/* Location: ./application/controllers/Gift.php */