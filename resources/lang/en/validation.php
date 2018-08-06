<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'nr_cpfcnpjedit' => [
            'required' => 'O campo :attribute é obrigatório',
            'numeric' => 'O campo :attribute deve possuir apenas números',
            'unique' => 'O campo :attribute já possui o valor cadastrado na base',
        ],
        'nm_pessoa' => [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'ds_siglalograd'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'nm_logradouro'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'nr_logradouro'=> [
            'required' => 'O campo :attribute é obrigatório',
            'numeric' => 'O campo :attribute deve possuir apenas números',
        ],
        'cd_cep' => [
            'required' => 'O campo :attribute é obrigatório',
            'numeric' => 'O campo :attribute deve possuir apenas números',
        ],
        'ds_bairro' => [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'ds_complemento'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'nm_municipio'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'nr_telefone'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'nr_celular'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'nm_estado'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'ds_orgaoexpedidor'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'nr_rg'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'ds_email'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'tp_sexo'=> [
            'required' => 'O campo :attribute é obrigatório',
        ],
        'dt_nascimento' => [
            'required' => 'O campo :attribute é obrigatório',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'nr_cpfcnpjedit' => 'CPF/CNPJ',
        'nm_pessoa' => 'Nome',
        'ds_siglalograd' => 'Tipo Logradouro',
        'nm_logradouro' => 'Logradouro',
        'nr_logradouro' => 'Número',
        'cd_cep' => 'CEP',
        'ds_bairro' => 'Bairro',
        'ds_complemento' => 'Complemento',
        'nm_municipio' => 'Município',
        'nr_telefone' => 'Telefone',
        'nr_celular' => 'Celular',
        'nm_estado' => 'UF',
        'ds_orgaoexpedidor' => 'Orgão Expeditor',
        'nr_rg' => 'RG',
        'ds_email' => 'E-mail',
        'ds_redesocial' => 'Rede Social',
        'ds_facebook' => 'Facebook',
        'ds_twitter' => 'Twitter',
        'ds_instagram' => 'Instagram',
        'tp_sexo' => 'Sexo',
        'dt_nascimento'  => 'Data Nascimento',
        'email' => 'E-mail',
        'password' => 'Senha'
    ],

];
