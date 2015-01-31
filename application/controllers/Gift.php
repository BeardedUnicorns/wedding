<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gift extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('gifts');
    }
    
    
    public function index()
	{
		$this->data['page_body'] = 'gift';
        $this->render();
	}
}


/* End of file Gift.php */
/* Location: ./application/controllers/Gift.php */