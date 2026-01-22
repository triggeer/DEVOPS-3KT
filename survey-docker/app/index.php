<?php
$success = isset($_GET['success']);
$error = isset($_GET['error']) ? $_GET['error'] : null;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Опросник</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
        .alert { padding: 15px; margin: 20px 0}
        .success { background: white; color: green}
        .error { background: white; color: red}
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea, select { width: 100%; padding: 10px; border: 1px solid #ddd}
        button { background: blue; color: white; padding: 12px 24px; border: none}
        button:hover { background: blue; }
        .links { margin-top: 30px; text-align: center; }
    </style>
</head>
<body>
    <h1>Опросник</h1>
    
    <?php if ($success): ?>
        <div class="alert success">
            Спасибо! Ваши ответы успешно сохранены.
        </div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="alert error">
            Ошибка при сохранении данных. Попробуйте еще раз.
        </div>
    <?php endif; ?>
    
    <form method="POST" action="process.php">
        <div class="form-group">
            <label for="full_name">ФИО *</label>
            <input type="text" id="full_name" name="full_name" required>
        </div>
        
        <div class="form-group">
            <label for="question1">1. Как оцениваете качество обучения в ПГНИУ? *</label>
            <select id="question1" name="question1" required>
                <option value="">Выберите оценку</option>
                <option value="Отлично">Отлично</option>
                <option value="Хорошо">Хорошо</option>
                <option value="Удовлетворительно">Удовлетворительно</option>
                <option value="Плохо">Плохо</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="question2">2. Что думаете о рассписании? *</label>
            <textarea id="question2" name="question2" rows="4" required></textarea>
        </div>
        
        <div class="form-group">
            <label>3. Планируете ли поступать в магистратуру после 4 курса? *</label><br>
            <label><input type="radio" name="question3" value="Да" required> Да</label><br>
            <label><input type="radio" name="question3" value="Нет"> Нет</label><br>
            <label><input type="radio" name="question3" value="Затрудняюсь ответить"> Затрудняюсь ответить</label>
        </div>
        
        <button type="submit">Отправить</button>
    </form>
    
    <div class="links">
        <p><a href="results.php">Посмотреть все результаты →</a></p>
    </div>
</body>
</html>