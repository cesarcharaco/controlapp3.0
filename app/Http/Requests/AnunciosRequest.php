<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnunciosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'require',
            'link' => 'require',
            'descripcion' => 'require',
            'imagen' => 'require'
        ];
    }

    public function mesagge()
    {
        return [
            'titulo.require' => 'Debe ingresar el título del anuncio',
            'link.require' => 'Debe ingresar el enlace del anuncio',
            'descripcion.require' => 'Es necesario una breve descripción del anuncio',
            'imagen.require' => 'Debe ingresar una imagen para el anuncio'
        ];   
    }
}
