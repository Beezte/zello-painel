document.addEventListener('DOMContentLoaded', function() {
    // Adiciona um ouvinte de evento ao texto
    document.getElementById('recuperarSenha').addEventListener('click', function() {
        // Ativa o modal
        var myModal = new bootstrap.Modal(document.getElementById('modalRecuperar'));
        myModal.show();
    });
});