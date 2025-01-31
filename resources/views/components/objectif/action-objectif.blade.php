<a href="#" class="text-secondary me-2 ms-5" data-bs-toggle="modal"
data-bs-target="#edit{{ $enqueteur->id }}_{{ $index }}">
<i class="ri-edit-2-line" title="Modifier"></i>
</a>

@include('components.delete', [
'route' => route('objectifs.destroy', $objectif->id),
'index' => $index,
'methode' => 'DELETE',
])


<!-- Modal de modification -->
<div class="modal fade" id="edit{{ $enqueteur->id }}_{{ $index }}" tabindex="-1">
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modifier un Objectif</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Fermer"></button>
        </div>

        <div class="modal-body">
            @include('components.objectif.form-objectif', [
                'ouvrages' => value_select(
                    $ouvrages,
                    'id',
                    'libelle',
                    $objectif->ouvrage->id),
                'enqueteurs' => value_select(
                    $enqueteurs,
                    'id',
                    'nom',
                    $objectif->id_enqueteur),
                'formAction' => route('objectifs.update', $objectif),
                'objectif' => $objectif->objectif,
                'methode' => 'PUT',
            ])
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger"
                data-bs-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>
</div>