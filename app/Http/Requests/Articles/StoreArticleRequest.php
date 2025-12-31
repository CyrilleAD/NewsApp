<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            "title" => ["required", "string", "max:255", "unique:articles,title"],
            "description" => ["required", "string"],
            "image" => ["nullable", "image", "max:2048", "mimes:jpeg,jpg,png"],
            "category_id" => ["required", "exists:categories,id"],
            "isActive" => ["required", "in:0,1"],
            "isCommentable" => ["required", "in:0,1"],
            "isShareable" => ["required", "in:0,1"],
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
