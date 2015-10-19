<?php
$inputtext = file_get_contents('verbforms_gerard.txt');
$controllist = explode(',',$inputtext);
print_r($controllist);
?>
