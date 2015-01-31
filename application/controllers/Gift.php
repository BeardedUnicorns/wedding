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
        
            $gifts = $this->gifts->get_all();
            $table = '<table>';
            foreach($gifts as $g)
            {
                $table .= '<tr>';
                
                $table .= '<td>';
                $table .= $g['title'];
                $table .= '</td>';
                
                $table .= '<td>';
                $table .= $g['value'];
                $table .= '</td>';
                
                $table .= '<td>';
                $table .= $g['description'];
                $table .= '</td>';
                
                $table .= '</tr>';
            }
            
            $table .= '</table>';
            
            $this->data['thetable'] = $table;
            $this->data['page_body'] = 'gift';
            $this->render();
	}
}


/* End of file Gift.php */
/* Location: ./application/controllers/Gift.php */