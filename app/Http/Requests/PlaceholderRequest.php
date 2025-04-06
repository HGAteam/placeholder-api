<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceholderRequest extends FormRequest
{
    /**
     * Autoriza el acceso a esta request (true por defecto).
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Fuerza que las respuestas de validación sean en formato JSON.
     */
    public function wantsJson(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para los parámetros de imagen.
     */
    public function rules(): array
    {
        return [
            'size'   => ['nullable', 'regex:/^\d{2,4}x\d{2,4}$/'],
            'bg'     => ['nullable', 'string'], 
            'color'  => ['nullable', 'string'],
            'text'   => ['nullable', 'string'],
            'format' => ['nullable', 'in:png,jpeg,jpg,webp'],
        ];
    }
    

    /**
     * Mensajes personalizados de error.
     */
    public function messages(): array
    {
        return [
            'size.required' => 'El parámetro size es obligatorio (ej. 600x400).',
            'size.regex'    => 'El parámetro size debe tener el formato {ancho}x{alto}, por ejemplo 300x200.',
            'bg.regex'      => 'El color de fondo debe ser un valor hexadecimal válido (3 o 6 caracteres).',
            'color.regex'   => 'El color del texto debe ser un valor hexadecimal válido (3 o 6 caracteres).',
            'format.in'     => 'Formato no soportado. Usa: png, jpeg, jpg o webp.',
        ];
    }
}
