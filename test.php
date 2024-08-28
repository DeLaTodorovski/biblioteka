<?php

function uploadImage($filee, $name, $tmp_name, $size){

$target_dir = "./views/resourses/images/";


// Check if image file is a actual image or fake image
if(isset($filee)) {
    $target_file = $target_dir . basename($name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($tmp_name);
    if($check !== false) {
    //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
    //   echo "File is not an image.";
        $uploadOk = 0;
    }


    // Check if file already exists
    if (file_exists($target_file)) {
        $errors['slika'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($size > 500000) {
        $errors['slika'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $errors['slika'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errors['slika'] = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        $imageSize = convert_filesize($size);
        $compressedImage = compressImage($tmp_name, $target_file, 75); 
                
        if($compressedImage){ 
            $compressedImageSize = filesize($compressedImage); 
            $compressedImageSize = convert_filesize($compressedImageSize); 
            
            echo "Image compressed successfully."; 
            return $compressedImage;
        }else{ 
            $errors['slika'] = "Image compress failed!"; 
        } 

    //   if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
    //         $imageUrl = htmlspecialchars( basename( $compressedImage));
    //   } else {
    //     $errors['slika'] = "Sorry, there was an error uploading your file.";
    //   }
    }

}
}