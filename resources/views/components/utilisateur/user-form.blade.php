<form action="{{$formAction ?? ''}}" method="POST" id="form">

    @csrf
    @method($methode ?? 'POST')
    @php
        $class_ = $class ?? 'col-sm-3';
        $checklogin = $islogin ?? false;
        $fields = [
            'role' => [
                'type' => 'select',
                'label' => 'Rôle',
                'options' => $roles,
                'attribute' => ['required' => true],
                'class' => $class_,
            ],

            'name' => [
                'type' => 'text',
                'label' => 'Nom',
                'attribute' => ['value' => @old('name', $nom ?? ""), 'required' => true],
                'class' => $class_,
            ],
           
        ];

        if($checklogin){
                $fields['login'] = [
                'type' => 'text',
                'label' => 'Login',
                'attribute' => ['value' => @old('login', $login ?? ""), 'required' => true],
                'class' => $class_,
        ];
            }
    @endphp

    <div class="row mt-4">
        <x-form-field :fields="$fields" />
        <div class="col-sm-3 mt-2">
            <button type="submit" id="btn_submit" class="btn btn-dark mt-4 col-lg-8 col-sm-12 mb-4">Soumettre</button>
        </div>
    </div>

</form>
