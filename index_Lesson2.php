<?php

print_r('1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные
значения. Затем написать скрипт, который работает по следующему принципу:
a. Если $a и $b положительные, вывести их разность.
b. Если $а и $b отрицательные, вывести их произведение.
c. Если $а и $b разных знаков, вывести их сумму.'.'<br>'.'<br>');

$a = -62;
$b = 9;
if($a >= 0 && $b >= 0){
	echo ($a - $b).'<br>'.'<br>';
}
elseif ($a < 0 && $b < 0){
	echo ($a * $b).'<br>'.'<br>';
}
elseif ($a < 0 && $b >= 0 || $a >= 0 && $b < 0){
	echo ($a + $b).'<br>'.'<br>';
} 
else {
	echo "Введите корректные данные";
}


print_r('2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора
switch организовать вывод чисел от $a до 15.'.'<br>'.'<br>');


$a = 10;
switch($a){
	case 1:
		echo (1).'<br>';
	case 2:
		echo (2).'<br>';
	case 3:
		echo (3).'<br>';
	case 4:
		echo (4).'<br>';		
	case 5:
		echo (5).'<br>';
	case 6:
		echo (6).'<br>';
	case 7:
		echo (7).'<br>';
	case 8:
		echo (8).'<br>';
	case 9:
		echo (9).'<br>';
	case 10:
		echo (10).'<br>';
	case 11:
		echo (11).'<br>';
	case 12:
		echo (12).'<br>';
	case 13:
		echo (13).'<br>';
	case 14:
		echo (14).'<br>';
	case 15:
		echo (15).'<br>'.'<br>';
	break;		
}

print_r('3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
Обязательно использовать оператор return.'.'<br>'.'<br>');


function substraction($a, $b){
	return $a - $b;
}
echo substraction(5, 8).' - Разность'.'<br>'.'<br>';

function summ($a, $b){
	return $a + $b;
}
echo summ(85, 84).' - Сумма'.'<br>'.'<br>';

function multiply($a, $b){
	return $a * $b;
}
echo multiply(15, 28).' - Умножение'.'<br>'.'<br>';

function division($a, $b){
	return $a / $b;
}
echo division(8, 87).' - Деление'.'<br>'.'<br>';


print_r('4.Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В
зависимости от переданного значения операции выполнить одну из арифметических операций
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).'.'<br>'.'<br>');


function mathOperation($arg1, $arg2, $operation){
	switch($operation){
		case 'substraction':
			echo substraction($arg1, $arg2).' - Разность'.'<br>';
			break;
		case 'summ':
			echo summ($arg1, $arg2).' - Сумма'.'<br>';
			break;
		case 'multiply':
			echo multiply($arg1, $arg2).' - Умножение'.'<br>';
			break;
		case 'division':
			echo division($arg2, $arg2).' - Деление'.'<br>';
			break;
		default: echo "Необходимо ввести правильные данные";
			
	}
}
echo mathOperation(25,5,'substraction').'<br>'.'<br>';



print_r('6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.'.'<br>'.'<br>');

function power($val, $pow){
	if ($pow == 0){
			return (1).'<br>'.'<br>';
	}
    elseif ($pow < 0){
		return power(1 / $val, -$pow).'<br>'.'<br>';
	}
	elseif ($pow != 1) {
		return $val * power($val, $pow - 1).'<br>'.'<br>';
	}
	else{
		return $val;
	}
}
echo power(2,-3);
echo power(2,4);


print_r('7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты'.'<br>'.'<br>');

function correctTimeName(){
    $minutes = date("i");
    $hours = date("H");
    if($hours == 1 || $hours == 21){
        $hoursName = " час";
    } 
    elseif(($hours >= 2 && $hours <=4) || ($hours >= 22 && $hours <= 24)){
        $hoursName = " часа";
    }
    else{
        $hoursName = " часов";
    }
    if($minutes > 10 || $minutes < 20){
        $minutesName = " минут";
    }
    elseif(($minutes % 10) >=2 && ($minutes % 10) <=4){
        $minutesName = " минуты";
    }
    elseif($minutes % 10 == 1){
        $minutesName = " минута";
    }
    else{
        $minutesName = " минут";
    }
    return $hours.$hoursName." ".$minutes.$minutesName;
}
echo correctTimeName();
?>
