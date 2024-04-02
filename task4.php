<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Розділення масиву на додатні та від'ємні числа</title>
</head>
<body>
<h2>Розділення масиву на додатні та від'ємні числа</h2>
<form action="" method="POST">
    <label for="array">Введіть масив чисел (розділіть числа комою):</label><br>
    <input type="text" id="array" name="array"><br>
    <button type="submit">Розділити</button>
</form>

<?php
if (isset($_POST['array'])) {
    $inputArray = explode(',', $_POST['array']);

    $positiveArray = [];
    $negativeArray = [];

    foreach ($inputArray as $number) {
        if ($number > 0) {
            $positiveArray[] = $number;
        } elseif ($number < 0) {
            $negativeArray[] = $number;
        }
    }

    echo "<p>Додатні числа: " . implode(', ', $positiveArray) . "</p>";
    echo "<p>Від'ємні числа: " . implode(', ', $negativeArray) . "</p>";
}
?>
</body>
</html>
