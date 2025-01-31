<!-- Default Table -->
<table class="table table-hover datatable">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th>Nom</th>
            <th>Role</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="#" data-bs-toggle="modal" class="me-4" data-bs-target="#edit{{ $index }}">
                        <i class="ri-edit-2-line text-secondary" title="modifier un utilisateur">
                        </i>
                    </a>
                    <!-- The Modal -->
                    <div class="modal" id="edit{{ $index }}">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title">Modifier un utilisateur</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    @include('components.utilisateur.user-form', [
                                        'categories' => select_table($roles, $user->role),
                                        'formAction' => route('utilisateur.update', $user ),
                                        'nom' => $user->name,
                                        'methode' => 'PUT',
                                        'class' => 'col-sm-4'
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
                        'route' => route('utilisateur.destroy', $user->id),
                        'index' => $index,
                        'methode'=> 'DELETE',
                    ])

                    {{-- modifier mot de passe --}}
                    <a href="#" data-bs-toggle="modal" class="ms-4" data-bs-target="#modif-pass{{ $index }}">
                        <i class="ri-key-2-fill text-warning" title="modifier le mot de passe">
                        </i>
                    </a>
                    <!-- The Modal -->
                    <div class="modal" id="modif-pass{{ $index }}">
                        <div class="modal-dialog modal-xm modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title">Modifier le mot de passe</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                   <form action="{{route('updatePassword', ['id_user' =>$user->id ])}}" method="post" >
                                    @csrf
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" name="password" id="">
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary">Soumettre</button>
                                        </div>
                                   </div>
                                   </form>

                                </div>
                    {{-- modifier mot de passe --}}

                </td>
            </tr>
        @endforeach

    </tbody>
</table>
<!-- End Default Table Example -->
