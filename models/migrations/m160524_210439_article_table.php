<?php

use yii\db\Migration;

class m160524_210439_article_table extends Migration
{
    public function up()
    {		$ss = 'CREATE TABLE IF NOT EXISTS `article` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`author_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			`article_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			`category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			`content` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;';
			$this->execute($ss);
    }

    public function down()
    {
        echo "m160524_210439_article_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
