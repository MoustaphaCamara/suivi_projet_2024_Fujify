<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string', 'max:255'],
            'artist_id' => ['required', 'exists:artists,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Title',
            'duration' => 'Duration',
            'description' => 'Description',
            'artist_id' => 'Artist ID',
        ];
    }
}
