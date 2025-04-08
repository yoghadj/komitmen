<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'reference_access',
            ],
            [
                'id'    => 18,
                'title' => 'komitman_create',
            ],
            [
                'id'    => 19,
                'title' => 'komitman_edit',
            ],
            [
                'id'    => 20,
                'title' => 'komitman_show',
            ],
            [
                'id'    => 21,
                'title' => 'komitman_delete',
            ],
            [
                'id'    => 22,
                'title' => 'komitman_access',
            ],
            [
                'id'    => 23,
                'title' => 'question_create',
            ],
            [
                'id'    => 24,
                'title' => 'question_edit',
            ],
            [
                'id'    => 25,
                'title' => 'question_show',
            ],
            [
                'id'    => 26,
                'title' => 'question_delete',
            ],
            [
                'id'    => 27,
                'title' => 'question_access',
            ],
            [
                'id'    => 28,
                'title' => 'option_create',
            ],
            [
                'id'    => 29,
                'title' => 'option_edit',
            ],
            [
                'id'    => 30,
                'title' => 'option_show',
            ],
            [
                'id'    => 31,
                'title' => 'option_delete',
            ],
            [
                'id'    => 32,
                'title' => 'option_access',
            ],
            [
                'id'    => 33,
                'title' => 'reply_create',
            ],
            [
                'id'    => 34,
                'title' => 'reply_edit',
            ],
            [
                'id'    => 35,
                'title' => 'reply_show',
            ],
            [
                'id'    => 36,
                'title' => 'reply_delete',
            ],
            [
                'id'    => 37,
                'title' => 'reply_access',
            ],
            [
                'id'    => 38,
                'title' => 'answer_create',
            ],
            [
                'id'    => 39,
                'title' => 'answer_edit',
            ],
            [
                'id'    => 40,
                'title' => 'answer_show',
            ],
            [
                'id'    => 41,
                'title' => 'answer_delete',
            ],
            [
                'id'    => 42,
                'title' => 'answer_access',
            ],
            [
                'id'    => 43,
                'title' => 'questionnaire_access',
            ],
            [
                'id'    => 44,
                'title' => 'monitoring_create',
            ],
            [
                'id'    => 45,
                'title' => 'monitoring_edit',
            ],
            [
                'id'    => 46,
                'title' => 'monitoring_show',
            ],
            [
                'id'    => 47,
                'title' => 'monitoring_delete',
            ],
            [
                'id'    => 48,
                'title' => 'monitoring_access',
            ],
            [
                'id'    => 49,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
