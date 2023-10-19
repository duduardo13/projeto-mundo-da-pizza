//código pertencente a ByCoding Artist extraído do site https://www.codingartistweb.com, contendo modificações na tradução de classes para melhor compreensão 
let alternar = document.getElementsByClassName('alternar');
let conteudoDiv = document.getElementsByClassName('conteudo');
let icons = document.getElementsByClassName('icon');

for(let i=0; i<alternar.length; i++){
    alternar[i].addEventListener('click', ()=>{
        if( parseInt(conteudoDiv[i].style.height) != conteudoDiv[i].scrollHeight){
            conteudoDiv[i].style.height = conteudoDiv[i].scrollHeight + "px";
            alternar[i].style.color = "#ffaa3b";
            icons[i].classList.remove('fa-plus');
            icons[i].classList.add('fa-minus');
        }
        else{
            conteudoDiv[i].style.height = "0px";
            alternar[i].style.color = "#111130";
            icons[i].classList.remove('fa-minus');
            icons[i].classList.add('fa-plus');
        }

        for(let j=0; j<conteudoDiv.length; j++){
            if(j!==i){
                conteudoDiv[j].style.height = "0px";
                alternar[j].style.color = "#111130";
                icons[j].classList.remove('fa-minus');
                icons[j].classList.add('fa-plus');
            }
        }
    });
}