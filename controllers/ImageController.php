<?php

namespace controllers;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController {

    public function waterImage(){

        $image = Image::make(ROOT.'public/uploads/image.jpg');

        $image->insert(ROOT.'public/uploads/water.gif','top-right',10,10);
        $image->save(ROOT.'public/uploads/waterImage.png');
    }

    public function crop(){

        $image = Image::make(ROOT.'public/uploads/image.jpg');

        $image->crop(300,300,400,80);

        $image->save(ROOT.'public/uploads/cropImage.png');
    }
}