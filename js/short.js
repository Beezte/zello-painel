document.addEventListener('DOMContentLoaded', function () {
    const encurtarCopiarButton = document.getElementById('encurtarCopiarButton');

    if (encurtarCopiarButton) {
        encurtarCopiarButton.addEventListener('click', function (event) {
            event.preventDefault();

            const matriculashort = document.getElementById('matricula-short').value;
            const nomeshort = document.getElementById('nome-short').value;

            const urlInput = document.getElementById('url-destino').value;
            const customUrlInput = document.getElementById('url-custom').value;

            const apiUrl = 'http://localhost:5000/encurtar';

            // Construa o objeto de dados a ser enviado na requisição
            const data = {
                url: urlInput,
                custom_url: customUrlInput || undefined,  // Se customUrlInput estiver vazio, não inclua no objeto
                matricula: matriculashort,
                nome: nomeshort
            };

            // Faça a requisição POST para a API
            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.short_url) {
                        // Copia o link encurtado para a área de transferência
                        const tempInput = document.createElement('input');
                        tempInput.value = data.short_url;
                        document.body.appendChild(tempInput);
                        tempInput.select();
                        document.execCommand('copy');
                        document.body.removeChild(tempInput);
                        alert('Link copiado para a Área de Transferência!');
                    } else {
                        throw new Error('Resposta da API sem link encurtado');
                    }
                })
                .catch(error => {
                    if (error.message.includes('personalizado já existe')) {
                        alert('Link personalizado já existe. Escolha outro.');
                    } else {
                        console.error('Erro ao encurtar o link:', error);
                        alert('Erro ao encurtar o link. Por favor, tente novamente.');
                    }
                });
        });
    }
});


function copyToClipboard(text) {
    var tempInput = document.createElement("input");
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    alert("Link copiado para a área de transferência!");
}

// document.addEventListener("DOMContentLoaded", function() {
//     var copyButtons = document.querySelectorAll('.copy-button');
//
//     copyButtons.forEach(function(button) {
//         button.addEventListener('click', function() {
//             var linkToCopy = this.getAttribute('data-link');
//             copyToClipboard(linkToCopy);
//         });
//     });
// });






















// document.addEventListener('DOMContentLoaded', function () {
//     document.getElementById('encurtarForm').addEventListener('submit', function (event) {
//         event.preventDefault();
//
//         const urlInput = document.getElementById('url-destino').value;
//         const customUrlInput = document.getElementById('url-custom').value;
//
//         const apiUrl = 'http://localhost:5000/encurtar';
//
//         // Construa o objeto de dados a ser enviado na requisição
//         const data = {
//             url: urlInput,
//             custom_url: customUrlInput || undefined  // Se customUrlInput estiver vazio, não inclua no objeto
//         };
//
//         // Faça a requisição POST para a API
//         fetch(apiUrl, {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//             },
//             body: JSON.stringify(data),
//         })
//             .then(response => response.json())
//             .then(data => {
//                 const resultadoDiv = document.getElementById('resultado');
//                 resultadoDiv.innerHTML = `<p>Link encurtado: <a href="${data.short_url}" target="_blank">${data.short_url}</a></p>`;
//             })
//             .catch(error => {
//                 console.error('Erro ao encurtar o link:', error);
//                 const resultadoDiv = document.getElementById('resultado');
//                 resultadoDiv.innerHTML = '<p>Erro ao encurtar o link. Por favor, tente novamente.</p>';
//             });
//     });
// });
