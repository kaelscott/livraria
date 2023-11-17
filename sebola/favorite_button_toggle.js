// Primeiro, obtenha o botão pelo seu ID ou classe
var botao = document.querySelector('.favButton');
// Em seguida, adicione um ouvinte de evento 'click' ao botão
botao.addEventListener('click', function() {
    // Dentro do manipulador de eventos, use 'classList.toggle' para alternar a classe
    this.classList.toggle('btn-danger');
    this.classList.toggle('btn-outline-danger');
});
