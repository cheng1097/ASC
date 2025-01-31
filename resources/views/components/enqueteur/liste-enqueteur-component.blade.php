<!-- Default Table -->
<table class="table table-hover datatable">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            @if(_user('role') != 'controleur')
            <th>Controleur</th>
            @endif
            <th>Enqueteur</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($enqueteurs as $index => $enqueteur)
            <tr>
                <td>{{ $index + 1 }}</td>
                @if(_user('role') != 'controleur')
                <td>{{ $enqueteur->controleur->name }}</td>
                @endif
                <td>{{ $enqueteur->nom }}</td>
                <td>
                    <a href="#" data-bs-toggle="modal" class="me-4" data-bs-target="#edit{{ $index }}">
                        <i class="ri-edit-2-line text-secondary" title="modifier une enqueteur">
                        </i>
                    </a>
                    <!-- The Modal -->
                    <div class="modal" id="edit{{ $index }}">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title">Modifier enqueteur</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    @include('components.enqueteur.form-enqueteur', [
                                        'formAction' => route('enqueteur.update', $enqueteur ),
                                        'nom' => $enqueteur->nom,
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
                        'route' => route('enqueteur.destroy', $enqueteur->id),
                        'index' => $index,
                        'methode'=> 'DELETE',
                    ])

                </td>
            </tr>
        @endforeach

    </tbody>
</table>
<!-- End Default Table Example -->
