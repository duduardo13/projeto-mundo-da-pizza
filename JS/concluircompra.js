
const carrinhoSalvo = window.localStorage.getItem('cart')
if (carrinhoSalvo) {
  const carrinhoRecuperado = JSON.parse(carrinhoSalvo)
   
  //console.log(carrinhoRecuperado)

    carrinhoRecuperado.map((pedido, indice) => {
  

      console.log(pedido)

      let pedidoItem = document.querySelector('.modelo .pedido-item').cloneNode(true)

      //console.log(pedidoItem)
        document.querySelector('.pedido-area').append(pedidoItem)

        //preencher pedido
        
        pedidoItem.querySelector('#produto').value = pedido.name
        pedidoItem.querySelector('#quantidade').value = `× ${pedido.qt}`
        pedidoItem.querySelector('#preco').value = `R$ ${pedido.price.toFixed(2)}`
        pedidoItem.querySelector('#id').value = pedido.id

    })



  }

const urlParams= new URLSearchParams(window.location.search);

// console.log(urlParams);

const totalvalor = urlParams.get('minhaVariavel')

// console.log(totalvalor)

var totalvalue = parseFloat(totalvalor)

const preenchetotal = document.querySelector('#total-pagar');
    preenchetotal.value = `R$ ${totalvalue.toFixed(2)}`

    console.log(totalvalor)


    jQuery.post('../concluircompra.php', {
      'carrinho': JSON.stringify(localStorage.getItem('cart'))
  });