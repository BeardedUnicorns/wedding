<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('guests');
    }
    
    
    public function index()
	{
		$group = $this->guests->get(1);
        
        $this->data['page_body']  = 'guest';
        $this->data['group_name'] = $group['name'];
        $this->data['responses']  = $group['responses'];
        $this->data['comments']    = $group['comments'];
        $this->render();
	}
}


/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */