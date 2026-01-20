<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

try {
    $sql = "SELECT * FROM surveys ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
    
    $count_sql = "SELECT COUNT(*) as total FROM surveys";
    $count_stmt = $pdo->query($count_sql);
    $total_count = $count_stmt->fetch()['total'];
    
} catch (PDOException $e) {
    $error = "Ошибка подключения: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результаты опроса</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .error { color: red; margin: 20px 0; }
        .count { margin: 10px 0; color: #666; }
        .back-link { margin-top: 20px; display: block; }
    </style>
</head>
<body>
    <h1>Результаты опроса</h1>
    
    <?php if (isset($error)): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <?php if (!isset($error)): ?>
        <div class="count">Всего ответов: <?php echo $total_count; ?></div>
        
        <?php if ($total_count > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Оценка сервиса</th>
                    <th>Что улучшить</th>
                    <th>Рекомендация</th>
                </tr>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['question1']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['question2'])); ?></td>
                    <td><?php echo htmlspecialchars($row['question3']); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Нет данных. Пока никто не заполнил опрос.</p>
        <?php endif; ?>
    <?php endif; ?>
    
    <a href="index.php" class="back-link">← Вернуться к опросу</a>
</body>
</html>