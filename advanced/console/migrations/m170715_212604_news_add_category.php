<?php

use yii\db\Migration;

class m170715_212604_news_add_category extends Migration
{
    public function up()
    {
        //добавляем колонку category_id в таблицу news
        $this->addColumn('news', 'category_id', $this->integer());
// устанавливаем внешние ключи
        $this->addForeignKey('FK_NewsCategory', 'news', 'category_id', 'news_category', 'id', 'CASCADE', 'CASCADE');
// добавляем данные
        $newsCategoryData = [
            ['id' => 1, 'category_id' => 2],
            ['id' => 2, 'category_id' => 2],
            ['id' => 3, 'category_id' => 2],
            ['id' => 4, 'category_id' => 2],
            ['id' => 5, 'category_id' => 2],
            ['id' => 6, 'category_id' => 1],
            ['id' => 7, 'category_id' => 2],
        ];
        if (!empty($newsCategoryData)) {
            foreach ($newsCategoryData as $d) {
                $this->execute("UPDATE `news` SET `category_id` = '{$d['category_id']}' WHERE `id` = '{$d['id']}'");
            }
        }
    }

    public function down()
    {
        //удаляем внешний ключ
        $this->dropForeignKey('FK_NewsCategory', 'news');
// удаляем колонку
        $this->dropColumn('news', 'category_id');
    }
}
