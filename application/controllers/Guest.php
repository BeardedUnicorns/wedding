<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends MY_Controller
{
	public function index()
	{
		$this->data['page_body'] = 'guest';
        $this->render();
	}
}


/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */