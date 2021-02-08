<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$commentary = $_POST['commentary'];
$email = $_POST['email'];

// параметры проверяются только если одна из форм активирована
if ( ! empty($_POST)) {
    if (isset($_POST['send-comment'])) {
        // при отправке формы send-comment

        // Формирование самого письма
        $title = "Новый комментарий с Universal";
        $body = "
        <h2>Новый комментарий к статье</h2>
        <b>Сообщение:</b><br>$commentary
        ";

        // Настройки PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        try {
            $mail->isSMTP();   
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth   = true;
            // $mail->SMTPDebug = 2;
            $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

            // Настройки вашей почты
            $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
            $mail->Username   = 'movorly@gmail.com'; // Логин на почте
            $mail->Password   = '123456vorob!'; // Пароль на почте
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            $mail->setFrom('movorly@gmail.com', 'Movorly'); // Адрес самой почты и имя отправителя

            // Получатель письма
            $mail->addAddress('info@movorly.ru');  

            // Отправка сообщения
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $body;    

            // Проверяем отравленность сообщения
            if ($mail->send()) {$result = "success";} 
            else {$result = "error";}

            }
            catch (Exception $e) {
                $result = "error";
                $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
            }

            // Отображение результата
            header('Location: thanx-comment.html');        
        
    } else if (isset($_POST['subscribe'])) {
        // при отправке формы subscribe

        // Формирование самого письма
        $title = "Сообщение из формы Подписка с Universal";
        $body = "
        <h2>Подписка на рассылку</h2>
        <b>Email:</b> $email
        ";

        // Настройки PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        try {
            $mail->isSMTP();   
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth   = true;
            // $mail->SMTPDebug = 2;
            $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

            // Настройки вашей почты
            $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
            $mail->Username   = 'movorly@gmail.com'; // Логин на почте
            $mail->Password   = '123456vorob!'; // Пароль на почте
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            $mail->setFrom('movorly@gmail.com', 'Movorly'); // Адрес самой почты и имя отправителя

            // Получатель письма
            $mail->addAddress('info@movorly.ru');  

            // Отправка сообщения
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $body;    

            // Проверяем отравленность сообщения
            if ($mail->send()) {$result = "success";} 
            else {$result = "error";}

            }
            catch (Exception $e) {
                $result = "error";
                $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
            }

            // Отображение результата
            header('Location: thanx-subscribe.html');

    } else {
        echo 'ошибка';
    }
}



