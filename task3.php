<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обернене слово</title>
</head>
<body>
<h2>Обернене слово</h2>
<form action="" method="POST">
    <label for="word">Введіть слово:</label><br>
    <input type="text" id="word" name="word"><br>
    <button type="submit">Вивести обернене слово</button>
</form>

<?php
if (isset($_POST['word'])) {
    $word = $_POST['word'];

    function reverseWord($word) {
        return strrev($word);
    }

    $reversedWord = reverseWord($word);
    echo "<p>Обернене слово: $reversedWord</p>"; // на якомусь моменті виникає проблема з виведенням кирилиці
}
?>
</body>
</html>
