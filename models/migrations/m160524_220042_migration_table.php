<?php

use yii\db\Migration;

class m160524_220042_migration_table extends Migration
{
    public function up()
    {
		$this->execute('CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
("m000000_000000_base", 1458656831),
("m130524_201442_init", 1458656833),
("m140506_102106_rbac_init", 1461743828),
("m160524_210439_article_table", 1464124089),
("m160524_211713_yorum_table", 1464126293),
("m160524_214523_auth_assignment_table", 1464126724),
("m160524_215314_auth_item_table", 1464126927),
("m160524_215704_auth_item_child_table", 1464127084),
("m160524_215826_auth_rule_table", 1464127214);
');
    }

    public function down()
    {
        echo "m160524_220042_migration_table cannot be reverted.\n";

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
