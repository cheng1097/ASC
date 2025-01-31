@extends('templates.base')

@section('title', 'Objectifs')

@section('content')


    <div class="card">
        <div class="card-body">
            @if(_user('role') == 'controleur')
            @include('components.objectif.form-objectif', [
                'ouvrages' => value_select($ouvrages, 'id', 'libelle'),
                'enqueteurs' => value_select($enqueteurs, 'id', 'nom'),
                'formAction' => route('objectifs.store'),
            ])
            @endif
            <div id="liste">
                @include('components.objectif.liste-objectif-component')
            </div>
        </div>
    </div>

@endsection
