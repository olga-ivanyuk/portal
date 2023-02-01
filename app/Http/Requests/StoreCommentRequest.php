<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
           'body'=>'required|string',
            'post_id'=>'required|numeric|exists:App\Models\Post,id',
            'user_id'=>'required|numeric|exists:App\Models\User,id',
            'comment_id'=>'nullable|exists:App\Models\Comment,id'
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
            'body'=>$this->body,
            'post_id'=> $this->post_id,
            'comment_id'=> $this->comment_id,
            'user_id'=> auth()->id(),
        ]);
    }
}
