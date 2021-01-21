-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 19 Oca 2021, 11:37:22
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `olcayvarol`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konular`
--

DROP TABLE IF EXISTS `konular`;
CREATE TABLE IF NOT EXISTS `konular` (
  `konu_id` int(11) NOT NULL AUTO_INCREMENT,
  `konu_baslik` varchar(255) NOT NULL,
  `konu_icerik` text NOT NULL,
  `konu_yazar_id` varchar(255) NOT NULL,
  `konu_yayin_durumu` varchar(255) NOT NULL,
  PRIMARY KEY (`konu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `konular`
--

INSERT INTO `konular` (`konu_id`, `konu_baslik`, `konu_icerik`, `konu_yazar_id`, `konu_yayin_durumu`) VALUES
(1, 'Olcay VAROL kimdir?', 'Mersin üniversitesi, bilgisayar teknolojileri ve bilişim sistemleri 2.sınıf öğrencisiyim. Geçmişte basketbol kariyerim oldu. Üniversite sınavına hazırlanırken bıraktığım basketbol tutkum üniversitede tekrar bir takım ile çalışmaya başlayınca devam etti. Niğde\'de yaşıyorum, programlama dilleri de benim için çok büyük bir tutkudur.', '1', '1'),
(2, 'PHP nedir?', 'PHP : Hypertext Preprocessor (Türkçe: Üstünyazı Önişlemcisi [2]) (Aslen: Personal Home Page - Kişisel Ana Sayfa) , internet için üretilmiş, sunucu taraflı, çok geniş kullanımlı, genel amaçlı, içerisine HTML gömülebilen betik ve programlama dilidir[2]. İlk kez 1995 yılında Rasmus Lerdorf tarafından yaratılan PHP\'nin geliştirilmesi bugün PHP topluluğu tarafından sürdürülmektedir. Ocak 2013 itibarıyla 244 milyondan fazla web sitesi PHP ile çalışırken 2.1 milyon web sunucusunda PHP kurulumu bulunmaktadır.[3]\r\n\r\nPHP kodları PHP işleme modülü bulunan bir web sunucusu tarafından yorumlanır ve çıktı olarak web sayfası üretilir. Bu kodlar veriyi işlemek üzere harici bir dosyaya kaydedilerek çağırılabildiği gibi doğrudan HTML kodunun içine de gömülebilir. PHP zaman içinde bir komut satırı arayüzü sunacak şekilde evrilmiştir, PHP-GTK yardımıyla grafiksel masaüstü uygulaması geliştirmek de mümkündür.[4]\r\n\r\nPHP özgür bir yazılım olup PHP Lisansı ile dağıtılmaktadır. Bu lisans kullanım şartları kısmında GNU Genel Kamu Lisansı ile örtüşmese de, PHP tüm web sunuculara ve hemen hemen tüm işletim sistemi ve platforma ücretsiz olarak yüklenebilir.[5]', '2', '1'),
(3, 'C++ nedir?', 'C++, Bell Laboratuvarlarından Bjarne Stroustrup tarafından 1979 yılından itibaren geliştirilmeye başlanmış, C\'yi kapsayan ve çok paradigmalı, yaygın olarak kullanılan, genel amaçlı bir programlama dilidir. İlk olarak C With Classes olarak adlandırılmış, 1983 yılında ismi C++ olarak değiştirilmiştir.', '1', '1'),
(4, 'Python nedir?', 'Python, nesne yönelimli, yorumlamalı, birimsel (modüler) ve etkileşimli yüksek seviyeli bir programlama dilidir.[4]\r\n\r\nGirintilere dayalı basit sözdizimi, dilin öğrenilmesini ve akılda kalmasını kolaylaştırır. Bu da ona söz diziminin ayrıntıları ile vakit yitirmeden programlama yapılmaya başlanabilen bir dil olma özelliği kazandırır.\r\n\r\nModüler yapısı, sınıf dizgesini (sistem) ve her türlü veri alanı girişini destekler. Hemen hemen her türlü platformda çalışabilir. (Unix, Linux, Mac, Windows, Amiga, Symbian). Python ile sistem programlama, kullanıcı arabirimi programlama, ağ programlama, web programlama, uygulama ve veritabanı yazılımı programlama gibi birçok alanda yazılım geliştirebilirsiniz. Büyük yazılımların hızlı bir şekilde prototiplerinin üretilmesi ve denenmesi gerektiği durumlarda da C ya da C++ gibi dillere tercih edilir.\r\n\r\nPython 1980\'lerin sonunda ABC programlama diline alternatif olarak tasarlanmıştı. Python 2.0, ilk kez 2000 yılında yayınlandı. 2008\'de yayınlanan Python 3.0, dilin önceki versiyonuyla tam uyumlu değildir ve Python 2.x\'te yazılan kodların Python 3.x\'te çalışması için değiştirilmesi gerekmektedir. Python 2 versiyonun resmi geliştirilme süreci, dilin son sürümü olan Python 2.7.x serisi versiyonların ardından 1 Ocak 2020 itibarıyla resmi olarak sona erdi.[5][6] Python 2.x geliştirilme desteğinin sona ermesinin ardından, Python dilinin 3.6.x ve sonraki sürümlerinin geliştirilmesi devam etmektedir.[', '1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_ad` varchar(255) NOT NULL,
  `uye_soyad` varchar(255) NOT NULL,
  `uye_kullanici_adi` varchar(255) NOT NULL,
  `uye_eposta` varchar(255) NOT NULL,
  `uye_sifre` varchar(255) NOT NULL,
  `uye_tur` varchar(255) NOT NULL,
  `uye_durum` varchar(255) NOT NULL,
  PRIMARY KEY (`uye_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_ad`, `uye_soyad`, `uye_kullanici_adi`, `uye_eposta`, `uye_sifre`, `uye_tur`, `uye_durum`) VALUES
(1, 'Olcay', 'Varol', 'olcayvarol', 'olcayv0@gmail.com', '$2y$10$kJb8UXDnITo2G7ES5clcXOWWdX6ZaYVGXOl0q9Ak2urkQzEKcKxa.', '1', '0'),
(2, 'İlayda', 'Çerkez', 'ilaydacerkez', 'i.crkz34@gmail.com', '$2y$10$ly0o7ShoI2pNO9dOGpuR8elHtJkDXUu/atoFNTZchbGBKIjEZgY0W', '2', '0'),
(3, 'Test', 'Kullanıcısı', 'test', 'test@gmail.com', '$2y$10$VzHqg9VO9sDvgegG9qlbIejOMnlgE42CtLuJhgA05jyGkQY7UCSii', '3', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetenekler`
--

DROP TABLE IF EXISTS `yetenekler`;
CREATE TABLE IF NOT EXISTS `yetenekler` (
  `yetenek_id` int(11) NOT NULL AUTO_INCREMENT,
  `yetenek` varchar(255) NOT NULL,
  `yetenek_seviye` varchar(255) NOT NULL,
  `yetenek_durum` varchar(255) NOT NULL,
  PRIMARY KEY (`yetenek_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yetenekler`
--

INSERT INTO `yetenekler` (`yetenek_id`, `yetenek`, `yetenek_seviye`, `yetenek_durum`) VALUES
(1, 'PHP', '88', '1'),
(2, 'MYSQL', '25', '1'),
(3, 'JAVASCRIPT', '68', '1'),
(4, 'HTML5&CSS3', '66', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum` varchar(255) NOT NULL,
  `konu_id` varchar(255) NOT NULL,
  `yorum_yazar_id` varchar(255) NOT NULL,
  `yorum_yazar_kullanici_adi` varchar(255) NOT NULL,
  `yorum_durum` varchar(255) NOT NULL,
  PRIMARY KEY (`yorum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum`, `konu_id`, `yorum_yazar_id`, `yorum_yazar_kullanici_adi`, `yorum_durum`) VALUES
(1, 'Yorumlarınızı bekliyorum.', '1', '1', 'olcayvarol', '1'),
(2, 'Yönetici olduğum için bu blog yazısına yorum yapabiliyorum.', '1', '1', 'olcayvarol', '1'),
(3, 'Gerçekten başarılı bir özgeçmiş.', '1', '2', 'ilaydacerkez', '1'),
(4, 'Ben de yazar olduğum için bu blog yazısına yorum yapabiliyorum.', '1', '2', 'ilaydacerkez', '1'),
(5, 'Giriş yaptığım için yorum yapabiliyorum.', '1', '3', 'test', '1'),
(6, 'Bu bir deneme yorumudur.', '2', '2', 'ilaydacerkez', '1'),
(7, 'Giriş yaptığım için yorum da yapabiliyorum.', '2', '2', 'ilaydacerkez', '1'),
(8, 'Başarılı bir makele olmuş, teşekkürler', '4', '1', 'olcayvarol', '1'),
(9, 'Bence de başarılı bir makale olmuş.', '4', '2', 'ilaydacerkez', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
