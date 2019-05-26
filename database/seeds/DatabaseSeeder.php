<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'ssnasty@mail.ru',
            'role' => 'admin',
            'password'=> bcrypt('Esoteric4u'),
            'created_at' => date('Y-m-d H-i-s'),
            'updated_at' => date('Y-m-d H-i-s'),
        ]);
        DB::table('admins')->insert([
            'name'=> 'admin',
            'email'=> 'admin@mail.ru',
            'role'=> 'admin',
            'password'=> bcrypt('admin'),
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        //РАЗДЕЛЫ
        DB::table('sections')->insert([
            'id' => '1',
            'name_en'=> 'Face',
            'name_ru'=> 'Лицо',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('sections')->insert([
            'id' => '2',
            'name_en'=> 'Hair',
            'name_ru'=> 'Волосы',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('sections')->insert([
            'id' => '3',
            'name_en'=> 'Body',
            'name_ru'=> 'Тело',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('sections')->insert([
            'id' => '4',
            'name_en'=> 'Oils & aromatherapy',
            'name_ru'=> 'Масла и ароматерапия',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        //КАТЕГОРИИ
        //FACE
        DB::table('categories')->insert([
            'id' => '10',
            'name_en'=> 'Face wash & cleansers',
            'name_ru'=> 'Средства для умывания',
            'id_section' => '1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '11',
            'name_en'=> 'Toners',
            'name_ru'=> 'Тоники',
            'id_section' => '1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '12',
            'name_en'=> 'Peels',
            'name_ru'=> 'Пилинг',
            'id_section' => '1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '13',
            'name_en'=> 'Face oils',
            'name_ru'=> 'Масла для лица',
            'id_section' => '1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '14',
            'name_en'=> 'Face masks',
            'name_ru'=> 'Маски для лица',
            'id_section' => '1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '15',
            'name_en'=> 'Sun care',
            'name_ru'=> 'Защита от солнца',
            'id_section' => '1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '16',
            'name_en'=> 'Lip balms',
            'name_ru'=> 'Бальзамы для губ',
            'id_section' => '1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        //HAIR
        DB::table('categories')->insert([
            'id' => '20',
            'name_en'=> 'Shampoo',
            'name_ru'=> 'Шампуни',
            'id_section' => '2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '21',
            'name_en'=> 'Conditioner',
            'name_ru'=> 'Кондиционеры',
            'id_section' => '2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '22',
            'name_en'=> 'Mask',
            'name_ru'=> 'Маски',
            'id_section' => '2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '23',
            'name_en'=> 'Scrub',
            'name_ru'=> 'Скраб',
            'id_section' => '2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '24',
            'name_en'=> 'Serum',
            'name_ru'=> 'Серум',
            'id_section' => '2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '25',
            'name_en'=> 'Oil',
            'name_ru'=> 'Масло',
            'id_section' => '2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '26',
            'name_en'=> 'Cream',
            'name_ru'=> 'Крем',
            'id_section' => '2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '27',
            'name_en'=> 'Gel',
            'name_ru'=> 'Гель',
            'id_section' => '2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        //BODY
        DB::table('categories')->insert([
            'id' => '30',
            'name_en'=> 'Body wash & shower gel',
            'name_ru'=> 'Гели для душа',
            'id_section' => '3',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '31',
            'name_en'=> 'Hand wash & soap',
            'name_ru'=> 'Гели для рук',
            'id_section' => '3',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '32',
            'name_en'=> 'Body lotions & body oils',
            'name_ru'=> 'Кремы, лосьоны и масла для тела',
            'id_section' => '3',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '33',
            'name_en'=> 'Hand creams & lotions',
            'name_ru'=> 'Кремы и лосьоны для рук',
            'id_section' => '3',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        //OILS & AROMATHERAPY
        DB::table('categories')->insert([
            'id' => '40',
            'name_en'=> 'Essential oils',
            'name_ru'=> 'Эфирные масла',
            'id_section' => '4',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '41',
            'name_en'=> 'Oils',
            'name_ru'=> 'Масла',
            'id_section' => '4',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '42',
            'name_en'=> 'Butters',
            'name_ru'=> 'Твердые масла',
            'id_section' => '4',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'id' => '43',
            'name_en'=> 'Essential mists, sprays',
            'name_ru'=> 'Мисты, спреи с эфирными маслами',
            'id_section' => '4',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);


        //NEWS
        DB::table('news')->insert([
            'id' => '1',
            'title_en'=> 'Sales due opening our cosmetic store',
            'title_ru'=> 'Акция в честь открытия интернет-магазина',
            'body_en'=> 'Скидки начинаются. В данное время стоит выаловыаловыда ывоаловыалы ывавыа ывавыавы ывавыа ророр  роророро  оророро роророр ророро роророр р роророр 234 укуцк ы вавы а уц куцк   уцкуцкуцк уцк уцкуцкуц уцкпвыпдлц длодлод.',
            'body_ru'=> 'Скидки начинаются. В данное время стоит выаловыаловыда ывоаловыалы ывавыа ывавыавы ывавыа ророр  роророро  оророро роророр ророро роророр р роророр 234 укуцк ы вавы а уц куцк   уцкуцкуцк уцк уцкуцкуц уцкпвыпдлц длодлод.',
            'date' => '24/5/2019',
            'image'=> 'Ocean-Water-Wave-Art-Blue-Concept-Dark.jpg',
        ]);
        DB::table('news')->insert([
            'id' => '2',
            'title_en'=> 'Новость новость новость новость новость новость',
            'title_ru'=> 'News news News news News news News news News news News news',
            'body_en'=> 'English .Скидки начинаются. В данное время стоит выаловыаловыда ывоаловыалы ывавыа ывавыавы ывавыа ророр роророро оророро роророр ророро роророр р роророр 234 укуцк ы вавы а уц куцк уцкуцкуцк уцк уцкуцкуц уцкпвыпдлц длодлод.',
            'body_ru'=> 'Russian. Скидки начинаются. В данное время стоит выаловыаловыда ывоаловыалы ывавыа ывавыавы ывавыа ророр роророро оророро роророр ророро роророр р роророр 234 укуцк ы вавы а уц куцк уцкуцкуцк уцк уцкуцкуц уцкпвыпдлц длодлод.',
            'date' => '25/5/2019',
            'image'=> 'cherry_PNG635.png',
        ]);
    }
}
