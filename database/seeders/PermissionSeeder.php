<?php

namespace Database\Seeders;

use App\Models\permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * categories permissions
         * */
        permission::query()->insert(
            [
                [
                    'title' => 'read-category',
                    'label' => 'مشاهده دسته بندی'
                ],
                [
                    'title' => 'create-category',
                    'label' => 'ایجاد دسته بندی'
                ],
                [
                    'title' => 'update-category',
                    'label' => 'ویرایش دسته بندی'
                ],
                [
                    'title' => 'create-category',
                    'label' => 'ایجاد دسته بندی'
                ]
            ]
        );



        /*
         * brands permissions
         * */
        permission::query()->insert(
            [
                [
                    'title' => 'read-brand',
                    'label' => 'مشاهده برند'
                ],
                [
                    'title' => 'create-brand',
                    'label' => 'ایجاد برند'
                ],
                [
                    'title' => 'update-brand',
                    'label' => 'ویرایش برند'
                ],
                [
                    'title' => 'create-brand',
                    'label' => 'ایجاد برند'
                ]
            ]
        );


        /*
         * products permissions
         * */
        permission::query()->insert(
            [
                [
                    'title' => 'read-product',
                    'label' => 'مشاهده محصول'
                ],
                [
                    'title' => 'create-product',
                    'label' => 'ایجاد محصول'
                ],
                [
                    'title' => 'update-product',
                    'label' => 'ویرایش محصول'
                ],
                [
                    'title' => 'create-product',
                    'label' => 'ایجاد محصول'
                ]
            ]
        );


        /*
         * pictures permissions
         * */
        permission::query()->insert(
            [
                [
                    'title' => 'read-pictures',
                    'label' => 'مشاهده عکس های محصول'
                ],
                [
                    'title' => 'create-pictures',
                    'label' => 'ایجاد عکس های محصول'
                ],
                [
                    'title' => 'update-pictures',
                    'label' => 'ویرایش عکس های محصول'
                ],
                [
                    'title' => 'create-pictures',
                    'label' => 'ایجاد عکس های محصول'
                ]
            ]
        );


        /*
         * discounts permissions
         * */
        permission::query()->insert(
            [
                [
                    'title' => 'read-discount',
                    'label' => 'مشاهده تخفیف محصول'
                ],
                [
                    'title' => 'create-discount',
                    'label' => 'ایجاد تخفیف محصول'
                ],
                [
                    'title' => 'update-discount',
                    'label' => 'ویرایش تخفیف محصول'
                ],
                [
                    'title' => 'create-discount',
                    'label' => 'ایجاد تخفیف محصول'
                ]
            ]
        );

        /*
         * roles permissions
         * */
        permission::query()->insert(
            [
                [
                    'title' => 'read-role',
                    'label' => 'مشاهده نقش'
                ],
                [
                    'title' => 'create-role',
                    'label' => 'ایجاد نقش'
                ],
                [
                    'title' => 'update-role',
                    'label' => 'ویرایش نقش'
                ],
                [
                    'title' => 'create-role',
                    'label' => 'ایجاد نقش'
                ]
            ]
        );


        /*
         * offers permissions
         * */
        permission::query()->insert(
            [
                [
                    'title' => 'read-offer',
                    'label' => 'مشاهده کد تخفیف'
                ],
                [
                    'title' => 'create-offer',
                    'label' => 'ایجاد کد تخفیف'
                ],
                [
                    'title' => 'update-offer',
                    'label' => 'ویرایش کد تخفیف'
                ],
                [
                    'title' => 'create-offer',
                    'label' => 'ایجاد کد تخفیف'
                ]
            ]
        );

        /*
         * dashboard permissions
         * */
        permission::query()->insert(
            [
                [
                    'title' => 'read-dashboard',
                    'label' => 'مشاهده داشبورد'
                ]
            ]
        );
    }
}
