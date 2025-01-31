@foreach ($fields as $FieldName => $field)
    <div class="{{ $field['class'] ?? 'col' }} mb-3">
        {!! formField($field['type'], $FieldName, $field['label'], $field['options'] ?? [], $field['attribute'] ?? []) !!}
        @error($FieldName)
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
@endforeach
