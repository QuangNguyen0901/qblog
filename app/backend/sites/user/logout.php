<?php
session_start();
unset($_SESSION);
header("Location:http://qblog.com/admin/?m=user&a=login");