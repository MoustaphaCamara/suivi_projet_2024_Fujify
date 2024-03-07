<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AnimeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'cover_image' => ['required', 'string', 'max:500'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'titre',
            'category' => 'catégorie',
            'description' => 'description',
            'cover_image' => 'image de couverture',
        ];
    }
}
