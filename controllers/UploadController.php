<?php

namespace controllers;

class UploadController {

    public function index(){
        view('upload.index');
    }

    public function saveBig(){

        $img = $_FILES['img'];
        $i = $_POST['i'];
        $count = $_POST['count'];
        $name = $_POST['name'];

        move_uploaded_file($img['tmp_name'],ROOT.'public/tmp/'.$i);

        if($i+1 == $count){

            $fp = fopen(ROOT.'public/uploads/big/'.$name.".png","a");

            for($i=0;$i<$count;$i++){

                fwrite($fp,file_get_contents(ROOT.'public/tmp/'.$i));
                @unlink(ROOT.'public/tmp/'.$i);
            }

            fclose($fp);
        }   
    }
}