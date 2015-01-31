<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends MY_Controller
{
	public function index()
	{
		$this->data['page_body'] = 'location';
        $this->render();
	}
}


/* End of file Location.php */
/* Location: ./application/controllers/Location.php */