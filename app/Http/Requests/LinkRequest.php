<?php
namespace App\Http\Requests;

use App\TuxBoy\Has_Rules;
use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
{

    use Has_Rules;

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
     * @return array
     */
    public function rules()
    {
      return $this->defaultRules(['url' => 'required|unique:links']);
    }

}
