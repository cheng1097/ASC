@extends('templates.base')

@section('title', 'utilisateur')

@section('content')


    <div class="card">
        <div class="card-body">
            @include('components.utilisateur.user-form', [
                'roles' => select_Table($roles),
                'formAction' => route('utilisateur.store'),
                'islogin' => true,
            ])
            <div id="liste">
                @include('components.utilisateur.liste-user-component')
            </div>
        </div>
    </div>

@endsection
