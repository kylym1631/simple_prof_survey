
<script type="text/javascript">
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
            .append('<option value=""> --------- </option>');

        $.each(filterData, function (index, value) {
            // Now, fill the second dropdown list with bird names.
            $('#sel1').append('<option value="' + value.ID + '">' + value.Name + '</option>');
        });
        
    });
  });
    
</script>