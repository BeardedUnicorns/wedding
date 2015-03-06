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
        $this->load->model('gifts');
    }
    
    /**
	 * Index page for this controller.
     * Gets all the gift items from the Gifts model.
     */
    public function index()
	{
        $this->data['page_body'] = 'gift';
        $this->data['gift_items'] = $this->gifts->all();
        $this->render();
	}
    
    public function add()
    {
        
    }
    
    public function update($gift_id)
    {
        
    }
    
    public function delete($gift_id)
    {
        $this->gifts->delete($gift_id);
        redirect('/gift');
    }
}

/* End of file Gift.php */
/* Location: ./application/controllers/Gift.php */