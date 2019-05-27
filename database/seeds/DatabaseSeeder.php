<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

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
        //MANUFACTURERS
        DB::table('manufacturers')->insert([
            'id' => '1',
            'name'=> 'Desert Essence',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('manufacturers')->insert([
            'id' => '2',
            'name'=> 'Pacifica',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('manufacturers')->insert([
            'id' => '3',
            'name'=> 'Missha',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('manufacturers')->insert([
            'id' => '4',
            'name'=> 'Pixi Beauty',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('manufacturers')->insert([
            'id' => '5',
            'name'=> 'Badger Company',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('manufacturers')->insert([
            'id' => '6',
            'name'=> 'The Face Shop',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('manufacturers')->insert([
            'id' => '7',
            'name'=> 'Sierra Bees',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        //PRODUCTS
        DB::table('products')->insert([
            'name_en'=> 'Thoroughly Clean Face Wash, Original, 250 ml',
            'name_ru'=> 'Средство для умывания для глубокой очистки, оригинальное, 250 мл',
            'description_en'=>'This gentle and unique cleansing solution leaves your skin feeling clean and silky. Eco-Harvest Tea Tree Oil, a known antiseptic, leaves skin feeling thoroughly clean and oil-free. Extracts of Goldenseal, Hawaiian White Ginger (Awapuhi), and essential oil and extract of Chamomile soothe skin. Mineral-rich Bladderwrack, harvested from the sea, nourishes the skin to leave it looking vibrantly healthy. Regular use ever so gently helps improve the texture, clarity and radiance of your skin.',
            'description_ru'=>'Этот нежный и уникальный очищающий раствор оставляет вашу кожу чистой и шелковистой. Эко-урожайное масло чайного дерева, известный антисептик, оставляет кожу чистой и безмасляной. Экстракты Goldenseal, Гавайского белого имбиря (Awapuhi), а также эфирное масло и экстракт ромашки успокаивают кожу. Обогащенный минералами Bladderwrack, добываемый с моря, питает кожу, делая ее здоровой. Регулярное использование помогает улучшить текстуру, чистоту и сияние вашей кожи.',
            'suggested_use_en'=>'Moisten face with warm water and gently massage a small amount of cleanser in circular motions onto cheeks, chin, forehead and neck, avoiding contact with eyes. Continue for approximately one minute, then rinse thoroughly with cool water. Follow this procedure twice daily.',
            'suggested_use_ru'=>'Умойте лицо теплой водой и нанесите массажными движениями небольшое количество очищающего средства на щеки, подбородок, лоб и шею, избегая попадания в глаза. Продолжайте втирать в течение минуты, затем тщательно смойте холодной водой. Проводите эту процедуру дважды в день.',
            'ingredients'=>'Castile soap (water (aqua), cocos nucifera (coconut) oil, tall oil, potassium hydroxide), glycerin, eco-harvest melaleuca alternifolia (tea tree) leaf oil, chamomilla recutita (matricaria) flower extract, hydrastis canadensis (goldenseal) root extract, hedychium coronarium root extract (awapuhi), fucus vesiculosus extract (bladderwrack), cymbopogon martini oil (palmarosa), citrus aurantium amara (bitter orange) peel oil, lavandula angustifolia (lavender) oil, chamomilla recutita (matricaria) flower oil, calendula officinalis flower oil, callitris introtropica wood oil (blue cypress).',
            'price'=>'320',
            'expiration_date'=>'01.01.2020',
            'quantity'=>'10',
            'image1'=>'https://s3.images-iherb.com/des/des22016/y/7.jpg',
            'image2'=>'https://s3.images-iherb.com/des/des22016/y/8.jpg',
            'id_manufacturer'=>'1',
            'id_category'=>'10',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name_en'=> 'Thoroughly Clean Face Wash, Original, 946 ml',
            'name_ru'=> 'Средство для умывания для глубокой очистки, оригинальное, 946 мл',
            'description_en'=>'This gentle and unique cleansing solution leaves your skin feeling clean and silky. Eco-Harvest Tea Tree Oil, a known antiseptic, leaves skin feeling thoroughly clean and oil-free. Extracts of Goldenseal, Hawaiian White Ginger (Awapuhi), and essential oil and extract of Chamomile soothe skin. Mineral-rich Bladderwrack, harvested from the sea, nourishes the skin to leave it looking vibrantly healthy. Regular use ever so gently helps improve the texture, clarity and radiance of your skin.',
            'description_ru'=>'Этот нежный и уникальный очищающий раствор оставляет вашу кожу чистой и шелковистой. Эко-урожайное масло чайного дерева, известный антисептик, оставляет кожу чистой и безмасляной. Экстракты Goldenseal, Гавайского белого имбиря (Awapuhi), а также эфирное масло и экстракт ромашки успокаивают кожу. Обогащенный минералами Bladderwrack, добываемый с моря, питает кожу, делая ее здоровой. Регулярное использование помогает улучшить текстуру, чистоту и сияние вашей кожи.',
            'suggested_use_en'=>'Moisten face with warm water and gently massage a small amount of cleanser in circular motions onto cheeks, chin, forehead and neck, avoiding contact with eyes. Continue for approximately one minute, then rinse thoroughly with cool water. Follow this procedure twice daily.',
            'suggested_use_ru'=>'Умойте лицо теплой водой и нанесите массажными движениями небольшое количество очищающего средства на щеки, подбородок, лоб и шею, избегая попадания в глаза. Продолжайте втирать в течение минуты, затем тщательно смойте холодной водой. Проводите эту процедуру дважды в день.',
            'ingredients'=>'Castile soap (water (aqua), cocos nucifera (coconut) oil, tall oil, potassium hydroxide), glycerin, eco-harvest melaleuca alternifolia (tea tree) leaf oil, chamomilla recutita (matricaria) flower extract, hydrastis canadensis (goldenseal) root extract, hedychium coronarium root extract (awapuhi), fucus vesiculosus extract (bladderwrack), cymbopogon martini oil (palmarosa), citrus aurantium amara (bitter orange) peel oil, lavandula angustifolia (lavender) oil, chamomilla recutita (matricaria) flower oil, calendula officinalis flower oil, callitris introtropica wood oil (blue cypress).',
            'price'=>'320',
            'expiration_date'=>'01.01.2021',
            'quantity'=>'7',
            'image1'=>'https://s3.images-iherb.com/des/des22111/y/8.jpg',
            'image2'=>'https://s3.images-iherb.com/des/des22111/y/7.jpg',
            'id_manufacturer'=>'1',
            'id_category'=>'10',//Face wash & cleansers
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name_en'=> ' Pineapple Cleanse, Oil Slaying Face Wash, 147 ml',
            'name_ru'=> 'Ананасовое очищение, гель для умывания против жирности кожи, 147 мл',
            'description_en'=>'This gel-based cleanser contains tons of natural extracts to get the job done right the first time without over-drying.For oily and combination skin types.',
            'description_ru'=>' Это очищающее средство на гелевой основе содержит тонны натуральных экстрактов, чтобы правильно выполнить работу с первого раза без пересушивания. Для жирной и комбинированной кожи.',
            'suggested_use_en'=>'Use morning and night. Apply to damp skin in a circular motion. Rinse.',
            'suggested_use_ru'=>'Используйте утром и вечером. Нанесите на влажную кожу круговыми движениями. Смойте.',
            'ingredients'=>'Aqua, cocamidopropyl hydroxysultaine, sodium cocoyl isethionate, sodium lauryl sarcosinate, cocamidopropyl oxide, sodium methyl cocoyl taurate, cocamidopropyl betaine, glyceryl laurate, potassium sorbate, aloe barbadensis leaf extract, sodium citrate, carica papaya fruit extract, sodium hyaluronate, ananas sativus (pineapple) fruit extract, camellia sinensis (white tea) leaf, algae extract, phenoxyethanol, ethylhexylglycerin, parfum (natural).',
            'price'=>'450',
            'expiration_date'=>'10.10.2020',
            'quantity'=>'7',
            'image1'=>'https://s3.images-iherb.com/pap/pap30251/y/0.jpg',
            'image2'=>'https://s3.images-iherb.com/pap/pap30251/y/1.jpg',
            'id_manufacturer'=>'2',
            'id_category'=>'10',//Face wash & cleansers
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        DB::table('products')->insert([
            'name_en'=> 'Clear Toner, 250 ml',
            'name_ru'=> 'Очищающий тоник, 250 мл',
            'description_en'=>'Clear toner with wipe off type to help eliminate pore dirt and dead skin cells, enhancing absorption of effective ingredients from the next step of skin care.',
            'description_ru'=>'Прозрачный тонер с типом очищения, чтобы помочь удалить поровую грязь и отмершие клетки кожи, улучшая поглощение эффективных ингредиентов на следующем этапе ухода за кожей.',
            'suggested_use_en'=>'At the first step of cleansing, remove moisture on the face. Soak cotton puff with toner and lightly wipe off the face following skin texture.',
            'suggested_use_ru'=>'На первом этапе очищения удалите влагу с лица. Смочите ватный слой тонером и слегка протрите лицо, следуя текстуре кожи.',
            'ingredients'=> 'Water, saccharomyces ferment filtrate, propanediol, glycerin, hordeum distichon (barley) extract, bifida ferment lysate, pentylene glycol, butylene glycol, 1,2-hexanediol, cellulose gum, salicylic acid, sodium citrate, citric acid, sodium hyaluronate, lactic acid, acetic acid, disodium EDTA, phenoxyethanol, potassium sorbate.',
            'price'=>'130',
            'expiration_date'=>'06.07.2021',
            'quantity'=>'5',
            'image1'=>'https://s3.images-iherb.com/msh/msh79244/y/4.jpg',
            'image2'=>'https://s3.images-iherb.com/msh/msh79244/y/5.jpg',
            'id_manufacturer'=>'3',
            'id_category'=>'11',//Toners
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name_en'=> 'Glow Tonic, Exfoliating Toner, 250 ml',
            'name_ru'=> 'Тоник для сверкающей кожи, Отшелушивающий тоник, 250 мл',
            'description_en'=> 'Gently exfoliates to remove dead skin cells, revealing healthy glowing skin.',
            'description_ru'=>'Мягко отшелушивает, удаляет мертвые клетки кожи и открывает здоровую светящуюся кожу.',
            'suggested_use_en'=>'At the first step of cleansing, remove moisture on the face. Soak cotton puff with toner and lightly wipe off the face following skin texture.',
            'suggested_use_ru'=>'На первом этапе очищения удалите влагу с лица. Смочите ватный слой тонером и слегка протрите лицо, следуя текстуре кожи.',
            'ingredients'=> 'Water/aqua, aloe barbadensis leaf juice, glycolic acid, butylene glycol, glycerin, sodium hydroxide, hamamelis virginiana (witch hazel) leaf extract, aesculus hippocastanum (horse chestnut) seed extract, hexylene glycol, fructose, glucose, sucrose, urea, dextrin, alanine, glutamic acid, aspartic acid, hexyl nicotinate, panax ginseng root extract, ethylhexylglycerin, disodium EDTA, biotin, panthenol, PPG-26-Buleth-26, PEG-40 hydrogenated castor oil, phenoxyethanol, fragrance (parfum), caramel, red 4 (CI 14700).',
            'price'=>'170',
            'expiration_date'=>'25.12.2020',
            'quantity'=>'6',
            'image1'=>'https://s3.images-iherb.com/pix/pix82100/y/4.jpg',
            'image2'=>'https://s3.images-iherb.com/pix/pix82100/y/5.jpg',
            'id_manufacturer'=>'4',
            'id_category'=>'11',//Toners
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        DB::table('products')->insert([
            'name_en'=> 'Glow Peel Pads, Advanced Exfoliating Treatment, 60 Pads',
            'name_ru'=> 'Glow Peel Pads, современный уход и отшелушивание, 60 мягких дисков',
            'description_en'=> 'These gentle yet effective exfoliating pads will reveal brighter, healthier, more radiant skin with regular use. Pores & breakouts are minimized, lines are softened and uneven skintone because brighter.',
            'description_ru'=>'Эти мягкие, но эффективные отшелушиваюшие диски при регулярном использовании сделают вашу кожу более яркой, здоровой и сияющей. Открытые поры и повреждения будут минимизированы, линии более мягкими и неравномерными, благодаря сияюнию.',
            'suggested_use_en'=>'Apply to the face, neck, décolletage, and tops of hands. Avoid eye area. Leave on for 2-3 minutes. Rinse with cool water to neutralize peel. Slight tingling after application is normal.',
            'suggested_use_ru'=>'Нанесите на лицо, шею, декольте и вернюю часть рук. Избегайте зоны вокруг глаз. Оставьте на 2-3 минуты. Смойте холодной водой, чтобы нейтрализовать отшелушивающийся слой. Легкое покалывание после использования считается нормальным.',
            'ingredients'=> 'Water, glycolic acid, aminomethyl propanol, glycerin, rosa damascena flower extract, polysorbate 20, SD alcohol 40-B, hamamelis virginiana (witch hazel) water, phenoxyethanol, aloe barbadensis leaf juice, arginine, tocopherol, sodium hydroxide, propanediol, caprylyl glycol, ethylhexylglycerin, leuconostoc/radish root ferment filtrate, ginkgo biloba leaf extract, glycyrrhiza glabra (licorice) root extract, lactic acid, salicylic acid, sodium ascorbyl phosphate, caprylhydroxamic acid, benzoic acid, retinyl palmitate, sodium carbonate, sodium chloride.',
            'price'=>'120',
            'expiration_date'=>'01.03.2022',
            'quantity'=>'10',
            'image1'=>'https://s3.images-iherb.com/pix/pix82351/y/1.jpg',
            'image2'=>'https://s3.images-iherb.com/pix/pix82351/y/2.jpg',
            'id_manufacturer'=>'4',
            'id_category'=>'12',//Toners
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        DB::table('products')->insert([
            'name_en'=> 'Argan Face Oil, 29.5 ml',
            'name_ru'=> ' Аргановое масло для лица, для всех типов кожи, 29,5 мл',
            'description_en'=> 'Badger Argan Face oil is an exotic, certified organic blend of precious plant oils, formulated to balance all skin types, leaving skin feeling smooth and looking radiant. This floral citrus blend features Argan Oil, known to provide excellent skin hydration and antioxidant protection.',
            'description_ru'=>'Масло для лица Badger Argan - это экзотическая, сертифицированная органическая смесь драгоценных растительных масел, разработанная для балансирования всех типов кожи, придавая коже ощущение гладкости и сияния. Эта цветочная цитрусовая смесь содержит аргановое масло, которое обеспечивает отличное увлажнение кожи и антиоксидантную защиту.',
            'suggested_use_en'=>'For best results, apply oil in the morning or at night right after cleansing with your Badger Face Cleansing Oil. For a wonderfully meditative, relaxing ritual, take a few extra minutes to massage oil into face.',
            'suggested_use_ru'=>'Для достижения наилучших результатов наносите масло утром или ночью сразу после очищения с помощью очищающего масла Badger Face. Для чудесного медитативного, расслабляющего ритуала, потратьте несколько дополнительных минут, чтобы втирать масло в лицо.',
            'ingredients'=> '*Simmondsia chinensis (jojoba) seed oil, *adansonia digitata (baobab) seed oil, *argania spinosa (argan) kernel oil, *punica granatum (pomegranate) seed oil, *citrus aurantium dulcis (orange) peel oil, *citrus aurantium bergamia (bergamot) peel oil, *santalum album (sandalwood) oil, tocopherol (sunflower vitamin E), *cananga odorata (ylang ylang) flower oil. Organic essential oil contains >0.001% limonene, linalool, citral and benzyl benzoate. *= Certified Organic',
            'price'=>'310',
            'expiration_date'=>'01.12.2019',
            'quantity'=>'7',
            'image1'=>'https://s3.images-iherb.com/wsb/wsb27005/y/3.jpg',
            'image2'=>'https://s3.images-iherb.com/wsb/wsb27005/y/5.jpg',
            'id_manufacturer'=>'5',
            'id_category'=>'13',//Toners
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name_en'=> 'Face Oil, Damascus Rose, For Dry, Delicate Skin, 29.5 ml',
            'name_ru'=> 'Масло для лица, дамасская роза, для сухой, нежной кожи, 29,5 мл',
            'description_en'=> 'All Badger cleansing oils and face oils are clinically tested non-comedogenic. The unscented cleansing oil and face oil are also hypoallergenic.',
            'description_ru'=>'Все очищающие масла Badger и масла для лица прошли клинические испытания, не являющиеся комедогенными. Очищающее масло без запаха и масло для лица также гипоаллергенны.',
            'suggested_use_en'=>'For best results, apply oil in the morning or at night right after cleansing with your Badger face cleansing oil. For a wonderfully meditative and relaxing ritual, take a few extra minutes to massage oil into face.',
            'suggested_use_ru'=>'Для оптимальных результатов, наносите утром или вечером после применения очищающего масла Badger. Для приятных медитации и расслабления, уделите несколько минут мягкому втиранию масла в кожу лица.',
            'ingredients'=> '*Simmondsia chinensis (jojoba) seed oil, *adansonia digitata (baobab) seed oil, *punica granatum (pomegranate) seed oil, *lavandula angustifolia (lavender) flower oil, *rosa canina (rosehip) fruit extract, *hippophae rhamnoides (seabuckthorn) fruit extract, *rosa damascena (rose) flower oil, *anthemis nobilis (roman chamomile) flower oil, *calendula officinalis (calendula) flower extract. Organic essential oils contain>0.001% of linalool, citronellol, geraniol, limonene, eugenol, citral, farnesol. * = Certified Organic',
            'price'=>'310',
            'expiration_date'=>'01.10.2020',
            'quantity'=>'16',
            'image1'=>'https://s3.images-iherb.com/wsb/wsb30060/y/7.jpg',
            'image2'=>'https://s3.images-iherb.com/wsb/wsb30060/y/9.jpg',
            'id_manufacturer'=>'5',
            'id_category'=>'13',//Toners
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        DB::table('products')->insert([
            'name_en'=> 'Firming Face Mask, 1 Single-Use Face Mask',
            'name_ru'=> 'Укрепляющая маска для лица, одноразовая маска для лица',
            'description_en'=> 'This face mask features a light-as-air sheet that feels soft and weightless on skin. The serum containing collagen provides a resilience solution to saggy skin.',
            'description_ru'=>'Эта маска для лица имеет легкий воздушный слой, который ощущается мягким и невесомым на коже. Сыворотка, содержащая коллаген, обеспечивает эластичное решение для обвисшей кожи.',
            'suggested_use_en'=>'Wash face and apply toner. Remove sheet from package and remove film on one side of sheet. Place mask evenly and firmly to face. Remove sheet after 10 to 20 minutes and gently pat to promote absorption of remaining essence.',
            'suggested_use_ru'=>'Вымойте лицо и нанесите тоник. Выньте лист из упаковки и удалите пленку с одной стороны листа. Разместите маску равномерно и плотно лицом. Удалите лист через 10-20 минут и осторожно похлопайте, чтобы способствовать поглощению оставшейся эссенции.',
            'ingredients'=> 'Water, propanediol, alcohol denat, peg/ppg-17/6 copolymer, glycerin, panthenol, phenyl trimethicone, 1,2-hexanediol, hydrolyzed collagen, paeonia suffruticosa root extract, citrus paradisi (grapefruit) fruit extract, sodium hyaluronate, butylene glycol, adenosine, hydroxyethyl acrylate/sodium acryloyldimethyl taurate copolymer, dimethicone, allantoin, carbomer, ethylhexylglycerin, peg-40 hydrogenated castor oil, hydrogenated lecithin, hydroxyethylcellulose, sodium polyacrylate, potassium hydroxide, disodium edta, fragrance.',
            'price'=>'120',
            'expiration_date'=>'01.09.2020',
            'quantity'=>'6',
            'image1'=>'https://s3.images-iherb.com/tfs/tfs56540/y/0.jpg',
            'image2'=>'https://s3.images-iherb.com/tfs/tfs56540/y/1.jpg',
            'id_manufacturer'=>'6',
            'id_category'=>'14',//Toners
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name_en'=> 'Firming Face Mask, 1 Single-Use Face Mask',
            'name_ru'=> 'Увлажняющая маска для лица, 1 одноразовая маска для лица',
            'description_en'=> 'This face mask features a light-as-air sheet that feels soft and weightless on skin. A serum containing hyaluronic acid helps dry, thirsty skin lock in moisture.',
            'description_ru'=>'Эта маска для лица имеет легкий воздушный слой, который ощущается мягким и невесомым на коже. Сыворотка, содержащая гиалуроновую кислоту, помогает сухой, жаждущей коже удерживать влагу.',
            'suggested_use_en'=>'Wash face and apply toner. Remove sheet from package and remove film on one side of sheet. Place mask evenly and firmly to face. Remove sheet after 10 to 20 minutes and gently pat to promote absorption of remaining essence.',
            'suggested_use_ru'=>'Вымойте лицо и нанесите тоник. Выньте лист из упаковки и удалите пленку с одной стороны листа. Разместите маску равномерно и плотно лицом. Удалите лист через 10-20 минут и осторожно похлопайте, чтобы способствовать поглощению оставшейся эссенции.',
            'ingredients'=> 'Water, propanediol,  alcohol denat,  peg/ppg-17/6 copolymer,  glycerin,  panthenol,  paeonia suffruticosa root extract, salix nigra (willow) bark extract,  salicylic acid, sodium hyaluronate,  allantoin, hydrogenated lecithin, 1,2-hexanediol,  hydroxyethylcellulose,  citrus paradisi (grapefruit) fruit extract,  hydroxyethyl acrylate/sodium acryloyldimethyl,  taurate copolymer,  carbomer,  sodium polyacrylate, ethylhexylglycerin,  peg-40 hydrogenated,  castor oil,  octyldodeceth-16, potassium hydroxide,  disodium edta,  dimethicone, fragrance.',
            'price'=>'120',
            'expiration_date'=>'01.09.2020',
            'quantity'=>'6',
            'image1'=>'https://s3.images-iherb.com/tfs/tfs56536/y/0.jpg',
            'image2'=>'https://s3.images-iherb.com/tfs/tfs56536/y/1.jpg',
            'id_manufacturer'=>'6',
            'id_category'=>'14',//Toners
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        DB::table('products')->insert([
            'name_en'=> 'Tinted Mineral Sunscreen Cream, Broad Spectrum SPF 30, Unscented, 87 ml',
            'name_ru'=> 'Минеральный солнцезащитный крем, SPF 30, без запаха, 87 мл',
            'description_en'=> 'Helps prevent sunburn.',
            'description_ru'=>'Помогает предотвратить солнечные ожоги.',
            'suggested_use_en'=>'For full protection, apply liberally (2 mg/cm² of skin) to all exposed skin 15 minutes before sun exposure',
            'suggested_use_ru'=>'Для полной защиты нанесите обильно (2 мг / см² кожи) на всю открытую кожу за 15 минут до пребывания на солнце.',
            'ingredients'=> '*Helianthus annuus (sunflower) seed oil, *cera alba (beeswax), tocopherol (sunflower vitamin E), *hippophae rhamnoides (seabuckthorn) fruit extract, iron oxides (c.l. 77492, c.l. 77491, c.l. 77499 (and) jojoba esters.*=Organic.',
            'price'=>'345',
            'expiration_date'=>'01.12.2020',
            'quantity'=>'5',
            'image1'=>'https://s3.images-iherb.com/wsb/wsb47405/y/13.jpg',
            'image2'=>'https://s3.images-iherb.com/wsb/wsb47405/y/14.jpg',
            'id_manufacturer'=>'5',
            'id_category'=>'15',//Toners
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        DB::table('products')->insert([
            'name_en'=> 'Organic Lip Balms Combo Pack, 8 Pack, (4.25 g) Each',
            'name_ru'=> 'Органический набор бальзамов для губ, 8 штук, (4.25 g) каждая',
            'description_en'=> 'Variety Pack - Cocoa Butter - Honey - Mint Burst- Pomegranate - Shea Butter & Argan Oil - Tamanu & Tea Tree - Unflavored - Creme Brulee',
            'description_ru'=>'В наборе - Масло какао - Мед - Мятный взрыв - Гранат - Масло ши и аргановое масло - Таману и чайное дерево - Без ароматизаторов - Крем-брюле',
            'suggested_use_en'=>'Put on lips',
            'suggested_use_ru'=>'Наносить на губы',
            'ingredients'=> 'Organic Cocoa Butter: Olive Oil*, Beeswax*, Cocoa Butter*, Sunflower Oil*, Non-GMO Vitamin E.
Organic Honey: Olive Oil*, Beeswax*, Natural Flavor, Sunflower Oil*, Non-GMO Vitamin E, Honey Extract*.
Organic Mint Burst: Olive Oil*, Beeswax*, Peppermint Oil*, Spearmint Oil*, Sunflower Oil*, Non-GMO Vitamin E.
Organic Pomegranate: Olive Oil*, Beeswax*, Natural Flavor, Sunflower Oil*, Non-GMO Vitamin E, Pomegranate Oil*.
Organic Shea Butter & Argan Oil: Olive Oil*, Shea Butter*, Beeswax*, Non-GMO Vitamin E, Argan Oil*.
Organic Tamanu & Tea Tree: Olive Oil*, Beeswax*, Tamanu Oil*, Sunflower Oil*, Tea Tree Oil*, Non-GMO Vitamin E.
Organic Unflavored: Olive Oil*, Beeswax*, Sunflower Oil*, Non-GMO Vitamin E.
Organic Creme Brulee: Olive Oil*, Beeswax*, Flavor*, Sunflower Oil*, Non-GMO Vitamin E.',
            'price'=>'600',
            'expiration_date'=>'10.10.2020',
            'quantity'=>'6',
            'image1'=>'https://s3.images-iherb.com/mbe/mbe00962/y/3.jpg',
            'image2'=>'https://s3.images-iherb.com/mbe/mbe00962/y/4.jpg',
            'id_manufacturer'=>'4',
            'id_category'=>'16',//Toners
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
