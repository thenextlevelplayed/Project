<?php
    date_default_timezone_set('Asia/Taipei');

    if(isset($_POST['Name'])){
        $name = $_POST['Name']; $company = $_POST['Company']; $tel = $_POST['Tel'];
        $email = $_POST['Email']; $content = $_POST['Content']; $captcha = $_POST['Captcha'];
        $date = new DateTime();
        

        session_start();

        if($captcha == $_SESSION['check_word']){
            // echo "驗證碼正確";
            $to = "a159856a@gmail.com";
            $subject= "諮詢表單";
            $msg = "
                    姓名:{$name} \n
                    公司:{$company} \n
                    電話:{$tel} \n
                    Email:{$email} \n
                    詢問內容:{$content} \n
                    
            ";

            mail($to,$subject,$msg);

        }else{
            echo "驗證碼錯誤";
        }


    }

    ?>