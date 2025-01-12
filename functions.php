<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}

function realUrl($goTo = '/biblioteka/'){
    $uri = "/biblioteka/".$goTo;
    return $uri;
}

function realBase(){
    $url = parse_url($_SERVER['REQUEST_URI'])['path'];
    $stripPath = str_replace('/biblioteka', '', $url);
    return $stripPath;
}


function convert_filesize($bytes, $decimals = 2) { 
    $size = array('B','KB','MB','GB','TB','PB','EB','ZB','YB'); 
    $factor = floor((strlen($bytes) - 1) / 3); 
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor]; 
}

function compressImage($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    return $destination; 
}

function url_exists($url) {
    return curl_init($url) !== false;
}

//will find all occurances of all words and make them strong in html
function strong_words( $title, $searched_words_array) {
    //for all words in array
    foreach ($searched_words_array as $word){

        $lastPos = 0;
        $positions = array();
        //find all positions of word
        while (($lastPos = stripos($title, $word, $lastPos))!== false) {
            $positions[] = $lastPos;
            $lastPos = $lastPos + strlen($word);
        }
        //reverse sort numeric array
        rsort($positions);

        // highlight all occurances
        foreach ($positions as $pos) {
            $title = strong_word($title , $word, $pos);
        }
    }

//apply strong html code to occurances
    $title = str_replace('#####','</strong>',$title);
    $title = str_replace('*****','<strong style="background-color: yellow;">',$title);
    return $title; // return highlighted data
}


function strong_word($title , $word, $pos){
//ugly hack to not use <strong> , </strong> here directly, as it can get replaced if searched word contains charcters from strong
    $title = substr_replace($title, '#####', $pos+strlen($word) , 0) ;
    $title = substr_replace($title, '*****', $pos , 0) ;
    return $title;
}

function dateDiffInDays($date1, $date2)
{
    if (strtotime($date2) < strtotime($date1)) {
            // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);
    if (abs(round($diff / 86400)) != 1) {
        $mp = "а";
    }else{
        $mp= "";
    }
    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds

    return "<p style='color: red'>+" .abs(round($diff / 86400)). " ден".$mp.".</p>";

        }else{
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);

        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        if (abs(round($diff / 86400)) != 1) {
            $mp = "а";
        }else{
            $mp= "";
        }
        return "<p style='color: green'>Уште " .abs(round($diff / 86400)). " ден".$mp.".</p>";
    }

}

function kategorijaKniga($broj)
{
    if ($broj === 0){
        return 'Учебници';
    }elseif ($broj === 1){
        return 'Лектири';
    }elseif ($broj === 2){
        return 'Стручна литература';
    }elseif ($broj === 3){
        return 'Списанија';
    }else{
        return 'Друго';
    }
}

function statusKniga($broj)
{
    if ($broj === 0){
        return ' <div class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                       <span class="">нова</span><div>';
    }elseif ($broj === 1){
        return '<div class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-yellow-500/20">
                       <span class="">зачувана</span></div>';
    }elseif ($broj === 2){
        return '<div class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-orange-500/20">
                       <span class="">стара</span></div>';
    }elseif ($broj === 3){
        return '<div class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-red-500/20">
                       <span class="">оштетена</span></div>';
    }else{
        return 'Друго';
    }
}