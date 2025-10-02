<?php

namespace Database\Seeders;

use App\Models\LoanReasons;
use Illuminate\Database\Seeder;

class ReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reasons = [
            ['title' => 'Покупка бытовой техники'],
            ['title' => 'Покупка телефона'],
            ['title' => 'Покупка автомобиля'],
            ['title' => 'Медицинское лечение'],
            ['title' => 'Семейные события'],
            ['title' => 'Поездка, туризм'],
            ['title' => 'Ремонт автомобиля'],
            ['title' => 'Ремонт дома/квартиры'],
            ['title' => 'Подарки близким/друзьям'],
            ['title' => 'Покупка продуктов питания'],
            ['title' => 'Домашние животные / услуги ветеринара'],
            ['title' => 'Возврат долга'],
            ['title' => 'Другое']
        ];
        LoanReasons::insert($reasons);
    }
}
