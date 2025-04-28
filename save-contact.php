<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['cf-name'] ?? '');
    $email = trim($_POST['cf-email'] ?? '');
    $message = trim($_POST['cf-message'] ?? '');

    if (!empty($name) && !empty($email) && !empty($message)) {
        $data = "Name: " . $name . "\nEmail: " . $email . "\nMessage: " . $message . "\n---\n";

        // Ghi vào file contact-info.txt (thêm nội dung, không ghi đè)
        file_put_contents('contact-info.txt', $data, FILE_APPEND | LOCK_EX);

        // Sau khi ghi xong, quay về trang form
        header("Location: thank-you.html");
        exit();
    } else {
        echo "All fields are required!";
    }
} else {
    echo "Invalid request.";
}
?>