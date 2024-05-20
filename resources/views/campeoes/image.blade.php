<div class="modalContainer">
    <div class="modal" id = "imagemContainer">
        <h2 id="nomeCampeao"></h2>
        <hr />
        <span>
            <img id= "imagemCampeao" src="data:image/jpeg;base64,{{ base64_encode($registro->imagem) }}" alt="Imagem">
        </span>
        <hr />
        <div class="btns">
            <button class="btnClose" onclick="closeModal()">Close</button>
        </div>
    </div>
</div>