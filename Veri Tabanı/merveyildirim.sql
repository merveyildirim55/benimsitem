-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Ara 2020, 19:53:45
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `merveyildirim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `ID` int(11) NOT NULL,
  `tarih` text COLLATE utf8_turkish_ci NOT NULL,
  `baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `kategori` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`ID`, `tarih`, `baslik`, `icerik`, `kategori`) VALUES
(1, '13 NOV 2012', 'Ben Kimim                                                                                                      ', '<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cras mattis con</p><p>Fusce dapibus, t ', '9'),
(4, '13 NOV 2012', 'Ben Kimim                                  ', 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur. Curabitur blandit tempus porttitor. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.\r\n\r\n', '9');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogkat`
--

CREATE TABLE `blogkat` (
  `ID` int(11) NOT NULL,
  `ad` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blogkat`
--

INSERT INTO `blogkat` (`ID`, `ad`) VALUES
(1, 'YENİ'),
(2, 'Doğa'),
(5, 'YAŞAM'),
(9, 'merhaba'),
(18, '10'),
(19, '10'),
(20, '10'),
(21, 'DÜNYA');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogyorum`
--

CREATE TABLE `blogyorum` (
  `ID` int(11) NOT NULL,
  `ad` text COLLATE utf8_turkish_ci NOT NULL,
  `mail` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `blogId` int(11) NOT NULL,
  `onay` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blogyorum`
--

INSERT INTO `blogyorum` (`ID`, `ad`, `mail`, `yorum`, `blogId`, `onay`) VALUES
(12, 'sad', 'qwd', 'qwd', 1, 1),
(14, 'merve', 'merve@gmail.com', 'asdqwd', 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimda`
--

CREATE TABLE `hakkimda` (
  `ID` int(11) NOT NULL,
  `baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `onSoz` text COLLATE utf8_turkish_ci NOT NULL,
  `resim` text COLLATE utf8_turkish_ci NOT NULL,
  `hakkimda` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimda`
--

INSERT INTO `hakkimda` (`ID`, `baslik`, `onSoz`, `resim`, `hakkimda`) VALUES
(1, 'Ben Kimim ', 'Hakkımda bilmek isteyeceğiniz herşeyden birazdan bahsedeceğiz.', 'dca6b51f93c5a9adf1cea83ff1f50effEkran Alıntısı.JPG', 'Buraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya Yaszı.\r\n\r\nBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya Yazı.\r\n\r\nBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya YazıBuraya yazı Buraya Yazı.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `ID` int(11) NOT NULL,
  `ad` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` text COLLATE utf8_turkish_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `yetki` int(11) NOT NULL,
  `soru` text COLLATE utf8_turkish_ci NOT NULL,
  `cevap` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`ID`, `ad`, `sifre`, `aktif`, `yetki`, `soru`, `cevap`) VALUES
(1, 'MERVEYILDIRIM', '7583d7da297634a54075b91e8acf567d', 1, 1, 'kim', 'huseyin'),
(2, 'berkay', '7583d7da297634a54075b91e8acf567d', 1, 2, 'merhaba', 'merhaba'),
(7, 'huseyin', '374f6b88429e35d60bb091487426534a', 0, 6, 'seve', 'asdwq');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `ID` int(11) NOT NULL,
  `ad` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `eposta` text COLLATE utf8_turkish_ci NOT NULL,
  `konu` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimkat`
--

CREATE TABLE `resimkat` (
  `ID` int(11) NOT NULL,
  `kategori` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `resimkat`
--

INSERT INTO `resimkat` (`ID`, `kategori`) VALUES
(1, 'DOĞA'),
(2, 'UZAY'),
(3, 'HAYVAN'),
(4, 'YAŞAM');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimkon`
--

CREATE TABLE `resimkon` (
  `ID` int(11) NOT NULL,
  `resimKat` int(11) NOT NULL,
  `Konum` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `resimkon`
--

INSERT INTO `resimkon` (`ID`, `resimKat`, `Konum`) VALUES
(8, 1, '2.jpg'),
(9, 1, '3.jpg'),
(10, 2, '4.jpg'),
(11, 2, '5.jpg'),
(12, 4, '6.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `temelbilgiler`
--

CREATE TABLE `temelbilgiler` (
  `ID` int(11) NOT NULL,
  `sitaBasligi` text COLLATE utf8_turkish_ci NOT NULL,
  `siteAciklamasi` text COLLATE utf8_turkish_ci NOT NULL,
  `il` text COLLATE utf8_turkish_ci NOT NULL,
  `telefon` text COLLATE utf8_turkish_ci NOT NULL,
  `mail` text COLLATE utf8_turkish_ci NOT NULL,
  `twet` text COLLATE utf8_turkish_ci NOT NULL,
  `ins` text COLLATE utf8_turkish_ci NOT NULL,
  `lin` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `temelbilgiler`
--

INSERT INTO `temelbilgiler` (`ID`, `sitaBasligi`, `siteAciklamasi`, `il`, `telefon`, `mail`, `twet`, `ins`, `lin`) VALUES
(1, 'Merhaba; Ben MERVE', 'Burasıda Benim Fotoğraf Galarim', 'Samsun', '05555555555', 'merve@gmail.com', 'https://www.instagram.com/merveyldrm.55/', 'https://www.instagram.com/merveyldrm.55/', 'merve');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetki`
--

CREATE TABLE `yetki` (
  `ID` int(11) NOT NULL,
  `temel` tinyint(1) NOT NULL,
  `resim` tinyint(1) NOT NULL,
  `yorum` tinyint(1) NOT NULL,
  `hakkimda` tinyint(1) NOT NULL,
  `kullanici` tinyint(1) NOT NULL,
  `blog` tinyint(1) NOT NULL,
  `kulEkle` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yetki`
--

INSERT INTO `yetki` (`ID`, `temel`, `resim`, `yorum`, `hakkimda`, `kullanici`, `blog`, `kulEkle`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 0, 1, 0, 1, 0, 1),
(6, 0, 0, 0, 0, 0, 0, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `blogkat`
--
ALTER TABLE `blogkat`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `blogyorum`
--
ALTER TABLE `blogyorum`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `hakkimda`
--
ALTER TABLE `hakkimda`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `resimkat`
--
ALTER TABLE `resimkat`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `resimkon`
--
ALTER TABLE `resimkon`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `temelbilgiler`
--
ALTER TABLE `temelbilgiler`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `yetki`
--
ALTER TABLE `yetki`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `blogkat`
--
ALTER TABLE `blogkat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `blogyorum`
--
ALTER TABLE `blogyorum`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimda`
--
ALTER TABLE `hakkimda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `resimkat`
--
ALTER TABLE `resimkat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `resimkon`
--
ALTER TABLE `resimkon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `temelbilgiler`
--
ALTER TABLE `temelbilgiler`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yetki`
--
ALTER TABLE `yetki`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
