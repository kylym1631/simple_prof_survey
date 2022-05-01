<?php
session_start();
    //include and initialize Poll class 
    require_once 'header.php';
    require_once 'dbConn.php';

// connect to the database
$pdo = pdo_connect_mysql();
$msg = '';

$spam = $_POST['spam'];
if (empty($spam)){
// условие проверки, если поле spam пустое, то форма обрабатывается, 

    // Check if POST data is not empty
    if (!empty($_POST)) {
        // Post data not empty insert a new record
        // Check if POST variable "title" exists, if not default the value to blank, basically the same for all variables
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phoneNumber = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
        $age = isset($_POST['age']) ? $_POST['age'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $oblast = isset($_POST['oblast']) ? $_POST['oblast'] : '';
        $gorod_rayon = isset($_POST['gorod_rayon']) ? $_POST['gorod_rayon'] : '';
        $lang = isset($_POST['lang']) ? $_POST['lang'] : '';

        //session
        $_SESSION["name"] = $name;
        $_SESSION["phone_number"] = $phoneNumber;
        $_SESSION["age"] = $age;
        $_SESSION["gender"] = $gender;
        $_SESSION["oblast"] = $oblast;
        $_SESSION["gorod_rayon"] = $gorod_rayon;
        $_SESSION["lang"] = $lang;
       

        // Output message to the user
        //echo 'Profile created successfully!<br>';
        //echo $_SESSION['name'];
    } elseif(!empty($_POST['phone_number'])){
        echo 'Profile created successfully!<br>';
        echo $_SESSION['name'];
    }else{
        echo "<a href ='index.php'>Пожалуйста пройдите регистрацию</a>";
    }

} else exit ; //spam bolso chyk ehske
?>
<div class="container">
<?php
echo "razdel dlia proverki<br>";
echo "$name<br>";
echo "$phoneNumber<br>";
echo "$age<br>";
echo "$gender<br>";
echo "$oblast<br>";
echo "$gorod_rayon<br>";
echo $lang;
?>


<?php

if ($lang == 'kg') {
    echo "Жеке маалыматтарды иштеп чыгууга макулмун";
} else {
    echo "Я согласен на обработку персональных данных";
}

?>


<a href ="anketa.php?vertical_id=1">
<?php

if ($lang == 'kg') {
    echo "Тесттен өтүү";
} else {
    echo "Начать тестирование";
}

?>


</a>


</div>



