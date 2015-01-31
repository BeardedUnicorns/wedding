<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	public function index()
	{
		$this->data['page_body'] = 'login';
        $this->render();
	}
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */