<?php

// Must return positive integer
function sub($a, $b)
{
    if (($a - $b) < 0) {
        throw new Exception("Number is negative. Can't except negative number!!");
    } else {
        return $a - $b;
    }
    // Ternary operator in PHP8
}

try {
    echo sub(14, 10);
} catch (Exception $e) {        // Remove $e to log error not visible to user
    echo $e->getMessage();      // error_log();
}
