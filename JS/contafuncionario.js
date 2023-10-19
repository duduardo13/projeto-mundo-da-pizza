const lista = document.querySelectorAll('.lista');
function activeLink(){
    lista.forEach((item) =>
    item.classList.remove('ativo'));
    this.classList.add('ativo');
}
    lista.forEach((item) =>
    item.addEventListener('click', activeLink));