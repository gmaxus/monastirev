<?php

include 'library/init.php';

$sort = $_REQUEST['sort'];
$order = $_REQUEST['order'];

if(!in_array($sort, ['created', 'name', 'email']))
    $sort = 'created' ;
if(!in_array($order, ['asc', 'desc']))
    $order = 'desc' ;


if(isset($_REQUEST['add']))
{
    $message['message'] = $_REQUEST['message'];
    $message['name'] = $_REQUEST['name'];
    $message['email']= $_REQUEST['email'];

    if( empty($message['message']) ||
        empty($message['name']) ||
        empty($message['email']) ||
        empty(filter_var($message['email'], FILTER_VALIDATE_EMAIL)))
    {
        $template['data']['header'] = 'Error';
        $template['data']['message'] = 'Name, email, or message is empty or invalid';

        $template['path'] = 'templates/partials/error.php';
    }
    else
    {
        $message_id = $messages->add_message($message);
        
        if($message_id)
        {
            if(!empty($_FILES['upload']['tmp_name']))
            {
                $images_folder = getcwd()."/images";

                if ($image->resize_and_save_to_jpg($_FILES['upload']['tmp_name'], $images_folder, $message_id))
                    $messages->set_image_uploaded($message_id);
                else
                {
                    $messages->delete_message($message_id);
                    
                    $template['data']['header'] = 'Error';
                    $template['data']['message'] = 'Image upload failed';

                    $template['path'] = 'templates/partials/error.php';
                }
            }
        }
        else
        {
            $template['data']['header'] = 'Error';
            $template['data']['message'] = 'Message not sended';

            $template['path'] = 'templates/partials/error.php';
        }
    }
}

if(!isset($template['data']['header']))
{
    if($is_admin)
        $template['data']['messages'] = $messages->get_messages("$sort $order");
    else
        $template['data']['messages'] = $messages->get_approved_messages("$sort $order");

    $template['path'] = 'templates/index.php';
}

include 'templates/layouts/proceed_assembly.php';

?>