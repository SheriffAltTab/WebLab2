<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перевірка коректності використання дужок</title>
</head>
<body>
<h2>Перевірка коректності використання дужок</h2>
<form action="" method="POST">
    <label for="brackets">Введіть рядок з дужками:</label><br>
    <input type="text" id="brackets" name="brackets"><br>
    <button type="submit">Перевірити</button>
</form>

<?php
if (isset($_POST['brackets'])) {
    $brackets = $_POST['brackets'];

    function checkBrackets($brackets) {
        $stack = [];

        for ($i = 0; $i < strlen($brackets); $i++) {
            $char = $brackets[$i];

            if ($char == '{' || $char == '(') {
                array_push($stack, $char);
            } elseif ($char == '}' || $char == ')') {
                if (empty($stack)) {
                    return false;
                } elseif (($char == '}' && array_pop($stack) != '{') || ($char == ')' && array_pop($stack) != '(')) {
                    return false;
                }
            }
        }

        return empty($stack);
    }

    $isValid = checkBrackets($brackets);

    echo "<p>Введений рядок з дужками:</p>";
    echo "<p>$brackets</p>";

    if ($isValid) {
        echo "<p>Рядок з дужками є коректним.</p>";
    } else {
        echo "<p>Рядок з дужками не є коректним.</p>";
    }
}
?>
</body>
</html>
