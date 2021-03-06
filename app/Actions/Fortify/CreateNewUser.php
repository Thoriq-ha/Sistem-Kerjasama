<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
	use PasswordValidationRules;

	/**
	 * Validate and create a newly registered user.
	 *
	 * @param  array  $input
	 * @return \App\Models\User
	 */
	public function create(array $input)
	{
		Validator::make($input, [
			'name' => ['required', 'string', 'max:255'],
			'nama_lembaga' => ['required', 'string', 'max:255'],
			'keterangan' => ['required', 'string', 'max:255'],
			'alamat' => ['required', 'string', 'max:255'],
			'telp' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => $this->passwordRules(),
			'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
		])->validate();

		return User::create([
			'name' => $input['name'],
			'email' => $input['email'],
			'nama_lembaga' => $input['nama_lembaga'],
			'keterangan' => $input['keterangan'],
			'alamat' => $input['alamat'],
			'telp' => $input['telp'],
			'password' => Hash::make($input['password']),
		]);
	}
}
