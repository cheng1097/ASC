<form action="{{$formAction ?? ''}}" method="POST" id="form">

    @csrf
    @method($methode ?? 'POST')
    @php
        $class_ = 'col-sm-2';
        $disabled = (isset($methode) && $methode == 'PUT') ? true : false ; 
        $fields = [

        'id_enqueteur' => [
                'type' => 'select',
                'label' => 'Enqueteur',
                'options' => $enqueteurs,
                'attribute' => ['required' => true, 'disabled' => $disabled],
                'class' => $class_,
            ],

            'id_type_ouvrage' => [
                'type' => 'select',
                'label' => 'Ouvrage',
                'options' => $ouvrages,
                'attribute' => ['required' => true, 'disabled' => $disabled],
                'class' => $class_,
            ],

            'objectif' => [
                'type' => 'number',
                'label' => 'Objectif',
                'attribute' => ['value' => @old('objectif', $objectif ?? ""), 'min' => 1, 'required' => true],
                'class' => $class_,
            ],
        ];
    @endphp

    <div class="row mt-3">
        <x-form-field :fields="$fields" />
        <div class="col-sm-2">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" id="">
        </div>
        <div class="col-sm-3 mt-2">
            <button type="submit" id="btn_submit" class="btn btn-dark mt-4 col-lg-8 col-sm-12 mb-4">Soumettre</button>
        </div>
    </div>

</form>
