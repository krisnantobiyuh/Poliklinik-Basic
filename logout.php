<?php

include "library/db.php";
session_start();
session_destroy();
$function->direct('login.php');
