
    var botonesLike = $(".like");
    for (x = 0; x<botonesLike.length;x++){
        botonesLike[x].addEventListener("click",likesPreguntas);
    }

function likesPreguntas(){
        //i es el numero del boton de like de cada pregunta
        var i = event.target;
       // var idPregunta = $(".like").eq(i).attr("id");
        alert($(".like").eq(i).attr("id"));
        $.ajax({
            type: "post",
            url: "../php/ajax.php",
            data: {action: "likePregunta", pregunta: idPregunta},
            success: function (response) {
                //obtengo el numero de likes de la pregunta
                var numLikes = parseInt($("#contLikes"+idPregunta).text());
                //response = 1 le ha dado like, response = 0 le ha quitado el like
                if (response==1){
                    $("#like"+idPregunta).css("color", "red");
                    $("#contLikes"+idPregunta).empty();
                    $("#contLikes"+idPregunta).append(numLikes+1);
                } else {
                    $("#like"+idPregunta).css("color", "black");
                    $("#contLikes"+idPregunta).empty();
                    $("#contLikes"+idPregunta).append(numLikes-1);
                }
            }
        });
        
}