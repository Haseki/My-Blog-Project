-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Ağu 2015, 13:13:41
-- Sunucu sürümü: 5.6.24
-- PHP Sürümü: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `myblog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(50) NOT NULL,
  `entry` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `entry`, `username`, `password`) VALUES
(1, '08/13/2015 02:21:10 pm', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(20) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `summary` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_dir` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `articles`
--

INSERT INTO `articles` (`id`, `title`, `summary`, `content`, `img_name`, `img_dir`) VALUES
(5, 'Haydi Bakalim', 'Evvel zaman icinde kabur zaman icinde her nasÄ±l bu hikayenin nasÄ±l basladigini bilmesemde sonuc olarak can sikintisindan oldugum gunlerden biriydi. Burada sizinle birlikte ne sacmaladigimi anlamaya calisarak gecirdigim ve sonuc olarak bu yaziyi yazmis oldugum o gÃ¼nlerden biriydi. Eger bunu okuyup beyin spazmÄ± geÃ§irmediyseniz lÃ¼tfen kacin ve kendinizi kurtarÄ±n cunku burada bunun gibi daha sacma bir cok yazi bulabilir belki de deprosyana gÅŸrebilirsiniz. Sonra uyarmadilar demeyin.', 'Evvel zaman icinde kabur zaman icinde her nasÄ±l bu hikayenin nasÄ±l basladigini bilmesemde sonuc olarak can sikintisindan oldugum gunlerden biriydi. Burada sizinle birlikte ne sacmaladigimi anlamaya calisarak gecirdigim ve sonuc olarak bu yaziyi yazmis oldugum o gÃ¼nlerden biriydi. Eger bunu okuyup beyin spazmÄ± geÃ§irmediyseniz lÃ¼tfen kacin ve kendinizi kurtarÄ±n cunku burada bunun gibi daha sacma bir cok yazi bulabilir belki de deprosyana gÅŸrebilirsiniz. Sonra uyarmadilar demeyin.', '08-04-2015-12-44-25-pm_red_vector.jpg', './uploads/08-04-2015-12-44-25-pm_red_vector.jpg'),
(6, 'Project Summary', 'I have created this site because i wanted to learn PHP , CSS, JQuery etc. and its all basic elements. This site has admin panel which i can dinamicly create , edit and delete articles; check my messages and adding nw professions. All programmed by me.', 'I have created this site because i wanted to learn PHP , CSS, JQuery etc. and its all basic elements. This site has admin panel which i can dinamicly create , edit and delete articles; check my messages and adding nw professions. All programmed by me.', '08-03-2015-09-12-45-am_red_vector.jpg', './uploads/08-03-2015-09-12-45-am_red_vector.jpg'),
(7, 'Inception', 'Dom Cobb is a skilled thief, the absolute best in the dangerous art of extraction, stealing valuable secrets from deep within the subconscious during the dream state, when the mind is at its most vulnerable. Cobb''s rare ability has made him a coveted player in this treacherous new world of corporate espionage, but it has also made him an international fugitive and cost him everything he has ever loved. Now Cobb is being offered a chance at redemption. One last job could give him his life back bu', 'Dom Cobb is a skilled thief, the absolute best in the dangerous art of extraction, stealing valuable secrets from deep within the subconscious during the dream state, when the mind is at its most vulnerable. Cobb''s rare ability has made him a coveted player in this treacherous new world of corporate espionage, but it has also made him an international fugitive and cost him everything he has ever loved. Now Cobb is being offered a chance at redemption. One last job could give him his life back but only if he can accomplish the impossible-inception. Instead of the perfect heist, Cobb and his team of specialists have to pull off the reverse: their task is not to steal an idea but to plant one. If they succeed, it could be the perfect crime. But no amount of careful planning or expertise can prepare the team for the dangerous enemy that seems to predict their every move. An enemy that only Cobb could have seen coming. Written by Warner Bros. Pictures', '08-06-2015-02-37-41-pm_inception.jpg', './uploads/08-06-2015-02-37-41-pm_inception.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `f_id` int(14) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `message` varchar(3000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` int(14) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `feedbacks`
--

INSERT INTO `feedbacks` (`f_id`, `name`, `email`, `message`, `status`) VALUES
(18, 'commando', 'commando@gmail.com', 'A retired special agent named John Matrix led an elite unit and has left the armed forces to live in a secluded mountain home with his daughter Jenny. But now he is forced out of retirement when his daughter is kidnapped by a band of thugs intent on revenge! Unbeknownst to Matrix, the members of his former unit are being killed one by one. Even though Matrix'' friend General Franklin Kirby gives Matrix armed guards, attackers manage to kidnap Matrix and Jenny. Matrix learns that Bennett, a former member of his Matrix'' unit who was presumed dead has kidnapped him to try to force Matrix to do a political assassination for a man called Arius (who calls himself El Presidente), a warlord formerly bested by Matrix who wishes to lead a military coup in his home country. Since Arius will have Jenny killed if Matrix refuses, Matrix reluctantly accepts the demand.', 1),
(19, 'Haydar', 'haydar@gmail.com', 'Merhaba admin kardes', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `professions`
--

CREATE TABLE IF NOT EXISTS `professions` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `summary` text NOT NULL,
  `img_name` varchar(300) NOT NULL,
  `img_src` varchar(300) NOT NULL,
  `teori` int(10) NOT NULL DEFAULT '0',
  `pratik` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `professions`
--

INSERT INTO `professions` (`id`, `title`, `summary`, `img_name`, `img_src`, `teori`, `pratik`) VALUES
(1, 'PHP', 'I have designed a lot of web site with PHP. I mostly used JQuery, AJax with the PHP.', '08-03-2015-10-20-01-am_red_vector.jpg', './uploads/08-03-2015-10-20-01-am_red_vector.jpg', 4, 3),
(2, 'Java', 'U know what java is.', '08-06-2015-02-39-47-pm_red_vector.jpg', './uploads/08-06-2015-02-39-47-pm_red_vector.jpg', 5, 4),
(3, 'C++', 'No need TO', '08-12-2015-03-35-51-pm_red_vector.jpg', './uploads/08-12-2015-03-35-51-pm_red_vector.jpg', 5, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `summary` text NOT NULL,
  `img_name` varchar(300) NOT NULL,
  `img_src` varchar(300) NOT NULL,
  `link` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `projects`
--

INSERT INTO `projects` (`id`, `title`, `summary`, `img_name`, `img_src`, `link`) VALUES
(1, 'My web Site', 'This is my first dynamic blog with admin panels and my own (mostly) design.', '08-03-2015-10-32-44-am_red_vector.jpg', './uploads/08-03-2015-10-32-44-am_red_vector.jpg', 'http://localhost/MyBlog/index.php');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`f_id`), ADD KEY `f_id` (`f_id`), ADD FULLTEXT KEY `message` (`message`);

--
-- Tablo için indeksler `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `f_id` int(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Tablo için AUTO_INCREMENT değeri `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
