<?php 

return [
    /*
    |--------------------------------------------------------------------------
    | Mensajes de Validacion
    |--------------------------------------------------------------------------
    |
    | Las siguientes lineas continenen los errores de validación usados por la 
    | clase de validacion.
    |
    */
    'accepted'             => 'Debe aceptar :attribute.',
    'active_url'           => ':attribute no es una url válida.',
    'after'                => ':attribute debe ser posterior a :date.',
    'after_or_equal'       => ':attribute debe ser igual o posterior  a :date.',
    'alpha'                => ':attribute debe contener sólo letras.',
    'alpha_dash'           => ':attribute debe contener sólo letras, numeros y guiones.',
    'alpha_num'            => ':attribute debe contener sólo letras y números.',
    'array'                => ':attribute debe ser un arreglo.',
    'before'               => ':attribute debe ser anterior a :date.',
    'before_or_equal'      => ':attribute debe ser igual o anterior a :date.',
    'between'              => [
        'numeric' => ':attribute debe estar dentro de :min y :max.',
        'file'    => ':attribute debe tener entre :min y :max kilobytes.',
        'string'  => ':attribute debe tener entre :min y :max caracteres.',
        'array'   => ':attribute debe tener entre :min y :max items.',
    ],
    'boolean'              => ':attribute debe ser true o false.',
    'confirmed'            => ':attribute no concuerda.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no concuerda con el formato :format.',
    'different'            => ':attribute y :other deben ser distintos.',
    'digits'               => ':attribute debe contener sólo digitos.',
    'digits_between'       => ':attribute debe contener entre :min y :max digitos.',
    'dimensions'           => ':attribute tiene dimensiones no permitidas.',
    'distinct'             => ':attribute está diplicado.',
    'email'                => ':attribute debe ser una direccion email válida.',
    'exists'               => ':attribute no existe.',
    'file'                 => ':attribute debe ser un archivo.',
    'filled'               => ':attribute debe estar lleno.',
    'image'                => ':attribute debe ser una imágen.',
    'in'                   => ':attribute no está dentro de los valores permitidos.',
    'in_array'             => ':attribute no existe en :other.',
    'integer'              => ':attribute debe ser un entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'json'                 => ':attribute debe ser un documento JSON válido.',
    'max'                  => [
        'numeric' => ':attribute no puede ser mayor que :max.',
        'file'    => ':attribute no puede ser mayor pesar mas de :max kilobytes.',
        'string'  => ':attribute no puede contener mas de :max caracteres.',
        'array'   => ':attribute no puede contener mas de :max items.',
    ],
    'mimes'                => ':attribute debe ser un archivo de tipo :values.',
    'mimetypes'            => ':attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute debe ser al menos :min.',
        'file'    => ':attribute pesar al menos :min kilobytes.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
        'array'   => ':attribute debe contener al menos :min items.',
    ],
    'not_in'               => ':attribute no está dentro de los valores permitidos.',
    'numeric'              => ':attribute debe ser númerico.',
    'present'              => ':attribute debe estar presente.',
    'regex'                => ':attribute no cumple con el formato deseado.',
    'required'             => ':attribute es obligatorio.',
    'required_if'          => ':attribute es obligatorio cuando :other es :value.',
    'required_unless'      => ':attribute es obligatorio a menos que :other sea :values.',
    'required_with'        => ':attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => ':attribute es obligatorio cuando :values estan presentes.',
    'required_without'     => ':attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => ':attribute es obligatorio cuando :values no están presentes.',
    'same'                 => ':attribute y :other deben concordar.',
    'size'                 => [
        'numeric' => ':attribute debe ser :size.',
        'file'    => ':attribute debe pesar :size kilobytes.',
        'string'  => ':attribute debe contener :size caracteres.',
        'array'   => ':attribute debe contener :size items.',
    ],
    'string'               => ':attribute debe ser una cadena.',
    'timezone'             => ':attribute debe ser una zona horaria válida.',
    'unique'               => ':attribute ya está en la base de datos.',
    'uploaded'             => ':attribute falló al subir.',
    'url'                  => ':attribute no es una URL válida..',

];