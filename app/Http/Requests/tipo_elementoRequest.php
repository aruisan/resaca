<?php namespace resaca\Http\Requests;

use resaca\Http\Requests\Request;

class tipo_elementoRequest extends Request {

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
		return[
			'descripcion' => 'required',
		];
	}

}
