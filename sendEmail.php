<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form fields
    $name    = isset($_POST['name'])    ? trim($_POST['name'])    : '';
    $email   = isset($_POST['email'])   ? trim($_POST['email'])   : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Basic validation
    if ($name === '' || $email === '' || $message === '') {
        // At least one required field is empty
        echo "Lütfen tüm alanları doldurun.";
        exit;
    }

    // Email settings
    $to      = "katibifizyo@gmail.com"; // Where you want the email to go
    $subject = "İletişim Formu Mesajı"; // Email subject
    
    // Build the email content
    $body    = "İsim: $name\n"
             . "E-posta: $email\n\n"
             . "Mesaj:\n$message\n";
    
    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Attempt to send the email
    if (mail($to, $subject, $body, $headers)) {
        // Success message
        echo "Teşekkürler, $name. Mesajınız bize ulaştı, en kısa sürede dönüş yapacağız.";
    } else {
        // Failure message
        echo "Mesajınız gönderilirken bir hata oluştu. Lütfen daha sonra tekrar deneyin.";
    }
} else {
    // If the request is not POST, redirect to the form or show an error
    header("Location: index.html"); // or contact.html
    exit;
}
?>
