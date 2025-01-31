@extends('templates.base')

@section('title', 'Dashboard')

@section('content')


    <div class="card">
        <div class="card-body">
            @include('components.ouvrage.form-ouvrage', [
                'categories' => value_select($categories, 'id', 'libelle'),
                'formAction' => route('ouvrages.store'),
                'islogin' => true
            ])
            <div id="liste">
                @include('components.ouvrage.liste-ouvrage-component')
            </div>
        </div>
    </div>

@endsection
