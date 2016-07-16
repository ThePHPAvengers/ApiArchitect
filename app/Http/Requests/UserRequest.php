<?php

namespace Api\Requests;

use Dingo\Api\Http\FormRequest;
use \Illuminate\Support\Facades\Validator;

/**
 * Class UserRequest
 *
 * @package Api\Requests
 * @author James Kirkby <hello@jameskirkby.com>
 */
class UserRequest extends FormRequest
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
     * @author James Kirkby <hello@jameskirkby.com>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:ApiArchitect\Entities\User,email',
            'password' => 'required|confirmed|min:8',
        ];
    }
}
