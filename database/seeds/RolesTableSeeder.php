<?php

    use App\Role;
    use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();

        if(!$roles->count()){
            $isSuperAdmin = new Role();
            $isSuperAdmin->name = 'isSuperAdmin';
            $isSuperAdmin->desc = 'Have power over everything';
            $isSuperAdmin->save();

            $isAdmin = new Role();
            $isAdmin->name = 'isAdmin';
            $isAdmin->desc = 'Have power over Users';
            $isAdmin->save();

            $isUser = new Role();
            $isUser->name = 'isUser';
            $isUser->desc = 'Can access services';
            $isUser->save();
        }
    }
}
