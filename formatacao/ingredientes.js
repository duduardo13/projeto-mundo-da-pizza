function Ingredientes (){
    var pontos=document.getElementById("pontos");
    var maisTexto=document.getElementById("mais");
    var btnIngredientes=document.getElementById("btnIngredientes");

    if(pontos.style.display === "none"){
        pontos.style.display="inline";
        maisTexto.style.display="none";
        btnIngredientes.innerHTML="Clique para ver os ingredientes:";
   }
    else{
        pontos.style.display="none";
        maisTexto.style.display="inline";
        btnIngredientes.innerHTML="Clique para ocultar os ingredientes:";
    }
}