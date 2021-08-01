<?php

display_message();              // Calling function display_message()
function display_message()      // Definition of called function
{
    echo '<h3>Hello world!</h3>';
}                               // End of function
// closing php tag is optional if the file contains only php tag in file index.php
/**
 * Function with parameters.
 */
function display_with_param($var = null)
{
    // code...
    echo 'Parameter '.$var.' is passed.';
}
display_with_param('param-value');
