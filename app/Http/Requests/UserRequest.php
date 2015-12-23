<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
		$id = \Route::getCurrentRoute()->getParameter('one');
		return [
			'name' => 'required|max:255',
			'email' => "required|email|max:255|unique:users,email,$id",
			'password' => 'required|between:4,32|confirmed',
			'role_id' => 'required',
		];
	}

	public function messages()
	{
		return [
			'name.required' => 'ユーザ名は入力必須です。',
			'name.max' => 'ユーザ名は255文字以内で入力してください。',
			'email.required' => 'メールアドレスは入力必須です。',
			'email.email' => 'メールアドレスを正しい形式で入力してください。',
			'email.max' => 'メールアドレスは255文字以内で入力してください。',
			'email.unique' => 'このメールアドレスは既に登録されています。',
			'password.required' => 'パスワードは入力必須です。',
			'password.between' => 'パスワードは4～32文字以内で入力してください。',
			'password.confirmed' => 'パスワードが一致しません。',
		];
	}

}
