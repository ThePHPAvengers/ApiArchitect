<?php

namespace Api\Requests;

use Dingo\Api\Http\FormRequest;

/**
 * Class DogRequest
 *
 * @package Api\Requests
 * @author James Kirkby <hello@jameskirkby.com>
 */
class DogRequest extends FormRequest
{
    /**
     * @return bool
     */
	public function authorize()
	{
		return true;
	}

    /**
     * @return array
     */
	public function rules()
	{
		return [
	    	'name' => 'required|max:100',
	    	'age' => 'required|numeric|between:0,40'
    	];
	}
}