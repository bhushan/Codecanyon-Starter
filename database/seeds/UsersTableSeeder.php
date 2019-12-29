<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$admin_role = Role::where('name', '=', 'admin')->first();

		$admin = new User();
		$admin->name = 'Bhushan Gaikwad';
		$admin->email = 'bhushan@qna-enlight.test';
		$admin->email_verified_at = now();
		$admin->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
		$admin->remember_token = Str::random(10);
		$admin->save();

		$admin->roles()->attach($admin_role);

		$jane = new User();
		$jane->name = 'Jane Doe';
		$jane->email = 'jane@qna-enlight.test';
		$jane->email_verified_at = now();
		$jane->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
		$jane->remember_token = Str::random(10);
		$jane->save();
	}
}
