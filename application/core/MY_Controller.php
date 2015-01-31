<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * core/MY_Controller.php
 * 
 * Default application controller.
 */

class MY_Controller extends CI_Controller
{
    protected $data    = array();
    protected $choices = array(
        'Home'     => '/',
        'Guest'    => '/guest',
        'Gifts'     => '/gift',
        'Location' => '/location',
        'Login'    => '/login'
    );
    
    
    function __construct()
    {
        parent::__construct();
        $this->data['title'] = 'Page Title';
        $this->load->helper('menu');
    }
    
    
    /**
     * Render this page
     */
    function render()
    {
        $this->data['menu'] = build_menu_bar(
                $this->choices, ucfirst($this->data['page_body']));
        
        $this->data['content'] = $this->parser->parse(
                $this->data['page_body'], $this->data, true);
        
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */