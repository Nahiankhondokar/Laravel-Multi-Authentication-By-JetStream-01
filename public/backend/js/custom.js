$(document).ready(function(){

    // img preview system
    $('#inputTag').change(function(e){
        let reader = new FileReader();
        reader.onload = function(e){
            $('#imgPriview').attr('src', e.target.result);
        }

        reader.readAsDataURL(e.target.files[0]);
    });

});