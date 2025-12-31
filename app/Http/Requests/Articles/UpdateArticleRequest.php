<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "title" => ["required", "string", "max:255"],
            "description" => ["required", "string"],
            "image" => ["nullable", "image", "max:2048", "mimes:jpeg,jpg,png,pdf"],
            "category_id" => ["required"],
            "isActive" => ["required", "boolean"],
            "isCommentable" => ["required", "boolean"],
            "isShareable" => ["required", "boolean"],
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Le titre est obligatoire",
            "description.required" => "La description est obligatoire",
            "image.required" => "L'image est obligatoire",
            "category_id.required" => "La catégorie est obligatoire",
            "isActive.required" => "L'activité est obligatoire",
            "isCommentable.required" => "La possibilité de commentaire est obligatoire",
            "isShareable.required" => "La possibilité de partage est obligatoire",
        ];
    }
}
