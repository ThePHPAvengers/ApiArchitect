<?php

namespace Api\Requests;

use Dingo\Api\Http\FormRequest;

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
     * @SEE dont use unique:* doctrine can't handle it
     * @return array
     * @author James Kirkby <hello@jameskirkby.com>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:4',
        ];
    }
}
