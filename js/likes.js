$(document).ready(function () {
    likesPreguntas();
});
function likesPreguntas(){
    $(".like").click(function() {
        $.ajax({
            type: "post",
            url: "../php/ajax.php",
            data: {action: "likePregunta", pregunta: $(".like").attr("id")},
            success: function (response) {
                alert(response)
            }
        });
        
    });
}