function abrirModal(mn){
    let modal = document.getElementById(mn);

    if(typeof modal == 'undefined' || modal == null)
    
    return

    modal.style.display = 'block'
    document.body.style.overflow = 'hidden'

}

function fecharModal(mn){
    let modal = document.getElementById(mn);
    
    if(typeof modal == 'undefined' || modal == null)
    
    return

    modal.style.display = 'none'
    document.body.style.overflow = 'auto'
}