<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\User;
use App\Models\ExternalUser;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\InternalUser;
use Illuminate\Database\Seeder;
use Symfony\Component\String\ByteString;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = bcrypt('password');
        $internal_users = [
            0 => [
                'user_name' => 'Test User',
                'email'     => 'test@example.com',
                'phone'     => '1234567890',
                'password'  => $password,
            ],
            1 => [
                'user_name' => 'Test User',
                'email'     => 'test001@example.com',
                'phone'     => '2323232323',
                'password'  => $password,
            ],
            2 => [
                'user_name' => 'Test User',
                'email'     => 'test123@example.com',
                'phone'     => '3434343434',
                'password'  => $password,
            ],
        ];
        $external_users = [
            0 => [
                'user_id' => 'Test User',
                'phone_2' => '9090909090',
                'address' => 'Trichy India',
                'dob'     => $password,
            ],
            1 => [
                'user_id' => 'Test User',
                'phone_2' => '8989898989',
                'address' => 'Jayanagar India',
                'dob'     => $password,
            ],
            2 => [
                'user_id' => 'Test User',
                'phone_2' => '7878787878',
                'address' => 'JP Nagar India',
                'dob'     => $password,
            ],
        ];
        $attendances = [
            0 => [
                'internal_user_id' => 1,
                'external_user_id' => null,
                'login_time'       => '2025-01-01 08:00:00',
                'logout_time'      => '2025-01-01 17:00:00',
            ],
            1 => [
                'internal_user_id' => 2,
                'external_user_id' => null,
                'login_time'       => '2024-01-02 10:00:00',
                'logout_time'      => '2023-01-02 17:00:00',
            ],
            2 => [
                'internal_user_id' => 3,
                'external_user_id' => null,
                'login_time'       => '2025-01-03 09:00:00',
                'logout_time'      => '2025-01-03 18:00:00',
            ],
            3 => [
                'internal_user_id' => null,
                'external_user_id' => 1,
                'login_time'       => '2025-01-04 08:30:00',
                'logout_time'      => '2025-01-04 17:30:00',
            ],
            4 => [
                'internal_user_id' => null,
                'external_user_id' => 2,
                'login_time'       => '2025-01-05 09:15:00',
                'logout_time'      => '2025-01-05 18:15:00',
            ],
            5 => [
                'internal_user_id' => null,
                'external_user_id' => 3,
                'login_time'       => '2025-01-06 10:00:00',
                'logout_time'      => '2025-01-06 19:00:00',
            ],
        ];
        foreach ($internal_users as $user) {
            InternalUser::create($user);
        }
        foreach ($external_users as $user) {
            ExternalUser::create($user);
        }
        foreach ($attendances as $attendance) {
            Attendance::create($attendance);
        }
    }
}
