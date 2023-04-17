<?php
// 获取表单提交的数据，并进行验证和过滤
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// 邮件收件人
$to = 'zxcvbg229@gmail.com'; // 将此处替换为您的实际收件人邮箱

// 邮件主题
$subject = '表单提交';

// 邮件正文
$body = "姓名： $name\n";
$body .= "邮箱： $email\n";
$body .= "讯息： $message\n";

// 邮件头部信息
$headers = 'From: ' . $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// 发送邮件
if (mail($to, $subject, $body, $headers)) {
    echo '邮件发送成功，请稍后回复您的邮件。';
} else {
    echo '邮件发送失败，请稍后重试。';
}
?>
