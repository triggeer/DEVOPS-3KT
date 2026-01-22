<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

$full_name = $_POST['full_name'] ?? '';
$question1 = $_POST['question1'] ?? '';
$question2 = $_POST['question2'] ?? '';
$question3 = $_POST['question3'] ?? '';

if (empty($full_name) || empty($question1) || empty($question2) || empty($question3)) {
    header('Location: index.php?error=empty');
    exit();
}

try {
    $sql = "INSERT INTO surveys (full_name, question1, question2, question3) 
            VALUES (:full_name, :question1, :question2, :question3)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':question1', $question1);
    $stmt->bindParam(':question2', $question2);
    $stmt->bindParam(':question3', $question3);
    
    if ($stmt->execute()) {
        header('Location: index.php?success=1');
    } else {
        header('Location: index.php?error=db');
    }
    
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    header('Location: index.php?error=db&message=' . urlencode($e->getMessage()));
    exit();
}
?>