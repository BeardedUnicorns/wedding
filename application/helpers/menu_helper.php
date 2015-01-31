<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * helpers/menu_helper.php
 */

/**
 * Build an unordered list of linked items, such as used for a menu bar.
 * Assumption: that the URL helper has been loaded.
 * @param type $choices Array of name=>link pairs
 * @param type $current name of the current page
 */
function build_menu_bar($choices, $current)
{
    $result = '<ul id="navigation">';
    foreach ($choices as $name => $link)
    {
        if (array_key_exists($current, $choices) AND
                $choices[$current] === $link)
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