<form action="{{$formAction ?? ''}}" method="POST" id="form">

    @csrf
    @method($methode ?? 'POST')
    @php
        $class_ = 'col-sm-4';

        $fields = [
            'nom' => [
                'type' => 'text',
                'label' => 'nom',
                'attribute' => ['value' => @old('nom', $nom ?? ""), 'required' => true],
                'class' => $class_,
            ],
        ];
    @endphp

    <div class="row mt-4">
        <x-form-field :fields="$fields" />
        <div class="col-sm-4 mt-2">
            <button type="submit" id="btn_submit" class="btn btn-dark mt-4 col-lg-8 col-sm-12 mb-4">Soumettre</button>
        </div>
    </div>

</form>
