<?php

use Illuminate\Database\Seeder;

class ObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `object_types` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'news', NULL, NULL)");
        DB::insert("INSERT INTO `object_types` (`id`, `name`, `created_at`, `updated_at`) VALUES (2, 'articles', NULL, NULL)");

        // news
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (1, 'title', 1)");
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (2, 'uuid', 1)");
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (3, 'publishDate', 1)");
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (4, 'logo', 1)");
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (5, 'text', 1)");
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (6, 'authorTitle', 1)");

        // articles
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (7, 'title', 2)");
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (8, 'uuid', 2)");
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (9, 'publishDate', 2)");
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (10, 'text', 2)");
        DB::insert("INSERT INTO `object_fields` (`id`, `name`, `object_type_id`) VALUES (11, 'author', 2)");

        // news
        DB::insert("INSERT INTO `attributes` (`id`, `object_type_id`, `name`, `type`) VALUES (1, 1, 'code', 'string')");
        DB::insert("INSERT INTO `attributes` (`id`, `object_type_id`, `name`, `type`) VALUES (2, 1, 'editable', 'boolean')");
        DB::insert("INSERT INTO `attributes` (`id`, `object_type_id`, `name`, `type`) VALUES (3, 1, 'showLabel', 'boolean')");
        DB::insert("INSERT INTO `attributes` (`id`, `object_type_id`, `name`, `type`) VALUES (4, 1, 'title', 'string')");
        DB::insert("INSERT INTO `attributes` (`id`, `object_type_id`, `name`, `type`) VALUES (5, 1, 'type', 'string')");

        // articles
        DB::insert("INSERT INTO `attributes` (`id`, `object_type_id`, `name`, `type`) VALUES (6, 2, 'code', 'string')");
        DB::insert("INSERT INTO `attributes` (`id`, `object_type_id`, `name`, `type`) VALUES (7, 2, 'editable', 'boolean')");
        DB::insert("INSERT INTO `attributes` (`id`, `object_type_id`, `name`, `type`) VALUES (8, 2, 'showLabel', 'boolean')");
        DB::insert("INSERT INTO `attributes` (`id`, `object_type_id`, `name`, `type`) VALUES (9, 2, 'title', 'string')");
        DB::insert("INSERT INTO `attributes` (`id`, `object_type_id`, `name`, `type`) VALUES (10, 2, 'type', 'string')");

        // news
        DB::insert("INSERT INTO `objects` (`id`, `object_type_id`, `title`, `uuid`, `is_archive`, `created_at`, `updated_at`) VALUES (1, 1, 'Новость #1', '2d843b7b-0069-4631-ac93-c88a5e5063c3', 0, '2019-08-09 08:15:39', '2019-08-09 08:15:40')");
        DB::insert("INSERT INTO `objects` (`id`, `object_type_id`, `title`, `uuid`, `is_archive`, `created_at`, `updated_at`) VALUES (2, 1, 'Новость #2', 'd7f84fb9-cdc2-49f2-a176-f1c1a81ab17e', 0, '2019-08-09 08:15:39', '2019-08-09 08:15:40')");
        DB::insert("INSERT INTO `objects` (`id`, `object_type_id`, `title`, `uuid`, `is_archive`, `created_at`, `updated_at`) VALUES (3, 1, 'Новость #3', 'c56b4487-0857-431c-ab77-8e9dadac7195', 0, '2019-08-09 08:15:39', '2019-08-09 08:15:40')");
        DB::insert("INSERT INTO `objects` (`id`, `object_type_id`, `title`, `uuid`, `is_archive`, `created_at`, `updated_at`) VALUES (4, 1, 'Новость #4', '3bcade74-193f-4610-b403-7ceb76f8fd93', 0, '2019-08-09 08:15:39', '2019-08-09 08:15:40')");
        DB::insert("INSERT INTO `objects` (`id`, `object_type_id`, `title`, `uuid`, `is_archive`, `created_at`, `updated_at`) VALUES (5, 1, 'Новость #5', '454cc2a4-5f3f-454c-95b9-fd9c99a61260', 1, '2019-08-09 08:15:39', '2019-08-09 08:15:40')");

        // articles
        DB::insert("INSERT INTO `objects` (`id`, `object_type_id`, `title`, `uuid`, `is_archive`, `created_at`, `updated_at`) VALUES (6, 2, 'Статья #1', uuid(), 0, '2019-08-09 08:15:39', '2019-08-09 08:15:40')");
        DB::insert("INSERT INTO `objects` (`id`, `object_type_id`, `title`, `uuid`, `is_archive`, `created_at`, `updated_at`) VALUES (7, 2, 'Статья #2', uuid(), 0, '2019-08-09 08:15:39', '2019-08-09 08:15:40')");
        DB::insert("INSERT INTO `objects` (`id`, `object_type_id`, `title`, `uuid`, `is_archive`, `created_at`, `updated_at`) VALUES (8, 2, 'Статья #3', uuid(), 1, '2019-08-09 08:15:39', '2019-08-09 08:15:40')");

        // news
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (1, 2, 1, 'true')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (2, 3, 1, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (3, 4, 1, 'Название')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (4, 5, 1, 'string')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (5, 2, 2, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (6, 3, 2, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (7, 4, 2, 'Идентификатор')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (8, 5, 2, 'string')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (10, 2, 3, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (11, 3, 3, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (12, 4, 3, 'Дата публикации')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (13, 5, 3, 'date')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (14, 2, 4, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (15, 3, 4, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (16, 4, 4, 'Логотип новости')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (17, 5, 4, 'image')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (18, 2, 5, 'true')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (19, 3, 5, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (20, 4, 5, 'Текст новости')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (21, 5, 5, 'text')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (22, 2, 6, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (23, 3, 6, 'true')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (24, 4, 6, 'Автор')");
        DB::insert("INSERT INTO `object_attribute_values` (`id`, `attribute_id`, `field_id`, `value`) VALUES (25, 5, 6, 'string')");

        // articles
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (7, 7, 'true')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (8, 7, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (9, 7, 'Название')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (10, 7, 'string')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (7, 8, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (8, 8, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (9, 8, 'Идентификатор')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (10, 8, 'string')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (7, 9, 'true')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (8, 9, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (9, 9, 'Дата публикации')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (10, 9, 'date')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (7, 10, 'true')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (8, 10, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (9, 10, 'Текст статьи')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (10, 10, 'text')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (7, 11, 'false')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (8, 11, 'true')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (9, 11, 'Автор статьи')");
        DB::insert("INSERT INTO `object_attribute_values` (`attribute_id`, `field_id`, `value`) VALUES (10, 11, 'string')");


        // news
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (3, 1, 3, '1565295620', NULL, '2019-08-09 11:15:48')");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (4, 1, 4, '/image/33.png', NULL, '2019-08-09 11:25:48')");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (5, 1, 5, 'Текст новости 1', NULL, '2019-08-09 11:23:24')");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (6, 1, 6, 'Василий Пупкин', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (9, 2, 3, '1565987143', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (10, 2, 4, '/image/2.png', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (11, 2, 5, 'Текст новости 2', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (12, 2, 6, 'Асламбек Бабаашвили', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (15, 3, 3, '1564387143', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (16, 3, 4, '/image/3.png', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (17, 3, 5, 'Текст новости 3', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (18, 3, 6, 'Иван Иванов', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (21, 4, 3, '1568987143', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (22, 4, 4, '/image/4.png', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (23, 4, 5, 'Текст новости 4', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (24, 4, 6, 'Петров Петр', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (27, 5, 3, '1564997143', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (28, 5, 4, '/image/5.png', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (29, 5, 5, 'Текст новости 5', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`id`, `object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (30, 5, 6, 'Сидоров Алексей', NULL, NULL)");

        // articles
        DB::insert("INSERT INTO `object_values` (`object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (6, 9, '1565295620', NULL, '2019-08-09 11:15:48')");
        DB::insert("INSERT INTO `object_values` (`object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (6, 10, 'Текст статьи 1', NULL, '2019-08-09 11:23:24')");
        DB::insert("INSERT INTO `object_values` (`object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (6, 11, 'Василий Пупкин', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (7, 9, '1565987143', NULL, '2019-08-09 11:15:48')");
        DB::insert("INSERT INTO `object_values` (`object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (7, 10, 'Текст статьи 2', NULL, '2019-08-09 11:23:24')");
        DB::insert("INSERT INTO `object_values` (`object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (7, 11, 'Асламбек Бабаашвили', NULL, NULL)");
        DB::insert("INSERT INTO `object_values` (`object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (8, 9, '1564387143', NULL, '2019-08-09 11:15:48')");
        DB::insert("INSERT INTO `object_values` (`object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (8, 10, 'Текст статьи 3', NULL, '2019-08-09 11:23:24')");
        DB::insert("INSERT INTO `object_values` (`object_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES (8, 11, 'Иван Иванов', NULL, NULL)");
    }
}
