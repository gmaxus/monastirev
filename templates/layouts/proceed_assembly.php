<?php

ob_start();

include $template['path'];

$template['body'] = ob_get_contents();

ob_clean();

include 'header.php';
include 'body.php';
include 'footer.php';

?>