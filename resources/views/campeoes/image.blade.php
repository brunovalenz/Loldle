<div class="modalContainer">
    <div class="modal" id = "imagemContainer">
        
        <h2 id="nomeCampeao"></h2>
        <span>
            <img id= "imagemCampeao" src="data:image/jpeg;base64,{{ base64_encode($registro->imagem) }}" alt="Imagem">
        </span>
        
            <button class="btnClose" onclick="closeModal()">Close</button>
        
    </div>
</div>