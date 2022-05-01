<?php
if (!isset($_SESSION['phone_number'])){
    session_start();
    echo $_SESSION['name'];
}
  require_once 'header.php';
  require_once 'dbConn.php';
// connect to the database
$pdo = pdo_connect_mysql();



$pollAnswers = $pdo->query('select * from poll_answers')->fetchAll();
if (!empty($_POST)){

    foreach ($_POST as $k => $v){
        foreach ($pollAnswers as $kp => $vp){
            if(substr($k,5) == $vp['poll_id']){
                unset($pollAnswers[$kp]);
            }
        }

    }
}
$verticalId = array();
foreach ($pollAnswers as $h) {
    $verticalId[] = $h['vertical_id'];
}
$verticalId= array_unique($verticalId);
$pollData = $_POST;
$pollAnswers = array_chunk($pollAnswers,10,true);
?>
<div class="container">
    <h4>Выберите профессию</h4>

   
<!-- <img src="img/--><?php //echo "$verticalId[0]";?><!--.png" alt="Girl in a jacket" width="400" height=""> -->
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div id="progress"><span></span>% сделано</div>
    <?php
    if (!empty($_POST))
    {
        echo '<p class="text-danger">Пожалуйста Ответьте на все вопросы</p>';

    }
    $questionNumbers=0;
    ?>
<form action="anketa_func.php" method="post"class=" my-5" id="form_calc" >
    <?php
    if (!empty($_POST))
    {
        foreach ($_POST as $a => $b) {
            echo '<input type="hidden" name="' . htmlentities($a) . '" value="' . htmlentities($b) . '">';
        }
    }
    ?>
    <div class="questions" >
        <?php foreach($pollAnswers as $kp =>$vp) :?>
            <?php
            echo "<div>";
            foreach ($vp as $kq=>$vq) :?>
                <?php $questionNumbers++;?>




                    <div style="" class="bg-light p-1 my-2 rounded">

<table style="margin: 5px 0 0 5px ;"><tr><td>
     <?php print $vq['poll_id']. "\n"; ?>

 </td><td>
                         <input type="radio"   progress="1" id="poll_<?php print $vq['poll_id']; ?>_a" name="poll_<?php print $vq['poll_id']; ?>" value="1">
                        <label style="cursor: pointer" for="poll_<?php print $vq['poll_id']; ?>_a"><?php print $vq['option_1']. "\n"; ?></label>
          </td></tr><tr><td></td><td>

                        <input type="radio" progress="1" id="poll_<?php print $vq['poll_id']; ?>_b" name="poll_<?php print $vq['poll_id']; ?>"  value="2" >
                        <label style="cursor: pointer" for="poll_<?php print $vq['poll_id']; ?>_b"><?php print $vq['option_2']. "\n"; ?></label>
                    </td></tr>
</table>
                        <br>

                    </div>
            <?php endforeach;

        echo "<br>
            </div>";
            endforeach; ?>

    </div>
    <div class="container">
    <button type="button" style="float: left;" class="prev float-left">Предыдущие</button>
    <button type="button" style="float: right" class="next float-right" id="next-button" class=" btn-primary">Следующие</button>
    <br>
    <input style="display: none ;margin: auto;"   type="submit"  class="button btn-choose btn-primary" value="Отправить форму">
        <?php
         if (count($pollAnswers) <=1){
            echo ' <input style="margin: auto;"   type="submit"  class="button btn-choose btn-primary" value="Отправить форму">';

         }
        ?>
</div>
  </form>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.js"></script>
<script>
    $('.questions').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows:true,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        infinite:false,

    });


    $(this).on('afterChange', function(event, slick, currentSlide) {
        console.log(slick, currentSlide);
        if (slick.$slides.length-1 == currentSlide) {
            $(".btn-choose").css("display", "block");

        }
    })

    jQuery(document).ready(function ($) {

        $("#form_calc").change(function() {

            progressShow();

        });

    });

    function progressShow()
    {
        var totalProgress   = <?php
            if (!empty($_POST)) {
                echo 100-$questionNumbers;
            }else{
                echo 0;
            }
            ?>,
            values       = [];

        $('input[type=radio]').each( function() {
            if( $(this).is(':checked') ) {
                values.push($(this).attr('progress'));
                totalProgress += parseInt($(this).attr('progress'));
            }
        });

        $("#progress span").text(totalProgress);
        $(".progress-bar").width(totalProgress+'%');
    }
    progressShow();


</script>
 
