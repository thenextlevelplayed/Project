<?php 

    header("Content-type: image/png");

    session_start();
    $_SESSION['check_word'] = '';  //設置SESSION存放驗證碼區
    
    //去除了數字0和1 字母小寫O和L，為了避免辨識不清楚
    $CapCode =  "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMOPQRSTUBWXYZ";
    $Captcha = "";

    // 產生一組6位數亂碼
    for($i=0;$i<6;$i++){ 
        $pos = rand(0, 35);
        $Captcha .= $CapCode[$pos];
    }

    $_SESSION['check_word'] = $Captcha;   //SESSION存放驗證碼

    // echo $Captcha;

    // var_dump($CapCode);
    $img_handle = Imagecreate(100, 30);
    $bg_color = ImageColorAllocate($img_handle, 255, 255, 255);
    $txt_color = ImageColorAllocate($img_handle, 0, 0, 0);

    for($i=0;$i<3;$i++) //隨機3條線
    {
        $line = ImageColorAllocate($img_handle,rand(100,255),rand(100,255),rand(100,255));
        Imageline($img_handle, rand(0,15), rand(0,15), rand(100,150),rand(10,50), $line);
    }
    for($i=0;$i<200;$i++) //隨機200點
    {
        $randColor = ImageColorallocate($img_handle,rand(0,255),rand(0,255),rand(0,255));
        Imagesetpixel($img_handle, rand()%100 , rand()%50 , $randColor);
    }


    Imagefill($img_handle, 0, 0, $bg_color);  // 驗證碼背景
    ImageString($img_handle, 5, 25, 5, $Captcha, $txt_color);  //驗證字串設定 


    ob_clean(); //清除緩衝區
    
    Imagepng($img_handle);
    Imagedestroy($img_handle);

?>
