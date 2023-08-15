<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =User::create([
            'surname'=>'Mr',
        	'first_name' => 'Rajon',
            'last_name' => 'Ahmed',
            'username'=>'admin',
            'business_id'=>1,
        	'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $role = Role::where('name','superadmin')->first();
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

    }
}
