<?php
if (!session_id()) session_start();

require_once '../app/config/init.php';
$app = new App();
