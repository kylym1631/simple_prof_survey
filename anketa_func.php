<?php
session_start();

require_once 'dbConn.php';
$pdo = pdo_connect_mysql();

echo $_SESSION['name'];



if (isset($_POST) && count($_POST)!=100 ) {
    require_once 'anketa.php';
}else{
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    die();

    // Insert new record into the "users" table
      $stmt = $pdo->prepare('INSERT INTO users(name, phone_number, age, gender, oblast, gorod_rayon, lang) VALUES (?,?,?,?,?,?,?)');
//from form --->name phone_number age gender oblast gorod_rayon

    $stmt->execute([$_SESSION['name'], $_SESSION['phone_number'], $_SESSION['age'], $_SESSION['gender'], $_SESSION['oblast'], $_SESSION['gorod_rayon'], $_SESSION['lang']]);



    $userId = getUserId();
    $horizontalId = 0;
    foreach($_POST as $pollId=>$answerValue)
    {
        $pollId =  substr($pollId, 5);
        $verticalId = ceil($pollId / 10);
        $horizontalId++;
        if ($horizontalId > 10){
            $horizontalId = 1;
        }

        $stmt = $pdo->prepare('insert into answers(user_id,poll_id,answer_value,horizontal_id,vertical_id) VALUES(?,?,?,?,?)');
        $stmt->execute([$userId,$pollId, $answerValue,$horizontalId,$verticalId]);
    }

    echo "<br>ФОРМА ОТПРАВЛЕНО";
    header( "refresh:2;url=results.php" );
}

function getUserId(){
    $userId =  pdo_connect_mysql()->prepare("select id from users where phone_number = ?");
    $userId->execute([$_SESSION['phone_number']]);
    $userId =$userId->fetchAll();
    return $userId[0]['id'];
}
