<?php

include 'library/init.php';

$login = $_REQUEST['login']; 
$password = $_REQUEST['password'];

// are you logged in administrator?
if($is_admin)
{
    // want to save edited message?
    if(isset($_REQUEST['id']) && isset($_REQUEST['message']))
    {
        $message_id = $_REQUEST['id'];
        $message = $_REQUEST['message'];

        if(empty($message_id) || empty($message))
        {
            header('Location: index.php');
            die();
        }
        else
        {
            $messages->set_message_modified_if_needed($message_id, $message);
            
            header('Location: index.php');
            die();
        }
    }
    // or want to edit message by id?
    elseif(isset($_REQUEST['edit']))
    {
        $message_id = $_REQUEST['id'];

        $message = $messages->get_message($message_id);

        if($message)
        {
            $template['data']['message'] = $messages->get_message($message_id);
            $template['path'] = 'templates/partials/feedback_form.php';
        }
        else
            $template['path'] = 'templates/partials/404.php';
    }
    // admin logout
    elseif(isset($_REQUEST['logout']))
    {
        session_destroy();
        header('Location: index.php');
        die();
    }
    // approve or disapprove message
    elseif(isset($_REQUEST['approve']) || isset($_REQUEST['disapprove']))
    {
        $message_id = $_REQUEST['id'];

        if(!empty($message_id))
        {
            if(isset($_REQUEST['approve']))
                $messages->set_message_approved($message_id);
            else
                $messages->set_message_disapproved($message_id);

            header('Location: index.php');
            die();
        }
        else
        {
            header('Location: index.php');
            die();
        }

    }
}
// administrator authorization
elseif($login == $admin['login'] && $password == $admin['password'])
{
    $_SESSION['is_admin'] = true;

    header('Location: index.php');
    die();
}
else
    $template['path'] = 'templates/admin_login.php';

include 'templates/layouts/proceed_assembly.php';

?>