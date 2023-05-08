<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);
$mail->setFrom('bestsiteidea@bestsiteidea.com.ua', 'Сообщение с сайта');
$mail->addAddress('germanovilya2712@gmail.com', 'Сообщение');
$mail->Subject = 'Сообщение клиента';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Вписываем токен бота в телеграмме
  $token = "2097395866:AAGWb96YuOtGWUtgFopJrmKaKg2uv37CgWc";
  // Вписываем id чата в телеграмме
  $chat_id = "-545900416";
  $elf='%0A';
  if (isset($_POST['name'])) {
    if (!empty($_POST['name'])) {
      $name = "<strong>Имя:</strong> " . strip_tags($_POST['name']);
      $name1 = "<strong>Имя:</strong> " . strip_tags($_POST['name']) . $elf;
    }
  }
  if (isset($_POST['message'])) {
    if (!empty($_POST['message'])) {
      $message = "<strong>Сообщение:</strong> " . strip_tags($_POST['message']);
      $message1 = "<strong>Сообщение:</strong> " . strip_tags($_POST['message']) . $elf;
    }
  }
  if (isset($_POST['task'])) {
    if (!empty($_POST['task'])) {
      $task = "<strong>Краткое описание задачи:</strong> " . strip_tags($_POST['task']);
      $task1 = "<strong>Краткое описание задачи:</strong> " . strip_tags($_POST['task']) . $elf;
    }
  }

  // Формируем текст сообщения для Email
  $mail->Body = "<p> $name </p>" . "<p> $message </p>" . "<p> $task </p>";
  // Формируем текст сообщения для Telegram
  $txt = $name1 . $message1 . $task1;

  function fileGetContents($url)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
  }
  $content = fileGetContents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}");
}
if (!$mail->send()) {
  $message = 'Ошибка';
} else {
  $message = 'Данные отправлены!';
};
$response = ['message' => $message];
header('Content-type: application/json');
echo json_encode($response);
?>