<?php
    //include and initialize Poll class 
    require_once 'header.php';
    require_once 'dbConn.php';


session_start();

// connect to the database
$pdo = pdo_connect_mysql();
$msg = '';

// if (!empty($_POST)) {z

$poll_id = isset($_POST['poll_id']) ? $_POST['poll_id'] : '';
$title_1 = isset($_POST['title_1']) ? $_POST['title_1'] : '';
$title_2 = isset($_POST['title_2']) ? $_POST['title_2'] : '';
$title_3 = isset($_POST['title_3']) ? $_POST['title_3'] : '';
$title_4 = isset($_POST['title_4']) ? $_POST['title_4'] : '';     
$title_5 = isset($_POST['title_5']) ? $_POST['title_5'] : '';
$title_6 = isset($_POST['title_6']) ? $_POST['title_6'] : '';
$title_7 = isset($_POST['title_7']) ? $_POST['title_7'] : '';
$title_8 = isset($_POST['title_8']) ? $_POST['title_8'] : '';
$title_9 = isset($_POST['title_9']) ? $_POST['title_9'] : '';
$title_10 = isset($_POST['title_10']) ? $_POST['title_10'] : '';


//     // Insert new record into the "polls" table
//     $stmt = $pdo->prepare('INSERT INTO answers VALUES (NULL, ?, ?)');

//      $sql = "INSERT INTO answers (poll_id, title)
// VALUES ('$poll_id ', '$title_1')";
//     // $stmt->execute([$poll_id,  $title_1]);
    

//       //Output message to the user 

//      $msg = ' saved successfully!';
	
// }

print ("poll_id: " . $_POST['poll_id'] . ".<br>\n");
print ("title_1: " . $_POST['title_2'] . ".<br>\n");


?>
<?php if ($msg): ?>
        <p><?=$msg?></p>
    <?php endif; 




    echo $_COOKIE['Test'];
        echo $_POST['title_1'];
    ?>

    <a href ="anketa.php?vertical_id=1">начать тест</a>