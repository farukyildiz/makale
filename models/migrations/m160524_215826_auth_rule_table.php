<?php

use yii\db\Migration;

class m160524_215826_auth_rule_table extends Migration
{
    public function up()
    {
		$this->execute('CREATE TABLE IF NOT EXISTS `auth_rule` (
					`name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
					`data` text COLLATE utf8_unicode_ci,
					`created_at` int(11) DEFAULT NULL,
					`updated_at` int(11) DEFAULT NULL,
					PRIMARY KEY (`name`)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
					
					--
					-- Tablo döküm verisi `auth_rule`
					--
					
					INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
					("isAuthor", "O:35:"common\\modules\\auth\\rbac\\AuthorRule":4:{s:4:"name";s:8:"isAuthor";s:5:"model";N;s:9:"createdAt";i:1463575934;s:9:"updatedAt";i:1463575934;}", 1463575934, 1463575934);');
    }

    public function down()
    {
        echo "m160524_215826_auth_rule_table cannot be reverted.\n";

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
