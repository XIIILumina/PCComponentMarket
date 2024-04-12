<?php
session_start();

$title = "index";

// End the session
session_destroy();

require_once "../app/Views/index.view.php";


