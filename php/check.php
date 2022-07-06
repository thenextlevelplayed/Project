<?php 

    if (isset($_REQUEST['Captcha'])){
        
        session_start();

        $captcha = $_REQUEST['Captcha'];

        if ($captcha == $_SESSION['check_word']){
            echo "非常感謝您的來信,本公司將儘快回覆，謝謝！";
        }else{
            echo "驗證碼輸入錯誤!";
        }
    }

?>