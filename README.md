# Info
This is a Open source league of legends chat to create your own league of legends discussions With the champions that you want !
# Author
Created by FockuEZ .
# Tips
For those ho are beginner in php you have to change the $bdd variable at the start of each page puting a link to your localhost or to your MySql server .
And you have to create 1 table for each chat you create and one for all of them in the main file there is two chats so I created 3 tables if you don't want to waste time editing them just create 3 tables following this steps :

1) Name the first one : **lolfb** , it is where all the champions names are stocked , and to don't let you rewrite all the names here is a MySql command to insert all of them automaticaly :
This one is to create the table :
```php
CREATE TABLE IF NOT EXISTS `lolfb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `champion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;
```
And this one is to insert the champion list in it !
```php
INSERT INTO `lolfb` (`id`, `champion`) VALUES
(1, 'Aatrox'),
(2, 'Ahri'),
(3, 'Akali'),
(4, 'Alistar'),
(5, 'Amumu'),
(6, 'Anivia'),
(7, 'Annie'),
(8, 'Ashe'),
(9, 'Azir'),
(10, 'Bard'),
(11, 'Blitzcrank'),
(12, 'Brand'),
(13, 'Braum'),
(14, 'Caitlyn'),
(15, 'Cassiopeia'),
(16, 'Chogath'),
(17, 'Corki'),
(18, 'Darius'),
(19, 'Diana'),
(20, 'DrMundo'),
(21, 'Draven'),
(22, 'Ekko'),
(23, 'Elise'),
(24, 'Evelynn'),
(25, 'Ezreal'),
(26, 'Fiddlesticks'),
(27, 'Fiora'),
(28, 'Fizz'),
(29, 'Galio'),
(30, 'Gangplank'),
(31, 'Garen'),
(32, 'Gnar'),
(33, 'Gragas'),
(34, 'Graves'),
(35, 'Hecarim'),
(36, 'Heimerdinger'),
(37, 'Irelia'),
(38, 'Janna'),
(39, 'JarvanIV'),
(40, 'Jax'),
(42, 'Jayce'),
(43, 'Jinx'),
(129, 'Jhin'),
(45, 'Kalista'),
(46, 'Karma'),
(47, 'Karthus'),
(48, 'Kassadin'),
(49, 'Katarina'),
(50, 'Kayle'),
(51, 'Kennen'),
(52, 'Khazix'),
(53, 'KogMaw'),
(54, 'Leblanc'),
(55, 'LeeSin'),
(56, 'Leona'),
(57, 'Lissandra'),
(58, 'Lucian'),
(59, 'Lulu'),
(60, 'Lux'),
(61, 'Malphite'),
(62, 'Malzahar'),
(63, 'Maokai'),
(64, 'MasterYi'),
(65, 'MissFortune'),
(66, 'Mordekaiser'),
(67, 'Morgana'),
(68, 'Nami'),
(69, 'Nasus'),
(70, 'Nautilus'),
(71, 'Nidalee'),
(72, 'Nocturne'),
(73, 'Nunu'),
(74, 'Olaf'),
(75, 'Orianna'),
(76, 'Pantheon'),
(77, 'Poppy'),
(78, 'Quinn'),
(79, 'Rammus'),
(80, 'Reksai'),
(81, 'Renekton'),
(82, 'Rengar'),
(83, 'Riven'),
(84, 'Rumble'),
(85, 'Ryze'),
(86, 'Sejuani'),
(87, 'Shaco'),
(88, 'Shen'),
(89, 'Shyvana'),
(90, 'Singed'),
(91, 'Sion'),
(92, 'Sivir'),
(93, 'Skarner'),
(94, 'Sona'),
(95, 'Soraka'),
(96, 'Swain'),
(97, 'Syndra'),
(98, 'TahmKench'),
(99, 'Talon'),
(100, 'Taric'),
(101, 'Teemo'),
(102, 'Thresh'),
(103, 'Tristana'),
(104, 'Trundle'),
(105, 'Tryndamere'),
(106, 'Twistedfate'),
(107, 'Twitch'),
(108, 'Udyr'),
(109, 'Urgot'),
(110, 'Varus'),
(111, 'Vayne'),
(112, 'Veigar'),
(113, 'Velkoz'),
(114, 'Vi'),
(115, 'Viktor'),
(116, 'Vladimir'),
(117, 'Volibear'),
(118, 'Warwick'),
(119, 'MonkeyKing'),
(120, 'Xerath'),
(121, 'XinZhao'),
(122, 'Yasuo'),
(123, 'Yorick'),
(124, 'Zac'),
(125, 'Zed'),
(126, 'Ziggs'),
(127, 'Zilean'),
(128, 'Zyra'),
(130, 'AurelionSol'),
(131, 'Taliyah'),
(132, 'Camille'),
(133, 'Kled'),
(134, 'Ivern');
```

2) Name the second one : **msg** , it is where the messages will be stocked , or use this code :
```php
CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `champname` text NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;
```

3) Name the third one : **msg1** , it is where the messages from the second chat will be stocked , or use this code
```php
CREATE TABLE IF NOT EXISTS `msg1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `champname` text NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;
```

