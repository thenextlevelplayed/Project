<?php
    if (isset($_POST['Name'])) {

        session_start();

        $name = $_POST['Name'];
        $company = $_POST['Company'];
        $tel = $_POST['Tel'];
        $email = $_POST['Email'];
        $content = $_POST['Content'];
        $captcha = $_POST['Captcha'];

        $date = date("Y/m/d H:i:s");

        var_dump($date);


        // $to = "a159856a@gmail.com";
        // $subject= "諮詢表單";
        $msg = "
                    姓名:{$name} \n
                    公司:{$company} \n
                    電話:{$tel} \n
                    Email:{$email} \n
                    詢問內容:{$content} \n  
            ";
        // mail($to,$subject,$msg);



        //php mysqli 串接資料庫
        $mysqli = new mysqli('localhost', 'root', '', 'msgdb', 3306);
        $mysqli->set_charset('utf8');
        $sql = "INSERT INTO `message`(msg_name ,msg_company ,msg_tel, msg_email, msg_time, msg_content) VALUES (?,?,?,?,?,?) ";
        $stmt = $mysqli->prepare($sql);
        // var_dump($stmt);
        $stmt->bind_param('ssssss',$name ,$company ,$tel ,$email ,$date ,$content);
        $stmt->execute();
        echo "Created successfully!";
        $stmt->close();
        $mysqli->close();
        echo "驗證碼正確,$msg";

        header('Location: http://localhost:3000/html/contact.html');

    } else {
        echo "驗證碼錯誤";
    }
