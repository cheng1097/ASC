<a href="#" class="btn btn-{{ $color ?? 'primary' }} btn-sm" data-bs-toggle="modal"
    data-bs-target="#act-con-{{ $name ?? '' }}-{{ $index ?? '' }}">
    {{ $click ?? 'Confirmer' }}
</a>


<!-- The Modal -->
<div class="modal fade" id="act-con-{{ $name ?? '' }}-{{ $index ?? '' }}">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body">
                {{ $message }}
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="{{ $route ?? '' }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
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
