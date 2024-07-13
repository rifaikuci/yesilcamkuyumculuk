<?php
$locationString = "Location: ";


if (isset($_POST['loginControl'])) {
    $name = $_POST['name'];
    $password = md5($_POST['password']); // Consider using password_hash() for better security

    // Use prepared statements to prevent SQL injection
    $stmt = $db->prepare("SELECT * FROM user WHERE userName = ? AND password = ?");
    $stmt->bind_param("ss", $name, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['management'] = uniqid();
        $_SESSION['userName'] = $name;
        header($locationString . baseUrlBack());
        exit();
    } else {
        header($locationString . baseUrlBack() . "src/login/?kullanici=no");
        exit();
    }

    $stmt->close();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header($locationString . baseUrlBack() . "/src/login");
}
?>
