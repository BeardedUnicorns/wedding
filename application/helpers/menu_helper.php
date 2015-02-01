<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * helpers/menu_helper.php
 * 
 * Allows creation of a menu bar from an array.
 */

/**
 * Builds an unordered list of linked items for a menu bar.
 * 
 * @param type $choices array of name=>link pairs
 * @param type $current link of the active page
 */
function build_menu($choices, $current)
{
    $result = '<ul id="menu">';
    
    foreach ($choices as $name => $link)
    {
        if ('/' . $current == $link)
        {
            $result .= '<li class="active">';
        }
        else
        {
            $result .= '<li>';
        }
        
        $result .= anchor($link, $name) . '</li>';
    }
    $result .= '</ul>';
    return $result;
}

/* End of file menu_helper.php */
/* Location: application/helpers/menu_helper.php */