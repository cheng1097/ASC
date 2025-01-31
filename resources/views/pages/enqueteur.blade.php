@extends('templates.base')

@section('title', 'Enqueteur')

@section('content')


    <div class="card">
        <div class="card-body">
            @if (_user('role') == 'controleur')
                @include('components.enqueteur.form-enqueteur', [
                    'formAction' => route('enqueteur.store'),
                ])
            @endif

            <div id="liste">
                @include('components.enqueteur.liste-enqueteur-component')
            </div>
        </div>
    </div>

@endsection
