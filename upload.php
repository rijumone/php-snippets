<?php  //echo "<pre>";print_r($_FILES);exit;

        $pic = rand(1000,100000)."-".$_FILES['file']['name'];
        $pic_loc = $_FILES['file']['tmp_name'];
        $folder="uploaded_files/";
        if(move_uploaded_file($pic_loc,$folder.$pic))
        {
            echo $pic;
        }
        else
        {
            echo 0;
        } 

exit;
?>