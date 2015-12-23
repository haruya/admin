<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Role;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');

		Model::reguard();
	}

}

class UsersTableSeeder extends Seeder {
	public function run()
	{
		DB::table('users')->delete();

		User::create([
			'name' => 'nanashi',
			'email' => 'nanashi@gmail.com',
			'password' => Hash::make('nanashi'),
			'role_id' => '1',
		]);

		User::create([
		'name' => 'ichikawa',
		'email' => 'ichikawa0210h@gmail.com',
		'password' => Hash::make('ichikawa'),
		'role_id' => '2',
		]);

	}
}

class RolesTableSeeder extends Seeder {
	public function run()
	{
		DB::table('roles')->delete();

		Role::create([
		'name' => '一般ユーザ',
		]);

		Role::create([
		'name' => '管理者',
		]);

	}
}
