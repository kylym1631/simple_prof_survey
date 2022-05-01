<?php
session_start();
 require_once 'header.php';
 require_once 'dbConn.php';
$userId = getUserId();
echo "Hello! I am a results<br>";
function getUserId(){
   $userId =  pdo_connect_mysql()->prepare("select id from users where phone_number = ?");
   $userId->execute([$_SESSION['phone_number']]);
   $userId =$userId->fetchAll();
	return $userId[0]['id'];
}

//$userId = 126;

$pdo = pdo_connect_mysql();
$answers = $pdo->query('SELECT answer_value,horizontal_id,vertical_id FROM answers where user_id='.$userId);
$answers = $answers->fetchAll();

for ($i=0;$i<10;$i++){
    $vertical[$i]=0;
    $horizontal[$i]=0;
    foreach($answers as $key=>$value)
    {
        if ($value['answer_value'] == 1)
        {
            if ( $value['vertical_id'] == $i+1)
            {
                $vertical[$i]++;
            }


        }elseif ($value['answer_value'] == 2)
        {
            if ( $value['horizontal_id'] == $i+1)
            {
                $horizontal[$i]++;
            }
        }
    }
}

 echo $userId;
// echo "<br>";

// echo "<pre>";
// print_r($vertical);
// echo "</pre>";
// echo "<pre>";
// print_r($horizontal);
// echo "<pre>";
//die();


$resul = $vertical[0] + $horizontal[0];
$resul1 = $vertical[1] + $horizontal[1];
$resul2 = $vertical[2] + $horizontal[2];
$resul3 = $vertical[3] + $horizontal[3];
$resul4 = $vertical[4] + $horizontal[4];
$resul5 = $vertical[5] + $horizontal[5];
$resul6 = $vertical[6] + $horizontal[6];
$resul7 = $vertical[7] + $horizontal[7];
$resul8 = $vertical[8] + $horizontal[8];
$resul9 = $vertical[9] + $horizontal[9];
?>
<div class="container">
<?php
echo "этот раздел только для теста";
echo "<br>";
echo "М ";
echo $resul;
echo "/ Р";
echo $resul1;
echo "/ Х";
echo $resul2;
echo "/ Й";
echo $resul3;
echo "/ В";
echo $resul4;
echo "/ С";
echo $resul5;
echo "/ К";
echo $resul6;
echo "/ Т";
echo $resul7;
echo "/ П";
echo $resul8;
echo "/ А";
echo $resul9;
echo "<br>";

$userId;
$pdo = pdo_connect_mysql();

    $sql="INSERT into results
    (`user_id`, `m_1`, `r_2`, `h_3`, `y_4`, `v_5`, `c_6`, `k_7`, `t_8`, `p_9`, `a_10`)values($userId, $resul, $resul1, $resul2, $resul3, $resul4, $resul5, $resul6, $resul7, $resul8, $resul9)";

    // $ins_query = $pdo->query('INSERT into results
    // (`user_id`, `m_1`, `r_2`, `h_3`, `y_4`, `v_5`, `c_6`, `k_7`, `t_8`, `p_9`, `a_10`)values($userId, $resul, $resul1, $resul2, $resul3, $resul4, $resul5, $resul6, $resul7, $resul8, $resul9)');

if ($pdo->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . $pdo->error;
}
?>


</div>



<br><br><br>
 <?php require_once 'resul-from-db.php';?>

<!-- //when you're done with sessions, destroy it-->
<?php session_destroy();
 header('Location: index.php');
?>