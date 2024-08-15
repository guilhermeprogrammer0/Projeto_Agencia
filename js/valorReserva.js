let valor_tela = document.getElementById("valor_tela");
let qtd_passa = document.getElementById("qtd_passa");
function mudarValor(preco){
     const mult = preco *  Number(qtd_passa.value);
     valor_tela.innerHTML = mult.toLocaleString('pt-BR', {
style: 'currency',
currency: 'BRL'
});;
    }