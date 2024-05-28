const modal = document.querySelector('.modalContainer')

function openModal (){
    modal.classList.add('active')
    
}

function closeModal(){
    modal.classList.remove('active')
    
}

function exibirImagem(imagemBase64, nomeCampeao) {
    var imagemDataUrl = 'data:image/jpeg;base64,' + imagemBase64;

    // Exibir a imagem no container de imagem
    document.getElementById('nomeCampeao').innerText = nomeCampeao;
    document.getElementById('imagemCampeao').src = imagemDataUrl;
    document.getElementById('imagemContainer').style.display = 'block';
}

document.getElementById('imagem').addEventListener('change', function(event) {
    const imagemSelecionada = document.getElementById('imagemSelecionada');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            imagemSelecionada.src = e.target.result;
            imagemSelecionada.style.display = 'block'; // Mostra a imagem selecionada
        };
        
        reader.readAsDataURL(file);
    } else {
        imagemSelecionada.src = '#'; // Limpa a imagem selecionada se nenhum arquivo for escolhido
        imagemSelecionada.style.display = 'none'; // Esconde a imagem selecionada
    }
});