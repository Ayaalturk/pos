<?php

namespace Core\Helpers;

use Core\Model\item;
use Core\Model\User;

class Fake
{
    protected static $faker;

    public static function provide_fake_data()
    {
        self::$faker = \Faker\Factory::create();
        var_dump(self::$faker->name());
        var_dump(self::$faker->realText(200));
        die;
    }

    public static function fake_items(int $items_num): array
    {
        self::$faker = \Faker\Factory::create();
        $items = array();
        for ($i = 0; $i < $items_num; $i++) {
            $items[] = array(
                "name" => self::$faker->text(20, 50),
                "discerption" => self::$faker->realText(500),
                "cost_price" => self::$faker->randomNumber(3, false),
                "seling_price" => self::$faker->randomNumber(2, false),
                "total_number" => self::$faker->randomNumber(1, false),

            );
        }
        return $items;
    }

    public static function create_items(int $items_num)
    {
        foreach (self::fake_items($items_num) as $fake_item) {
            $item = new item();
            $fake_item['discerption'] = \str_replace("'", "", $fake_item['discerption']);
            $item->create($fake_item);
        }
    }

    public static function fake_users(int $users_num)
    {
        self::$faker = \Faker\Factory::create();
        $users = array();
        for ($i = 0; $i < $users_num; $i++) {
            $users[] = array(
                "username" => self::$faker->userName(),
                "password" => "1234567",
            );
        }
        return $users;
    }

    public static function create_users(int $users_num)
    {
        foreach (self::fake_users($users_num) as $fake_user) {
            $user = new User();
            $user->create($fake_user);
        }
    }

    public static function is_first_time()
    {
        $item = new item();
        if (empty($item->get_all())) {
            self::create_items(20);
        }
    }
}
