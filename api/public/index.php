<?php
if (!session_id()) session_start();

require_once '../app/config/config.php';
$app = new App();
