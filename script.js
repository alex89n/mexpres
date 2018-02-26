function myFunction() {
    
    var start = $( "#start" ).val();
    var end = $( "#end" ).val();
    
    var dataString = 'start1=' + start + '&end1=' + end;// + '&date1=' + date;
    
    if (start == 0 && end == 0){
        alert("Molim vas odaberite polaznu i dolaznu stanicu");
    } else {
        // AJAX code to submit form.
        
        /* console.log("PERA MIKA LAZA");
        var ime = document.getElementById('end');
        console.log(ime.innerHTML);
        console.log(ime.attributes); */
        
        $.ajax({
        type: "POST",
        // url: "ajax.php",
        url: "database.php",
        data: dataString,
        cache: false,
        success: function(data) {
            $('#display').html(data);
        }
        
        });
    }
    
    return false;
}



