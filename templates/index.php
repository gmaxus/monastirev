<?php

$is_for_preview = false;
foreach ($template['data']['messages'] as $message)
    include 'partials/message.php';

if(!$is_admin)
    include 'partials/feedback_form.php';


unset($message);
$is_for_preview = true;
include 'partials/message.php';

?>