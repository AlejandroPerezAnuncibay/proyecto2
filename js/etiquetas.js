var botones = $('.labels').toArray()
for (x=0;x<botones.length;x++){
    botones[x].addEventListener("click",meterEtiqueta)
}
function meterEtiqueta(){
    var a = event.target.value;
    let caja = $(':input#tags');
    caja.val(a);
}