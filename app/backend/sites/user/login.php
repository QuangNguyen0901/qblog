<?php
//echo "user login aaaa";

if (!session_id()) session_start();




include($url_common . '/app/backend/views/user/login.php');