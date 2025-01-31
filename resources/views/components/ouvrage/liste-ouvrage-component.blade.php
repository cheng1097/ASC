<!-- Default Table -->
<table class="table table-hover datatable">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th>Categorie</th>
            <th>Ouvrage</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($typeOuvrages as $index => $typeOuvrage)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $typeOuvrage->categorie->libelle }}</td>
                <td>{{ $typeOuvrage->libelle }}</td>
                <td>
                    <a href="#" data-bs-toggle="modal" class="me-4" data-bs-target="#edit{{ $index }}">
                        <i class="ri-edit-2-line text-secondary" title="modifier une typeOuvrage">
                        </i>
                    </a>
                    <!-- The Modal -->
                    <div class="modal" id="edit{{ $index }}">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title">Modifier Type ouvrage</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    @include('components.ouvrage.form-ouvrage', [
                                        'categories' => value_select($categories, 'id', 'libelle', $typeOuvrage->categorie->id),
                                        'formAction' => route('ouvrages.update', $typeOuvrage ),
                                        'ouvrage' => $typeOuvrage->libelle,
                                        'methode' => 'PUT'
                                    ])

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    @include('components.delete', [
                        'route' => route('ouvrages.destroy', $typeOuvrage->id),
                        'index' => $index,
                        'methode'=> 'DELETE',
                    ])

                </td>
            </tr>
        @endforeach

    </tbody>
</table>
<!-- End Default Table Example -->
