<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArchivoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // only creator or invited users
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'archivo' => 'required|file|max:10240', // 10MB max
        ];
    }
}
