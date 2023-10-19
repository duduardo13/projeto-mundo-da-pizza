class BarraNavCelular { //classe para organizar
    constructor(celularMenu, ListaNav, LinksNav, entrarNav, fecharNav) { // método constructor referencia as propriedades da classe
        this.celularMenu = document.querySelector(celularMenu); //Botão do menu
        this.ListaNav = document.querySelector(ListaNav); // lista de navegação (localização, cardápio etc)
        this.LinksNav = document.querySelectorAll(LinksNav); // Links dessa lista
        this.activeClass = "ativar"; //propriedade que será usada como ativação

        this.handleClick = this.handleClick.bind(this); //faz com que o 'this' se refira à classe em si e não ao botão
    }

   linksAnimados() { //metódo da animação
        this.LinksNav.forEach((link) => { //metódo forEach para falar com cada link individualmente
         link.style.animation //verifica se o link possui a propriedade animation, se não tiver ela será adicionar, mas se tiver ela então será removida
            ? (link.style.animation = "") //retorna 1 de 2 valores baseados em um 3°... se existir valores no animation então ele deletará e deixará vazio
            : (link.style.animation = 'opacidadeLinks 0.6s ease forwards 0.3s'); //se não existir, ele adicionará
        });
    }


    handleClick() {
        this.ListaNav.classList.toggle(this.activeClass); //adiciona a classe "ativar", metódo para ativar a lista lateral ao clicar no botão
        this.celularMenu.classList.toggle(this.activeClass);
        this.linksAnimados(); //chcmando o metódo para animar os links do menu (opacidade, slide)
    }

    addClickEvent() { //adiciona um evento ao clicar com o mouse
        this.celularMenu.addEventListener("click", this.handleClick); //evento para abrir o menu em si, pois se liga ao 'handleClick" onde é executado o processo que abre o menu lateral
    }

    init() { //função pra se existir o celularMenu no documento
        if (this.celularMenu) {
            this.addClickEvent();
        }
        return this;
    }
}

const mobileNavbar = new BarraNavCelular( //Finalmente criando a mobileNavBar usando a classe referenciando os seletores iguais ao do css
    ".menu-responsivo",
    ".itens-menu",
    ".itens-menu li",
);
mobileNavbar.init(); //iniciar