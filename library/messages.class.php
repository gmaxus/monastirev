<?php

class Messages
{
    public $table = 'messages';

    public function get_message($id)
    {
        global $db;

        if(!(intval($id) > 0))
            return false;

        $message = $db->getRow('SELECT * FROM ?n WHERE id=?i', $this->table, $id);

        if(empty($message))
            return false;

        return $message;
    }

    public function get_messages($order_by = 'created DESC')
    {
        global $db;

        $messages = $db->getAll('SELECT * FROM ?n ORDER BY ?p', $this->table, $order_by);

        if(empty($messages))
            return false;

        return $messages;
    }

    public function get_approved_messages($order_by = 'created DESC')
    {
        global $db;

        $messages = $db->getAll('SELECT * FROM ?n WHERE approved=1 ORDER BY ?p', $this->table, $order_by);

        if(empty($messages))
            return false;

        return $messages;
    }

    public function set_message_modified_if_needed($id, $edited_message)
    {
        global $db;
        
        if(!(intval($id) > 0))
            return false;
        
        $message_item = $this->get_message($id);

        if($edited_message != $message_item['message'])
            if($db->query('UPDATE ?n SET modified=1, message=?s WHERE id=?i', $this->table, $edited_message, $id))
                return true;
        
        return false;
    }

    public function add_message($array_of_values)
    {
        global $db;

        if($db->query('INSERT INTO ?n SET ?u, `created`=NOW()', $this->table, $array_of_values))
            return $db->insertId();;
        
        return false;

    }
    public function delete_message($id)
    {
        global $db;
        
        if($db->query('DELETE FROM ?n WHERE id=?i', $this->table, $id))
            return true;

        return false;

    }

    public function set_message_approved($id, $approved = 1)
    {
        global $db;

        if($db->query('UPDATE ?n SET approved=?i WHERE id=?i', $this->table, $approved, $id))
            return true;

        return false;
    }
    
    public function set_message_disapproved($id)
    {
        return $this->set_message_approved($id, 0);
    }

    public function set_image_uploaded($id)
    {
        global $db;

        if($db->query('UPDATE ?n SET image=1 WHERE id=?i', $this->table, $id))
            return true;

        return false;
    }

//    public function get_messages()
//    {
//
//    }


}

?>