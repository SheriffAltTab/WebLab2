<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обчислення добутку елементів масиву</title>
</head>
<body>
<h2>Обчислення добутку елементів масиву</h2>
<?php
// Створення масиву та заповнення його випадковими числами
$array = [];
for ($i = 0; $i < 10; $i++) {
    $array[] = rand(1, 100);
}

// Виведення оригінального масиву
echo "<p>Оригінальний масив: " . implode(', ', $array) . "</p>";

// Обчислення добутку елементів, які більше нуля та мають парні індекси
$product = 1;
foreach ($array as $index => $value) {
    if ($value > 0 && $index % 2 === 0) {
        $product *= $value;
    }
}
echo "<p>Добуток елементів, які більше нуля та мають парні індекси: $product</p>";

// Виведення елементів, які більше нуля та мають не парні індекси
echo "<p>Елементи, які більше нуля та мають не парні індекси: ";
foreach ($array as $index => $value) {
    if ($value > 0 && $index % 2 !== 0) {
        echo "$value ";
    }
}
echo "</p>";
?>
</body>
</html>
