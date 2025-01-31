@extends('templates.base')

@section('title', 'Objectifs')

@section('content')


    @php
        if (_user('role') == 'controleur') {
            $menusTabs = [
                'Données collectées' => [route('collecte'), '/'],
                'Validation Niveau 1' => [route('vueValidationN1'), 'validation-n1'],
            ];
        } else {
            $menusTabs = [];
        }

        if (_user('role') !== 'controleur') {
            $menusTabs['Validation Niveau 2'] = [route('vueValidationN2'), 'validation-n2'];
        }
    @endphp

    <div class="card">
        <div class="card-body">
            @include('components.menu-tab', ['menusTabs' => $menusTabs])
            {!! $view !!}
        </div>
    </div>



@endsection
