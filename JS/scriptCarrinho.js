// Código extraído do Curso de JS Aula 01 Pizzaria da Nonna com professor Edson Maia no youtube,
// contendo modificações na lógica com fins de adaptar para nosso projeto.
//segue o link da primeira aula: https://youtu.be/Sv2Qcj-9pjI


//Variável global para controlar o modal de cada pizza individualmente

let modalKey = 0

//Variável para controlar a quantidade inicial de pizzas no modal

let quantPizzas = 1

 cart = Array() //carrinho


//funções auxiliares ou uteis

const seleciona = (elemento) => document.querySelector(elemento)
const selecionatodos = (elemento) => document.querySelectorAll(elemento)

const formatoReal = (valor) => {
    return valor.toLocalString('pt-BR', {style: 'currency', currency: 'BRL'})
}

const formatoMonetario = (valor) => {
    if(valor){
        return valor.toFixed(2)
    }
}

const abrirModal = () => {
// document.querySelector('.pizzaWindowArea') .style.display = 'flex'
    seleciona('.pizzaWindowArea') .style.display = 'flex'
    seleciona('.pizzaWindowArea') .style.opacity = 0
        setTimeout(() => seleciona('.pizzaWindowArea').style.opacity = 1, 150)
    }
    
const fecharModal = () => {
    seleciona('.pizzaWindowArea').style.opacity = 0
    setTimeout(() => seleciona('.pizzaWindowArea').style.display = 'none', 500)
}

const botaofechar = (item) => {
    //botao fechar modal
        
    // document.querySelector('.pizzaInfo--cancelButton').addEventListener('click', () =>{
    //     document.querySelector('.pizzaWindowArea') .style.display = 'none'
    // })

    seleciona('.pizzaInfo--cancelButton').addEventListener('click', fecharModal)
    
}

const preencheDadosDasPizzas =(pizzaItem, item, index) =>{
    //Setar um atributo para indentificar qual elemento foi clicado
    pizzaItem.setAttribute('data-key', index)
    pizzaItem.querySelector('.pizza-item--img img').src = item.img
    pizzaItem.querySelector('.pizza-item--price').innerHTML =`R$ ${item.price.toFixed(2)}`
    pizzaItem.querySelector('.pizza-item--name').innerHTML = item.name
    pizzaItem.querySelector('.pizza-item--desc').innerHTML = item.description
}


const preencheDadosModal = (item) =>{
    // document.querySelector('.pizzaBig img').src = item.img
    // document.querySelector('.pizzaInfo h1').innerHTML = item.name
    // document.querySelector('.pizzaInfo--desc').innerHTML = item.description
    // document.querySelector('.pizzaInfo--actualPrice').innerHTML = `R$ ${item.price.toFixed(2)}`

    seleciona('.pizzaBig img').src = item.img
    seleciona('.pizzaInfo h1').innerHTML = item.name
    seleciona('.pizzaInfo--desc').innerHTML = item.description
    seleciona('.pizzaInfo--actualPrice').innerHTML = item.price
}

const pegarKey = (e) => {
    //.closest retorna o elemento mais próximo que tem a class que passamos
    //do .pizza-item ele vai pegar o valor do atributo data-key
    let key = e.target.closest('.pizza-item').getAttribute('data-key')
   // console.log('Pizza clicada ' + key)
   // console.log(pizzaJson[key])


    //Para que sempre a quantidade inicial de pizzas seja 1
    quantPizzas = 1

    //Para manter a informação de quais foram clicadas
    modalKey = key

    return key
}

const mudarQuantidade = () => {
    // Ações nos botões + e - da janela modal
    seleciona('.pizzaInfo--qtmais').addEventListener('click', () => {
        quantPizzas++
        seleciona('.pizzaInfo--qt').innerHTML = quantPizzas
    })

    seleciona('.pizzaInfo--qtmenos').addEventListener('click', () => {
        if(quantPizzas > 1) {
            quantPizzas--
            seleciona('.pizzaInfo--qt').innerHTML = quantPizzas	
        }
    })
}

const adicionarNoCarrinho = () => {
    seleciona('.pizzaInfo--addButton').addEventListener('click', () => {
     //   console.log('Adicionar no carrinho')

        // pegar dados da janela modal atual
    	// qual pizza? pegue o modalKey para usar pizzaJson[modalKey]
    	//console.log("Pizza " + modalKey)
        
	    // quantidade
    //	console.log("Quant. " + quantPizzas)

        // preco
        let price = seleciona('.pizzaInfo--actualPrice').innerHTML.replace('R$&nbsp;', '')
      //  console.log("preço" + price)

        //identificador para o id
        let identificador = pizzaJson[modalKey].id
       // console.log("iden" + identificador)

        //adicionar a quantidade
        let key = cart.findIndex( (item) => item.identificador == identificador )
       // console.log("chave" + key)

            if(key > -1){
                //se encontrar aumente a quantidade
                cart[key].qt += quantPizzas
              //  console.log[cart]
            }else{
                //adiciona objeto pizza ao carrinho
                let pizza ={
                    identificador,
                    id: pizzaJson[modalKey].id,
                    name: pizzaJson[modalKey].name,
                    qt: quantPizzas,
                    price: parseFloat(price)
                }

                cart.push(pizza)
               // console.log(pizza)
               // console.log(cart)
               // console.log('Sub total R$ ' + (pizza.qt * pizza.price).toFixed(2))
            }
            
      


            fecharModal()
            abrirCarrinho()
            atualizarCarrinho()

            // const carrinhoPedido = cart.map(function(pedido, iden){
            //     return{
            //         pedidos: pedido.name + ' x' +
            //         pedido.qt + ' R$ ' +
            //          pedido.price
            //      }
            //  });
             
            // //  alert(carrinhoPedido);
            //  console.log(carrinhoPedido)


    })
         

          
}

const abrirCarrinho = () => {
//console.log('Qtd de itens no carrinho ' + cart.length)

    if(cart.length > 0){
        //mostrar carrinho
        seleciona('aside').classList.add('show')
        seleciona('header').style.display = 'flex'
    }

    //exibir aside do carrinhoo no modo mobile
    seleciona('.menu-openner').addEventListener('click', () => { 
        if(cart.length > 0) {
            seleciona('aside').classList.add('show');
            seleciona('aside').style.left = '0';
        }
    })
}

const fecharCarrinho = () =>{
    //fechar carrinho com o X no modo mobile
    seleciona('.menu-closer').addEventListener('click', () => {
        seleciona('aside').style.left = '100vw' //usando vw ele fica fora da tela
        seleciona('header').style.display = 'flex'
    })
}

        
		let total    = 0
        
const atualizarCarrinho = () => {
    // exibir número de itens no carrinho
	seleciona('.menu-openner span').innerHTML = cart.length
	
	// mostrar ou nao o carrinho
	if(cart.length > 0) {

		// mostrar o carrinho
		seleciona('aside').classList.add('show')

		// zerar meu .cart para nao fazer insercoes duplicadas
		seleciona('.cart').innerHTML = ''

        // crie as variaveis antes do for
		
        let subtotal = 0
		let desconto = 0
        
        // para preencher os itens do carrinho, calcular subtotal
		for(let i in cart) {
			// use o find para pegar o item por id
			let pizzaItem = pizzaJson.find( (item) => item.id == cart[i].id )
			// console.log(pizzaItem)

            // em cada item pegar o subtotal
        	subtotal += cart[i].price * cart[i].qt
         //   console.log(cart[i].price)
            

			// fazer o clone, exibir na telas e depois preencher as informacoes
			let cartItem = seleciona('.models .cart--item').cloneNode(true)
			seleciona('.cart').append(cartItem)


			let pizzaName = `${pizzaItem.name}`

			// preencher as informacoes
			cartItem.querySelector('img').src = pizzaItem.img
			cartItem.querySelector('.cart--item-nome').innerHTML = pizzaName
			cartItem.querySelector('.cart--item--qt').innerHTML = cart[i].qt

			// selecionar botoes + e -
			cartItem.querySelector('.cart--item-qtmais').addEventListener('click', () => {
			//	console.log('Clicou no botão mais')
				// adicionar apenas a quantidade que esta neste contexto
				cart[i].qt++
				// atualizar a quantidade
				atualizarCarrinho()
			})

			cartItem.querySelector('.cart--item-qtmenos').addEventListener('click', () => {
			//	console.log('Clicou no botão menos')
				if(cart[i].qt > 1) {
					// subtrair apenas a quantidade que esta neste contexto
					cart[i].qt--
				} else {
					// remover se for zero
					cart.splice(i, 1)
				}

                (cart.length < 1) ? seleciona('header').style.display = 'flex' : ''

				// atualizar a quantidade
				atualizarCarrinho()
			})

			seleciona('.cart').append(cartItem)

		} //fim do for
        
        //fora do for
        //calcule desconto 10% e total
        //desconto = subtotal * 0.1

        desconto = subtotal * 0
        total = subtotal -  desconto

        //exibir na tela os resultados
        //selecionar o ultimospan do elemneto

        seleciona('.subtotal span:last-child').innerHTML = `R$ ${subtotal.toFixed(2)}`
        seleciona('.desconto span:last-child').innerHTML = `R$ ${desconto.toFixed(2)}`
        seleciona('.total span:last-child').innerHTML = `R$ ${total.toFixed(2)}`

   
        




    }else{
        //ocultar o carrinho
        seleciona('aside').classList.remove('show')
        seleciona('aside').style.left = '100vw'
    }       





    carrinho = cart
     //console.log(carrinho)

    // carrinho = cart.map(function(pedido){
    //     return{
    //               pedido: pedido.name + ' x' +
    //          pedido.qt + ' R$ ' +
    //                   pedido.price
    //               }
    //        });
             
   
             // console.log(carrinho)

           console.log(cart)

    

 window.localStorage.setItem('cart', JSON.stringify(cart))


    
}


const finalizarCompra = () => {
    seleciona('.cart--finalizar').addEventListener('click', () =>{
        seleciona('aside').classList.remove('show')
        seleciona('aside').style.left = '100vw'
        seleciona('aside').style.display = 'flex'

        
       console.log(cart)

        var passaValor= function(valor)
{
window.location = "concluircompra.php?minhaVariavel="+valor;
}


 passa = total;

 passaValor(passa);

//console.log(total)
    
    })
}

 

//------------------------------------------------------------------------------------------------------------------------------------------------------------------




pizzaJson.forEach((item, index) => {

    let pizzaItem = document.querySelector('.models .pizza-item').cloneNode(true)

      for(let x = item.type; x == "salgada"; x = x + 1){  //document.querySelector('.pizza-area').append(pizzaItem)
        seleciona('.pizza-area').append(pizzaItem)

        //Colocar os dados de cada pizza
        
        preencheDadosDasPizzas(pizzaItem, item, index)

        //Quando Clicarem na pizza

        pizzaItem.querySelector('.pizza-item a').addEventListener('click', (e) =>{
             e.preventDefault()

             let chave = pegarKey(e)
             //Abrir o modal
            
            abrirModal()

             //preencher os campos do modal
            
            preencheDadosModal(item)

            //definindo a quantidade inicial como 1
            seleciona('.pizzaInfo--qt').innerHTML = quantPizzas

        })
    }

    
    for(let o = item.type; o == "doce"; o = o + 1){  //document.querySelector('.pizza-area').append(pizzaItem)
        seleciona('.pizza-area-doce').append(pizzaItem)

        //Colocar os dados de cada pizza
        
        preencheDadosDasPizzas(pizzaItem, item, index)

        //Quando Clicarem na pizza

        pizzaItem.querySelector('.pizza-item a').addEventListener('click', (e) =>{
             e.preventDefault()

             let chave = pegarKey(e)
             //Abrir o modal
            
            abrirModal()

             //preencher os campos do modal
            
            preencheDadosModal(item)

            //definindo a quantidade inicial como 1
            seleciona('.pizzaInfo--qt').innerHTML = quantPizzas

        })
    }
    
      
    for(let u = item.type; u == "especial"; u = u + 1){  //document.querySelector('.pizza-area').append(pizzaItem)
        seleciona('.pizza-area-especial').append(pizzaItem)

        //Colocar os dados de cada pizza
        
        preencheDadosDasPizzas(pizzaItem, item, index)

        //Quando Clicarem na pizza

        pizzaItem.querySelector('.pizza-item a').addEventListener('click', (e) =>{
             e.preventDefault()

             let chave = pegarKey(e)
             //Abrir o modal
            
            abrirModal()

             //preencher os campos do modal
            
            preencheDadosModal(item)

            //definindo a quantidade inicial como 1
            seleciona('.pizzaInfo--qt').innerHTML = quantPizzas

        })
    }
    
    

        botaofechar()

})
    



//mudar a quantidade nos botões + e -

mudarQuantidade()
adicionarNoCarrinho()
atualizarCarrinho()
fecharCarrinho()
finalizarCompra()
