<?php

class Image
{
    public function resize_and_save_to_jpg($uploaded_file, $user_folder, $file_name)
    {
        global $_SESSION, $_FILES;

        $extension = $this->get_extension($uploaded_file);
        if ($extension === false)
            return false;

        $save_to = "$user_folder/$file_name.jpg";

        $image = $this->resize_image($uploaded_file, 320, 240, $extension);
        if($image)
            return $this->save_resized_image($image, $save_to);
        else
            return false;
    }

//	––––––––––––––––––––––––––––––––––––––––––––––––––

    public function get_extension($file)
    {
        $info = getimagesize($file);

        if ($info === false)
            return false;
        elseif ($info['mime'] == 'image/pjpeg' || $info['mime'] == 'image/jpeg' || $info['mime'] == 'image/jpg')
            return 'jpg';
        elseif ($info['mime'] == 'image/gif')
            return 'gif';
        elseif($info['mime'] == 'image/x-png' || $info['mime'] == 'image/png')
            return 'png';
        else
            return false;
    }

//	––––––––––––––––––––––––––––––––––––––––––––––––––

    public function resize_image($file_name, $max_width, $max_height, $type)
    {
        list($orig_width, $orig_height) = getimagesize($file_name);

        $width = $orig_width;
        $height = $orig_height;

        if ($height > $max_height) {
            $width = ($max_height / $height) * $width;
            $height = $max_height;
        }

        if ($width > $max_width) {
            $height = ($max_width / $width) * $height;
            $width = $max_width;
        }

        $image_p = imagecreatetruecolor($width, $height);

        if ($type == 'jpg')
            $image = imagecreatefromjpeg($file_name);
        elseif ($type == 'gif')
            $image = imagecreatefromgif($file_name);
        elseif ($type == 'png')
            $image = imagecreatefrompng($file_name);
        else
            return false;


        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

        return $image_p;
    }

//	––––––––––––––––––––––––––––––––––––––––––––––––––

    function save_resized_image($image, $to)
    {
        if (imagejpeg($image, $to))
            return true;
        else
            return false;
    }
}

?>