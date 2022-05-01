
<?php
    //include and initialize Poll class 

require_once 'header.php';
?>

<div class="container">
    <p>Тесттен мурда суроолорго толук жооп бериңиз (бардык аянтчалар сөзсүз түрдө толтурулшу керек.)</p>
    <form action="index_next.php" method="post" name="">
     <table>
    <input type="text" class="hidden" name="spam">
    <input type="text" class="hidden" name="lang" value="kg">
<tr>
<td>
    <label>АТЫ-ЖӨНҮ: </label></td><td>
    <input type="text" name="name" id="name" >
</td></tr>
<tr><td>
    
    <label>Телефон номери: </label></td><td>
    <input type="number" name="phone_number" id="phone_number" >

</td></tr>
<tr><td>
    
    <label>Жашы: </label></td><td>
    <select id="age" name="age">
    <option value="11-14">11-14</option>
    <option value="15-18">15-18</option>
    <option value="19-22">19-22</option>
    <option value="23-26">23-26</option>
    <option value="27-32">27-32</option>
    <option value="33-40">33-40</option>
    <option value="41-50">41-50</option>
    <option value="51 и выше">51 и выше</option>
    </select>
    
</td></tr>
<tr><td>
    </td><td></td></tr></tr>
<tr><td>
    
    <label>Жыныс:</label></td><td>
    <input type="radio" name="gender" id="woman" value="Жен." >
    <label for="woman">Аял</label>
     <input type="radio" name="gender" id="man" value="Муж." >
    <label for="man"> Эркек</label>
</td></tr>
<tr><td>
    <label>Облусу:</label>
</td><td>
    <select id='sel' name= "oblast">
            <option value=''>Област тандаңыз</option>
    </select>
</td></tr>
<tr><td>
    <label>Шаар же Район:</label>
</td><td>
    <select id='sel1' name= "gorod_rayon">
        <option value=''>Шаар же район тандаңыз</option>
    </select>
    
</td></tr>
<tr><td>
    </td><td>
 
    </td></tr></tr>
<tr><td>

    <input type="submit" name="Submit" class="button" >
</td></tr>

    </table>  
 
    </form>
</div>


<?php include 'oblast_js.php' ?>
