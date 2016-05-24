<?php

use yii\db\Migration;

class m160524_220214_user_table extends Migration
{
    public function up()
    {
		$this->execute('CREATE TABLE IF NOT EXISTS `user` (
						`id` int(11) NOT NULL AUTO_INCREMENT,
						`username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
						`auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
						`password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
						`password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
						`email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
						`status` smallint(6) NOT NULL DEFAULT "10",
						`created_at` int(11) NOT NULL,
						`updated_at` int(11) NOT NULL,
						PRIMARY KEY (`id`),
						UNIQUE KEY `username` (`username`),
						UNIQUE KEY `email` (`email`),
						UNIQUE KEY `password_reset_token` (`password_reset_token`)
						) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;
						
--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, "admin", "PnKujhZ_nIwtxCLnZ5U9b1Q3SgDc4HtM", "$2y$13$RD.h.yYZ9r5P/tbuQ4LhFOtV2EJg4m8hua0e3IvLDaOO81SlWds86", NULL, "admin@gmail.com", 10, 1458656864, 1458656864),
(2, "author", "6YE_CImtIi0feJiF6PsHPqEqse4MKqDB", "$2y$13$4BP/VB6Cpa2o88S6KhFkheM2orzW/9n0q2k4lvTKA.WAj9Z2yVp46", NULL, "author@gmail.com", 10, 1463315474, 1463315474),
(3, "akın", "QF70l25v9Kn5VBWstgIzfKnGzVI1dhj5", "$2y$13$lz70zFCStG.Jna2013Cho.Vne1aHJxvR6Q6FUv9Lw56Ml1rL/psmG", NULL, "akın@gmail.com", 10, 1463316252, 1463316252),
(4, "faruk", "ZG30tgS5YAaGU8d_7gO3KVSrXVqfqhc8", "$2y$13$xrXYl44Jth6G3Fc8dHzyuuA5lXqH2wr/BDsZIDUwzINp05FykpDK2", NULL, "faruk@gmail.com", 10, 1463316377, 1463316377),
(5, "samed", "Aiyw8sDARolw30abCtd4gMLwBz7DPd-A", "$2y$13$AG8di01SpiiCHDxXNPU9MuBJMaOS1BA.ZIyIu4ROf6ePp1rmDlbEm", NULL, "samed@gmail.com", 10, 1463316430, 1463316430);');
    }

    public function down()
    {
        echo "m160524_220214_user_table cannot be reverted.\n";

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
