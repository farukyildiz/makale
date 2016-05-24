<?php

use yii\db\Migration;

class m160524_231945_makale_table extends Migration
{
    public function up()
    {
		$this->execute('-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 May 2016, 01:19:59
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Veritabanı: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makale`
--

CREATE TABLE IF NOT EXISTS `makale` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `Ad` varchar(50) NOT NULL,
  `Konu` text NOT NULL,
  `Metin` text NOT NULL,
  `Etiket` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `makale`
--

INSERT INTO `makale` (`ID`, `Ad`, `Konu`, `Metin`, `Etiket`) VALUES
(4, "TestMakale", "test", "testestsdfd", "sadsadsa"),
(5, "sistem mühendisli?i", "Makale Konusu", "Metin içeri?i", "etiket"),
(6, "a?lar", "konu", "içerik", "etiket");
');
    }

    public function down()
    {
        echo "m160524_231945_makale_table cannot be reverted.\n";

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
