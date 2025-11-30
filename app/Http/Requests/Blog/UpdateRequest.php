<?php

namespace App\Http\Requests\Blog;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $blog = $this->route('blog');
        return $this->user()->can('update', $blog);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:64'],
            'description' => ['required', 'string', 'max:255'],
            'image_blog' => ['image', 'max:10000']
        ];
    }
}
