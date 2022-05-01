
<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<!doctype html>
<html>
    <head>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        
<?php
//$sql = "SELECT id, name FROM users";
//$result = mysqli_query($con, $sql);

$sql = "SELECT users.id, users.name, users.phone_number, users.age, users.gender, users.oblast, users.gorod_rayon, results.created_at results.m_1, results.r_2, results.h_3, results.y_4, results.v_5, results.c_6, results.k_7, results.t_8, results.p_9, results.a_10\n"
    . "FROM users, results\n"
    . "WHERE users.id = results.user_id";

$result = mysqli_query($con, $sql)
?>
<div class="container">

    <h4>Homepage</h4>
        <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
        
<table class="table table-bordered mt-2 fload">
  <thead>
    <tr>
      <th>#</th>
      <th>ФИО</th>
      <th>Тел.но.</th>
      <th>Возрасть</th>
      <th>Пол</th>
      <th>Область</th>
      <th>Город</th>
      <th>Дата уч.</th>
      <th>М</th>
      <th>Р</th>
      <th>Х</th>
      <th>Й</th>
      <th>В</th>
      <th>С</th>
      <th>К</th>
      <th>Т</th>
      <th>П</th>
      <th>А</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

   <?php //foreach ($result as $results) {  ?>
    <?php //while ($row = mysql_fetch_assoc($result)) {
if (is_array($result) || is_object($results))
{
    foreach ($results as $result)
    {
      ?>
    

    <tr>
      <td><?php echo $results["users.id"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["phone_number"]; ?></td>
      <td><?php echo $row["age"]; ?></td>
      <td><?php echo $row["gender"]; ?></td>
      <td><?php echo $row["oblast"]; ?></td>
      <td><?php echo $row["gorod_rayon"]; ?></td>
      <td><?php echo $row["created_at"]; ?></td>
      <th><?php echo $row["m_1"]; ?></th>
      <th><?php echo $row["r_2"]; ?></th>
      <th><?php echo $row["h_3"]; ?></th>
      <th><?php echo $row["y_4"]; ?></th>
      <th><?php echo $row["v_5"]; ?></th>
      <th><?php echo $row["c_6"]; ?></th>
      <th><?php echo $row["k_7"]; ?></th>
      <th><?php echo $row["t_8"]; ?></th>
      <th><?php echo $row["p_9"]; ?></th>
      <th><?php echo $row["a_10"]; ?></th>
      <th><a href="delete_users.php?id=<?php echo $row["id"]; ?>">Delete</a></th>
      
    </tr>
  <?php
 }
}
//mysql_free_result($result);
mysqli_close($con);
?>
  </tbody>
</table>

</div>
    </body>
</html>