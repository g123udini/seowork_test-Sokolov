<?php

//Проверочный скрипт
use SeoworkTest\Calculator;
use SeoworkTest\SumHelper;

require_once 'vendor/autoload.php';

//первый способ (7 минут, недавно знакомился просто с GMP)
$test_array = [];
for ($i = 0; $i < 50; $i++) {
    $test_array[] = gmp_init('11111111111111111111111111111111111111111111111111');
}

$sum = '0';
foreach ($test_array as $num) {
    $sum = gmp_add($sum, $num);
}
echo $sum;


//Тестовый массив для следующих сложений
$test_array = [];
for ($i = 0; $i < 50; $i++) {
    $test_array[] = '11111111111111111111111111111111111111111111111111';
}

//второй способ (быстро нагуглился за 20 минут, просто взял и он работает)
$sum = '0';
$calculator = new Calculator();
foreach ($test_array as $num) {
    $sum = $calculator->sum($sum, $num);
}

echo PHP_EOL . $sum;

//третий способ (44 минуты: сначала гуглил, потом нашел на C# написанный алгоритм и переделывал под PHP)
$sum = '0';
foreach ($test_array as $num) {
    $sum = SumHelper::sum($sum, $num);
}

echo PHP_EOL . $sum;

//четвертый способ (1 час - прочитал пару статей про длинную арифметику и алгоритмы работы с числами, минут 20 реализовывал сложение в столбик)
$sum = '0';
foreach ($test_array as $num) {
    $sum = SumHelper::sum2($sum, $num);
}

echo PHP_EOL . $sum;