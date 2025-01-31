<a href="#" data-bs-toggle="modal" data-bs-target="#supModal{{ $index }}">
    <i class="ri-delete-bin-6-line text-danger" title="suprimer">
    </i>
</a>


<!-- The Modal -->
<div class="modal fade" id="supModal{{ $index ?? '' }}">
    <div class="modal-dialog modal-xm modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cet élément ?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="{{$route ?? ''}}" method="post">
                    @csrf
                    @method($methode ?? 'POST')
                    <button type="submit" class="btn btn-primary"
                        data-bs-dismiss="modal">
                        Oui
                    </button>
                </form>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Non
                </button>
            </div>

        </div>
    </div>
</div>