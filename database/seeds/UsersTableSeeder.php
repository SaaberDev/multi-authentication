<?php

    use App\Role;
    use App\User;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;

    class UsersTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $isSuperAdmin = Role::where('name', 'isSuperAdmin')->first();
            $isAdmin = Role::where('name', 'isAdmin')->first();
            /*$isEditor = Role::where('name', 'isEditor')->first();
            $isModerator = Role::where('name', 'isModerator')->first();*/
            $isUser = Role::where('name', 'isUser')->first();
            $users = User::all();

            if(!$users->count()){
                $SuperAdmin = new User();
                $SuperAdmin->name = 'Saber';
                $SuperAdmin->email = 'saber@demo.com';
                $SuperAdmin->isActive = 1;
                $SuperAdmin->email_verified_at = now();
                $SuperAdmin->password = bcrypt('123456');
                $SuperAdmin->remember_token = Str::random(10);
                $SuperAdmin->save();
                $SuperAdmin->roles()->attach($isSuperAdmin);

                $Admin = new User();
                $Admin->name = 'Faisal';
                $Admin->email = 'faisal@demo.com';
                $Admin->isActive = 1;
                $Admin->email_verified_at = now();
                $Admin->password = bcrypt('123456');
                $Admin->remember_token = Str::random(10);
                $Admin->save();
                $Admin->roles()->attach($isAdmin);

                $User = new User();
                $User->name = 'Isfar';
                $User->email = 'isfar@demo.com';
                $User->isActive = 1;
                $User->email_verified_at = now();
                $User->password = bcrypt('123456');
                $User->remember_token = Str::random(10);
                $User->save();
                $User->roles()->attach($isUser);
            }
        }
    }
