<!DOCTYPE html>
<html>
<head>
    <title>jQuery cascading SELECT dropdown list using JSON data</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
    
    <style>
    	p, select {font: 18px Calibri;}
    </style>
</head>
<body>
	<h2>
    	Select a value from the first dropdown list to populate the second dropdown list.
    </h2>
    <p>
        Bird Type: <select id='sel'>
            <option value=''>-- scsa --</option>
        </select>
    </p>
    
    <p>
        Bird Name: <select id='sel1'>
            <option value=''>-- Select --</option>
        </select>
    </p>
</body>

<script>
    $(document).ready(function () {

    let arrData = [];
    
  	// Fill the first dropdown with data.
    $.getJSON('birds.json', function (data) {

    
        let arr_bird_type = [];

        $.each(data, function (index, value) {
            arr_bird_type.push(value.Type);
            arrData = data;
        });

        // Remove duplicates. We want unique bird types.
        arr_bird_type = Array.from(new Set (arr_bird_type));
        
        // ref (https://www.encodedna.com/javascript/remove-duplicates-in-javascript-array-using-es6-set-and-from.htm)

        $.each(arr_bird_type, function (index, value) {
            // Fill the first dropdown with unique bird types.
            $('#sel').append('<option value="' + value + '">' + value + '</option>');
        });
                
    });
    
    $('#sel').change(function () {
        let type = this.options[this.selectedIndex].value;

        let filterData = arrData.filter(function(value) {
            return value.Type === type;
        });

        $('#sel1')
            .empty()
            .append('<option value=""> -- Select Bird -- </option>');

        $.each(filterData, function (index, value) {
            // Now, fill the second dropdown list with bird names.
            $('#sel1').append('<option value="' + value.ID + '">' + value.Name + '</option>');
        });
        
    });
  });
</script>
</html>