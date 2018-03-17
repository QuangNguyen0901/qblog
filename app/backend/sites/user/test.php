<?php
session_start();
print_r($_SESSION);
echo '<br>';
echo $_SESSION;
echo '<br>';

include($url_common . '/libs/hash.php');

$pass = '123456';

$hash = new Hash();

$mahoa = $hash->create($pass,'384432');

echo $mahoa;
echo '<br>';
echo $hash->random();

