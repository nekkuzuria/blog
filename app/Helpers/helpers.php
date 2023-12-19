<?php 
function profanityFilter($text) {
    $profanities = array('bodoh', 'tolol', 'memalukan'); 

    foreach ($profanities as $profanity) {
        if (stripos($text, $profanity) !== false) {
            return true; // Jika terdapat kata tidak sopan
        }
    }

    return false; // Jika tidak ada kata tidak sopan
}

?>