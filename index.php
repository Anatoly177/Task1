<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php

function sumOfNumbers() {  // функция сложения значений чекбоксов для вывода в 'input'
    $sum = 19;
    if (isset($_POST['option']) && !isset($_POST['option0'])) {
        $answr = $_POST['option'];
        $sum = 0;
        foreach($answr as $item) {
            $sum += $item;
        }
    } elseif (isset($_POST['option0'])) {
        unset($_POST['save']);
        $sum = 0;
    }
    return $sum;
}

function disabled() {   // функция делает неактивными чекбоксы если выбран вариант 'ЖИВОТНЫЕ ОТСУТСТВУЮТ'
    if (isset($_POST['option0'])) {
        $dis = 'disabled';
    }
    return $dis;
}

$array1 = [1, 3, 5, 9, 17, 7, 13, 25, 11, 19, 21, 15, 29, 27, 23, 31];  // создаем массивы с различными результатами 
$array2 = [2, 3, 6, 10, 18, 31, 30, 27, 15, 23, 7, 14, 26, 11, 19, 22];
$array4 = [4, 5, 6, 12, 20, 7, 14, 28, 22, 21, 13, 15, 23, 29, 30, 31];
$array8 = [8, 9, 10, 14, 24, 11, 13, 25, 14, 26, 28, 15, 29, 27, 30, 31];
$array16 = [16, 17, 18, 20, 24, 19, 22, 28, 25, 21, 26, 23, 30, 29, 27, 31];
$result = array_merge($array1, $array2, $array4, $array8, $array16);

    if (isset($_POST['save'])) {  // проверяем поле input type = 'text', если пользователь ввел результат вручную
    $input = $_POST['save'];
    $checked = 'checked';
    $unchecked = 'unchecked';

    if (in_array($input, $array1)) {  
        $checked1 = $checked;
    }

    if (in_array($input, $array2)) {
        $checked2 = $checked;
    }

    if (in_array($input, $array4)) {
        $checked4 = $checked;
    }

    if (in_array($input, $array8)) {
        $checked8 = $checked;
    }

    if (in_array($input, $array16)) {
        $checked16 = $checked;
    }

    if ($input == 0) {
        $checked0 = $checked;
    } 
} 


    if (!in_array($input, $result) && $input != 0) {  // проверка на корректность введенного значения
        echo "Ошибка: Вы ввели некоррекное значение" ;
    }  

    if (!isset($_POST['option']) && !isset($_POST['save']) && !isset($_POST['option0'])) { // проставляем checked у вариантов ответов в соответствии со значением хранилища по умолчанию (19)
        $checkedDefault = 'checked';
    }

?>  
<form class="offset-md-5" method="post">  
   <p><b>КАКИЕ ЖИВОТНЫЕ У ВАС ЕСТЬ?</b></p>
   <p><input class="form-check-input" type="checkbox" name="option[]" value= 1 <?php echo $checkedDefault;?> <?php echo disabled();?> <?php echo $checked1;?>>  Кошка<br>
   <input class="form-check-input" type="checkbox" name="option[]" value= 2 <?php echo $checkedDefault;?> <?php echo disabled();?> <?php echo $checked2;?>> Собака<br>
   <input class="form-check-input" type="checkbox" name="option[]" value= 4 <?php echo disabled();?> <?php echo $checked4;?>> Попугай<br> 
   <input class="form-check-input" type="checkbox" name="option[]" value= 8 <?php echo disabled();?> <?php echo $checked8;?>> Рыбки<br> 
   <input class="form-check-input" type="checkbox" name="option[]" value= 16 <?php echo $checkedDefault;?> <?php echo disabled();?> <?php echo $checked16;?>> Рептилии<br>
   <input class="form-check-input" type="checkbox" name="option0" value= 0 <?php echo $checked0?>> ЖИВОТНЫЕ ОТСУТСТВУЮТ</p>
   <p><input class="btn btn-primary" type="submit" name="submit" value="Отправить"></p>
   <p><input class="form-label" type=text name="save" value="<?php echo sumOfNumbers() ?>"></p>
  </form>

</div>
</body>
</html>