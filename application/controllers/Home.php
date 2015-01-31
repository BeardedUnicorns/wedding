<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function index()
	{
		$this->data['page_body'] = 'home';
        $this->render();
	}
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */