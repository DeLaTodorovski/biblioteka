<?php



$target_dir = "./views/resourses/images/";


// Check if image file is a actual image or fake image
if(isset($_FILES["slika"])) {
    $target_file = $target_dir . basename($_FILES["slika"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["slika"]["tmp_name"]);
    if($check !== false) {
    //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
    //   echo "File is not an image.";
        $error = "File is not an image.";
        $uploadOk = 0;
        $compressedImage = '';
    }


    // Check if file already exists
    if (file_exists($target_file)) {
        //$error = "File already exists.";
        $compressedImage = $target_file;
        $uploadOk = 1;
    }

    // Check file size
    if ($_FILES["slika"]["size"] > 500000) {
        $error = "Your file is too large.";
        $compressedImage = '';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $error = "Only JPG, JPEG, PNG & GIF files are allowed.";
        $compressedImage = '';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errors['slika'] = "Sorry, your file was not uploaded. ". $error;
        $compressedImage = '';
    // if everything is ok, try to upload file
    } else {
        $imageSize = convert_filesize($_FILES["slika"]["size"]);
        $compressedImage = compressImage($_FILES["slika"]["tmp_name"], $target_file, 75); 
                
        if($compressedImage){ 
            $compressedImageSize = filesize($compressedImage); 
            $compressedImageSize = convert_filesize($compressedImageSize); 
        }else{ 
            $errors['slika'] = "Sorry, your file was not uploaded. Image compress failed!"; 
            $compressedImage = '';
        } 

    //   if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
    //         $imageUrl = htmlspecialchars( basename( $compressedImage));
    //   } else {
    //     $errors['slika'] = "Sorry, there was an error uploading your file.";
    //   }
    }

}