<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $error;
    public function authorize()
    {
        /*if (!($this->route('category') == config('cms.default_category_id'))) {
            $this->error = 'Sorry, you do not have permission to edit this post';
            return true;
        }*/
        return !($this->route('category') == config('cms.default_category_id'));
/*        return !($this->route('category') == config('cms.default_category_id'));*/
    }

    public function forbiddenResponse(){

        return redirect()->back()->with('error-message','Default category cannot delete');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
