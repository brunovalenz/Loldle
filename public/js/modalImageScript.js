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
