<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Формирование самого письма
$title = "Заголовок письма";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br><br>
<b>Телефон:</b><br>$phone
";

// Настройки PHPMailer
$mail = new PHPMailer(true);

    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;

    // Настройки вашей почты
    $mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'login'; // Логин на почте
    $mail->Password   = 'password'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('mail@yandex.com', 'Имя отправителя'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->setFrom('mail@yandex.com', 'Pulse Watch Sport');   // От кого письмо 
    $mail->addAddress('jiydazotra@vusra.com');  

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;   

// Отправляем
if ($mail->send()) {
    echo 'Письмо отправлено!';
  } else {
    echo 'Ошибка: ' . $mail->ErrorInfo;
  }
?>