<?php
session_start();

// Terminate the session
session_unset();
session_destroy();

// Redirect to the index.php page
header("Location: index.php");
exit();
