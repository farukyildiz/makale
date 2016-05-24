<?php

use yii\db\Migration;

class m160524_215314_auth_item_table extends Migration
{
    public function up()
    {
		$this->execute('-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 May 2016, 23:52:36
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Veritabanı: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `id` (`id`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=135 ;

--
-- Tablo döküm verisi `auth_item`
--

INSERT INTO `auth_item` (`id`, `name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
(132, "admin", 1, NULL, NULL, NULL, 1463575908, 1463575908),
(131, "author", 1, NULL, NULL, NULL, 1463575908, 1463575908),
(125, "blog/article/create", 2, "Create post", NULL, NULL, 1463575903, 1463575903),
(128, "blog/article/delete", 2, " delete post", NULL, NULL, 1463575903, 1463575903),
(124, "blog/article/index", 2, "create a index", NULL, NULL, 1463575903, 1463575903),
(127, "blog/article/update", 2, " update post", NULL, NULL, 1463575903, 1463575903),
(126, "blog/article/view", 2, " view post", NULL, NULL, 1463575903, 1463575903),
(130, "blog/auth", 2, " authoruzation", NULL, NULL, 1463575903, 1463575903),
(129, "site/index", 2, " null", NULL, NULL, 1463575903, 1463575903),
(134, "updateOwnPost", 2, "Update own post", "isAuthor", NULL, 1463575934, 1463575934);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;
');
    }

    public function down()
    {
        echo "m160524_215314_auth_item_table cannot be reverted.\n";

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
