<?php
require_once ('/Users/kagatoshio/projects/jancation/src/Services/DataHandler.php');
require_once ('/Users/kagatoshio/projects/jancation/src/Services/Methods.php');
$dataConnect = new \Services\DataHandler();
$methods = new \Services\Methods();
$requests = $dataConnect->getAll('requests');
$requestId = $methods->getRequestId($_SERVER['REQUEST_URI']);
?>