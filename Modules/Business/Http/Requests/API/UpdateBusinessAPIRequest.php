<?php

namespace Modules\Business\Http\Requests\API;

use Modules\Business\Entities\Business;
use InfyOm\Generator\Request\APIRequest;

class UpdateBusinessAPIRequest extends APIRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = Business::$rules;
        
        return $rules;
    }
}
