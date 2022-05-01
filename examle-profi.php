
    
<?php
$pdo = pdo_connect_mysql();
$result = $pdo->query("SELECT id, name, variable_new FROM profesional LIMIT 10");
?>
sss
  <?php foreach ($result as $results) {
  echo " <br>";
?>

    <?php //echo $results["variable_new"]; ?>  
<?php
//if (9<$results['variable_new'] ){
 ?>

<div>
    <p>Вы набрали $resul_<?php echo $results["id"]; ?> баллов</p>
<p>
<?php
if (15 > $resul_$results["id"]) {
    //if (15 > $resul1 ) {
    echo "Подходящие вам профессии: ";
} elseif ($resul_$results["id"] >15){
    echo "Наиболее подходящие вам профессии: ";
  }
?>
</p>
<?php echo $results["id"]; ?></p> 
<p> <?php echo $results["name"]; ?></p> 

</div>    
<?php }
?>


