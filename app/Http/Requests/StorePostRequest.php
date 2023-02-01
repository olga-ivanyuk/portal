<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'slug'=> 'required|string|min:3|max:255',
          'title'=> 'required|string|min:3|max:255',
          'description'=> 'required|string|min:3|max:255',
          'content'=> 'required|string|min:3',
          'category_id'=> 'required|numeric|exists:App\Models\Category,id',
            'user_id'=>'required|numeric|exists:App\Models\User,id',
            'tags'=>'max:3'
        ];
    }
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug'=>(string) str($this->title)->slug(),
            'title'=> (string) str($this->title)->title(),
            'description'=> $this->description,
            'content'=> $this->postContent,
            'category_id'=> $this->category_id,
            'user_id'=>auth()->id()
        ]);
    }
}
