<?php
include($url_common . '/libs/hash.php');

$pass = '123456';

$hash = new Hash();

$mahoa = $hash->create($pass,'2222');

echo $mahoa;
echo '<br>';
echo $hash->random();