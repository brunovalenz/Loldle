<!-- Modal -->
<div class="modal fade modal-success modal-save" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$mensagem}}</h5>
                <!-- button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button -->
            </div>

            <form action="{{route($url, $id)}}" method="POST">
                @csrf
                @method($metodo)
                <div class="modal-body">
                    <p class="text-center">
                        Você tem certeza do que está fazendo?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-danger">Sim</button>
                </div>
            </form>


        </div>
    </div>
</div>