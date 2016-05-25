<?php

use yii\db\Migration;

class m160524_211713_yorum_table extends Migration
{
    public function up()
    {
		$this->execute('
			CREATE TABLE IF NOT EXISTS `yorum` (
			`ID` int(8) NOT NULL AUTO_INCREMENT,
			`makaleid` int(8) NOT NULL,
			`yorum` text CHARACTER SET latin1 NOT NULL,
			PRIMARY KEY (`ID`),
			KEY `makaleid` (`makaleid`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;
			
			ALTER TABLE `yorum`
  			ADD CONSTRAINT `makaleyorum` FOREIGN KEY (`makaleid`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
		');
    }

    public function down()
    {
        echo "m160524_211713_yorum_table cannot be reverted.\n";

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
