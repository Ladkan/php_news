-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 31. bře 2022, 13:22
-- Verze serveru: 10.4.6-MariaDB
-- Verze PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `php_news`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_czech_ci NOT NULL,
  `pretext` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `text` text COLLATE utf8_czech_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `category_id`, `title`, `pretext`, `text`, `created_at`, `active`) VALUES
(2, 2, 2, 'Zkontrolujte, zda vaše hry poběží na Steam Decku', 'Zkontrolujte, zda vaše hry poběží na Steam Decku', '<p><strong><em>FFFFF</em></strong></p>', '2022-02-26 14:21:32', 1),
(3, 3, 3, 'OnePlus 10 Pro naprosto propadl v testu odolnosti', 'OnePlus 10 Pro naprosto propadl v testu odolnosti', '', '2022-02-26 14:22:41', 1),
(4, 4, 1, 'iPhone 14 nejspíš zůstane na 60 Hz', 'iPhone 14 nejspíš zůstane na 60 Hz', '', '2022-02-26 14:23:45', 1),
(5, 3, 4, 'Nový ultrabook od Lenova pohání čínský procesor ZhaoXin', 'Nový ultrabook od Lenova pohání čínský procesor ZhaoXin', '', '2022-02-26 14:24:48', 1),
(6, 1, 2, 'Steam Deck Dock je skvělý držák konzole s příšerným jménem', 'Takto bude vypadat dokovací stanice pro Steam Deck. Co vlastně bude dock pro konzoli nabízet a kdy přijde? Nebude to brzy, ale využije ho téměř každý. Pojďme si to shrnout.  „Vydání Docku nestihneme tak, jak jsme chtěli, ale těšíme se, až o něm brzy budeme mluvit. V plánu je uvést Dock na konci jara,” říká Valve z tiskové zprávy.', '<p>Takto bude vypadat dokovac&iacute; stanice pro <span style=\"color: #fca311;\"><a style=\"color: #fca311;\" href=\"https://indian-tv.cz/platforma/steam-deck\" target=\"_blank\" rel=\"noopener\"><strong>Steam Deck</strong></a></span>. Co vlastně bude dock pro konzoli nab&iacute;zet a kdy přijde? Nebude to brzy, ale využije ho t&eacute;měř každ&yacute;. Pojďme si to shrnout.</p>\r\n<p>&bdquo;<em>Vyd&aacute;n&iacute; Docku nestihneme tak, jak jsme chtěli, ale tě&scaron;&iacute;me se, až o něm brzy budeme mluvit. V pl&aacute;nu je uv&eacute;st Dock na konci jara,</em>&rdquo; ř&iacute;k&aacute; Valve z tiskov&eacute; zpr&aacute;vy.</p>\r\n<p>&nbsp;</p>\r\n<p>Jaro teprve zač&iacute;n&aacute;, takže z&aacute;kazn&iacute;ci do jeho konce budou m&iacute;t spoustu času si rozmyslet, jestli je tato dokovac&iacute; stanice pr&aacute;vě pro ně.</p>\r\n<p>&nbsp;</p>\r\n<p>Konzole disponuje <strong>jedn&iacute;m</strong> <strong>konektorem</strong> <strong>USB-A 3.1</strong>, <strong>dvěma USB-A 2.0</strong>, <strong>ethernetov&yacute;m </strong>konektorem, <strong>jedn&iacute;m DisplayPortem 1.4</strong> a v neposledn&iacute; řadě <strong>jedn&iacute;m HDMI 2.0</strong>. Tak&eacute; tu je kr&aacute;tk&yacute; kabel s <strong>USB typu C </strong>na konci, slouž&iacute;c&iacute; na současn&eacute; nab&iacute;jen&iacute; zař&iacute;zen&iacute;. </p>\r\n<p>&nbsp;</p>\r\n<div>\r\n<p>Podle n&aacute;s je men&scaron;&iacute; pře&scaron;lap, že tu chyb&iacute; USB-C konektor. USB-C je ve sv&eacute; podstatě univerz&aacute;ln&iacute;m konektorem a <strong>dok&aacute;že t&eacute;měř v&scaron;echny zm&iacute;něn&eacute; konektory nahradit</strong>. Nav&iacute;c, dnes už se USB-A nahrazuje men&scaron;&iacute;m, &uacute;hledněj&scaron;&iacute;m a rychlej&scaron;&iacute;m bratř&iacute;čkem. Je velk&aacute; &scaron;koda, že tu alespoň jeden dal&scaron;&iacute; USB-C konektor nen&iacute;.</p>\r\n<p>Displej <a href=\"https://indian-tv.cz/platforma/steam-deck\" target=\"_blank\" rel=\"noopener\"><span style=\"color: #fca311;\">Steam Decku</span></a> po zapojen&iacute; do extern&iacute;ho monitoru slouž&iacute; jako každ&yacute; jin&yacute; nefal&scaron;ovan&yacute; poč&iacute;tač. Tak&eacute; je možn&eacute; si do Steam Decku <strong>zapojit my&scaron;, kl&aacute;vesnici </strong>a jste zp&aacute;tky v &bdquo;PC Master Race&ldquo;. Nav&iacute;c budete m&iacute;t <strong>dostupn&yacute; sekund&aacute;rn&iacute; monitor </strong>na konzoli, a to rozhodně nen&iacute; k zahozen&iacute;. A kdyby se v&aacute;m Steam Deck Dock nel&iacute;bil, <strong>vždy jej lze nahradit jinou dokovac&iacute; stanic&iacute; </strong>pro standardn&iacute; poč&iacute;tače.</p>\r\n<p>Tak co vy? Pl&aacute;nujete si objednat Steam Deck nebo již ček&aacute;te na po&scaron;ť&aacute;ka s va&scaron;i novou &bdquo;hračkou&ldquo;?</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2022-02-28 10:22:48', 1),
(7, 4, 5, 'Geekbench blokuje Samsung telefony za limitování aplikací', 'Asi to poslední, co chcete je, aby váš nový telefon s nejnovějšími komponenty při používání limitoval výkon. Nějak takto dopadli zákazníci Samsungu, kteří si koupili kterýkoli telefon série S od vydání S10. O tomto konkrétním problému už jsme psali.', '<p>Asi to posledn&iacute;, co chcete je, <strong>aby v&aacute;&scaron; nov&yacute; telefon s nejnověj&scaron;&iacute;mi komponenty při použ&iacute;v&aacute;n&iacute; limitoval v&yacute;kon</strong>. Nějak takto dopadli z&aacute;kazn&iacute;ci Samsungu, kteř&iacute; si koupili kter&yacute;koli telefon s&eacute;rie S od vyd&aacute;n&iacute; S10. O tomto konkr&eacute;tn&iacute;m probl&eacute;mu <span style=\"color: #fca311;\"><a style=\"color: #fca311;\" href=\"https://proxy.pilnyjakub.eu/clanek/samsung-omezuje-vykon-vice-nez-10-000-aplikaci-p5om0h?__cpo=aHR0cHM6Ly90ZWNoZmVlZC5jeg\" target=\"_blank\" rel=\"noopener\">už jsme psali</a></span>.</p>\r\n<p>Ve stručnosti,<strong> Samsung limituje přes deset tis&iacute;c použ&iacute;van&yacute;ch aplikac&iacute; ve jm&eacute;nu zlep&scaron;ov&aacute;n&iacute; v&yacute;drže telefonu</strong>; list ale nejde nijak upravit či dočasně limitace vypnout. Ačkoli zn&aacute;m&eacute; appky jako TikTok či Netflix na listu najdete, ty měř&iacute;c&iacute; v&yacute;kon byste tam hledali marně.</p>\r\n<div>\r\n<p>Jednu z takov&yacute;ch aplikac&iacute; je Geekbench. <strong>Ten jako odpověď na limitace ze sv&eacute;ho syst&eacute;mu kompletně st&aacute;hnul telefony s&eacute;ri&iacute; S10, S20, S21 i t&eacute; nejnověj&scaron;&iacute;, S22</strong>. Ostatn&iacute; telefony Samsungu postiženy zat&iacute;m nejsou, limitov&aacute;n&iacute; v&yacute;konu u nich totiž nebylo objeveno.</p>\r\n<p><em>&bdquo;Zač&aacute;tkem tohoto t&yacute;dne jsme se dozvěděli o službě Game Optimizing Service (GOS) společnosti Samsung a o tom, jak omezuje v&yacute;kon her a aplikac&iacute;. Služba GOS rozhoduje o omezen&iacute; (či neomezen&iacute;) aplikac&iacute; na z&aacute;kladě identifik&aacute;torů, nikoli na z&aacute;kladě chov&aacute;n&iacute;. </em><strong><em>Považujeme to za formu manipulace s benchmarky</em></strong><em>, protože hlavn&iacute; benchmarkov&eacute; aplikace, včetně Geekbench, nejsou touto službou při&scaron;krcov&aacute;ny,&ldquo; </em>prohl&aacute;sil Geekbench k zablokov&aacute;n&iacute; telefonů korejsk&eacute;ho v&yacute;robce.</p>\r\n<p><strong>Samsung sl&iacute;bil, že s aktualizacemi umožn&iacute; vlastn&iacute; nastaven&iacute; omezov&aacute;n&iacute;</strong>, z chov&aacute;n&iacute; Geekbench ale vypl&yacute;v&aacute;, že se do jejich datab&aacute;ze nyn&iacute; zablokovan&eacute; telefony už nedostanou. K podobn&eacute;mu kroku přistoupil Geekbench už s OnePlus 9, kter&eacute; aplikace limitovalo podobně.</p>\r\n</div>', '2022-03-07 10:06:00', 1),
(8, 4, 1, 'Nový iPhone SE, iPad Air i Mac Mini? Souhrn Apple eventu', 'První Apple event roku přichází s řadou nových produktů, tak se na ně společně s námi podívejte.', '<h4>IPHONE SE 5G</h4>\r\n<div>\r\n<p><strong>iPhone SE se na konferenci předvedl a vypad&aacute; skvěle.</strong> Zachoval si svůj Touch ID a jeden fotoapar&aacute;t. Přich&aacute;z&iacute; ale lep&scaron;&iacute; procesor s mnoha vychyt&aacute;vkami. Nemůžeme se dočkat, až ho uvid&iacute;me naživo. <strong>V nov&eacute;m telefonu tep&aacute; procesor A15 Bionic</strong>. Ten poskytuje 6j&aacute;drov&eacute; CPU a 16j&aacute;drov&yacute; Neural Engine.&nbsp;</p>\r\n<p>Nov&yacute; iPhone SE přijde v barv&aacute;ch temně inkoustov&eacute;, hvězdně b&iacute;l&eacute; a PRODUCT RED.&nbsp; <strong>Apple slibuje v nov&eacute;m iPhonu lep&scaron;&iacute; baterku</strong>, certifikaci IP67, ant&eacute;ny podporuj&iacute;c&iacute; 5G. HD Retina displej ve velikosti 4,7 palců se neměn&iacute;.</p>\r\n<p><strong>Modul fotoapar&aacute;tu se tak&eacute; nezměnil</strong>, Apple ho jen vylep&scaron;il s technologi&iacute; Deep Fusion pro zv&yacute;&scaron;en&iacute; textury a detailu a Smart HDR4 pro &uacute;pravy jasu, kontrastu a barvy. Mimo to přijdou i fotografick&eacute; styly. Bude možn&eacute; si vybrat z několika, kter&eacute; se nejv&iacute;ce hod&iacute; pro dokonal&eacute; zachycen&iacute; momentu.</p>\r\n<p>A teď to nejdůležitěj&scaron;&iacute; &ndash; cena a datum vyd&aacute;n&iacute;. Předobjedn&aacute;vky iPhone SE třet&iacute; generace zač&iacute;naj&iacute; tento p&aacute;tek 11. 3. Do prodeje půjde 18. 3. <strong>iPhone SE je dostupn&yacute; v těchto variant&aacute;ch: 64 GB za 12 490 Kč, 128 GB za 13 990 Kč a 256 GB za 16 990 Kč</strong>.</p>\r\n<h4>IPAD AIR</h4>\r\n<div>\r\n<p>Apple se pochlubil i novinkou ze řady iPadů, <strong>m&iacute;ř&iacute; k n&aacute;m nov&yacute; iPad Air</strong>. Jeho největ&scaron;&iacute; aktualizaci mus&iacute;me hledat uvnitř; <strong>i Air teď totiž přech&aacute;z&iacute; na M1</strong>. Jak je již zn&aacute;mo, M1 nab&iacute;dne osmij&aacute;drov&yacute; procesor, grafick&yacute; čip i čip zaměřen&yacute; na neur&aacute;ln&iacute; s&iacute;tě. To znamen&aacute;, že i tady teď najdete Siri, kter&aacute; př&iacute;kazy zpracov&aacute;v&aacute; rychle př&iacute;mo na zař&iacute;zen&iacute;. Nov&yacute; iPad nab&iacute;dne i oproti předchůdci třikr&aacute;t rychlej&scaron;&iacute; port.</p>\r\n<p>Vylep&scaron;en&iacute; se tablet samozřejmě dočkal i navenek. <strong>Nov&yacute; displej je pokryt antireflexn&iacute; vrstvou, pokryje rozsah P3 RGB spektra a z&aacute;ř&iacute; až pěti sty nity</strong>. Nechyb&iacute; ani pro Apple snad už samozřejm&yacute; True Tone, kter&yacute; přizpůsobuje barvy na displeji podle toho, v jak&eacute;m prostřed&iacute; se nach&aacute;z&iacute;te.</p>\r\n<p><strong>Velkou novinkou je i možnost připojen&iacute; k 5G</strong> u varianty s možnost&iacute; připojen&iacute; k mobiln&iacute; s&iacute;ti. Apple podtrhuje předev&scaron;&iacute;m vylep&scaron;en&yacute; v&yacute;kon umožňuj&iacute;c&iacute; mnoho pokročil&yacute;ch činnost&iacute;, kter&eacute; teď můžete vykon&aacute;vat i na tom nejmen&scaron;&iacute;m kousku s&eacute;rie tabletů od Apple.</p>\r\n<p><strong>Na iPad Air tak&eacute; m&iacute;ř&iacute; ultra&scaron;irok&aacute; předn&iacute; kamera</strong>, což znamen&aacute;, že podporuje Center Stage. Tato funkce v&aacute;s při videohovorech bude st&aacute;le držet uprostřed z&aacute;běru, i když se před tabletem budete pohybovat. <strong>Zezadu pak najdete tak&eacute; 12MP kameru, kter&aacute; umožňuje nat&aacute;čen&iacute; 4K videa</strong>.</p>\r\n<p>Jak už to u Apple b&yacute;v&aacute;, cenovky jsou asi tou nejm&eacute;ně lichotivou str&aacute;nkou zař&iacute;zen&iacute;. <strong>64GB varianta zač&iacute;n&aacute; na 16 490 korun&aacute;ch, ta se 128 GB paměti v&aacute;s vyjde na 20 990 korun</strong>. Vylep&scaron;en&iacute; na verzi s připojen&iacute;m k s&iacute;ti v&aacute;s pak nehledě na konfiguraci vyjde na čtyři a půl tis&iacute;ce.</p>\r\n<p>Dostupn&yacute; je ve dvou odst&iacute;nech zelen&eacute;, oranžov&eacute; a růžov&eacute; barvě. V&scaron;echny s magnety z recyklovan&yacute;ch vz&aacute;cn&yacute;ch hornin a miner&aacute;lů.</p>\r\n<h4>M1 ULTRA</h4>\r\n<div>\r\n<p>Když na konferenci začal jeden z vystupuj&iacute;c&iacute;ch mluvit o nov&eacute;m rozměru vlastn&iacute;ch procesorů Apple, asi jsme nebyli jedin&iacute;, kdo s naděj&iacute; čekali na čipy M2. Ale ne, <strong>Apple pro n&aacute;s měl něco mnohem bl&aacute;znivěj&scaron;&iacute;ho; 5nm M1 Ultra</strong>.</p>\r\n<p>Jde vlastně o dva kusy dosud nejsilněj&scaron;&iacute;ho modelu, M1 Max, propojen&eacute; k sobě. To znamen&aacute;, <strong>že nov&yacute; čipset dosahuje prakticky osmin&aacute;sobku v&yacute;konu původn&iacute;ho M1</strong>. Apple podtrhuje technologii intern&iacute;ho propojen&iacute; zm&iacute;něn&yacute;ch dvou čipů, zvl&aacute;dat m&aacute; přenosovou rychlost až 2,5 terabajtů za sekundu.</p>\r\n<p>I přesto, že jde v z&aacute;kladě o čipsety dva, se M1 Ultra chov&aacute; jako jeden, takže nikterak nenaru&scaron;&iacute; z&aacute;klady programů. <strong>Uvnitř něj najdeme dohromady dvacet procesorov&yacute;ch jader</strong>. Z nich &scaron;estn&aacute;ct se zaměřuje na v&yacute;kon a zbyl&eacute; čtyři na elektrickou efektivitu. Grafick&aacute; jednotka m&aacute; pak jader dokonce 64 a nechyb&iacute; ani 32j&aacute;drov&yacute; čip pro neuronov&eacute; v&yacute;počty.</p>\r\n<p>Je&scaron;tě dod&aacute;me p&aacute;r zaj&iacute;mav&yacute;ch č&iacute;sel. <strong>Procesor dok&aacute;že celkem učinit asi dvacet jedna bilionů procesů za vteřinu na celkem 114 miliard&aacute;ch tranzistorů</strong>, kter&eacute; v něm najdeme. Vysok&aacute; je i rychlost komunikace s pamět&iacute;, jde o 800 GB/s. Podporuje tak až 256 GB unifikovan&eacute; paměti.</p>\r\n<h4>MAC STUDIO</h4>\r\n<div>\r\n<p>Mac Studio. Tak tohle nejsp&iacute;&scaron; nikdo z n&aacute;s nečekal. <strong>Tato neř&iacute;zen&aacute; mal&aacute; střela je tak siln&aacute;, že dok&aacute;že překonat Mac Pro v nejv&yacute;konněj&scaron;&iacute; konfiguraci</strong>.&nbsp;</p>\r\n<p><strong>Tento poč&iacute;tač v podobě elegantn&iacute;ho hlin&iacute;kov&eacute;ho čtverce měř&iacute; dvacet centimetrů do &scaron;&iacute;řky a deset do v&yacute;&scaron;ky</strong>. Zepředu jsou dva Thunderbolt 4 konektory s čtečkou SDXC. Zezadu jsou konektory HDMI, 3,5mm jack, 2 USB-A, Ethernet s rychlost&iacute; 10 GBPS, 4 Thunderbolt verze 4 a AC.</p>\r\n<p><strong>Mac Studio je možn&eacute; zakoupit buďto s M1 Max a nebo M1 Ultra</strong>. Varianta silněj&scaron;&iacute; nab&iacute;z&iacute; 20j&aacute;drov&eacute; CPU, 48j&aacute;drov&eacute; GPU a 32j&aacute;drov&yacute; Neural Engine. Zvl&aacute;dne 18 streamů 8K ProRes videa, k tomu 22 bili&oacute;nů operac&iacute; za sekundu, lze k němu připojit 5 monitorů a můžete si přikoupit až 8TB SSD disk dosahuj&iacute;c&iacute; rychlosti 7,4 GB/s.</p>\r\n<p>Jestli m&aacute;te o tento mal&yacute; megastroj z&aacute;jem, <strong>připravte si na M1 Max verzi 56 990 Kč a na verzi M1 Ultra 116 990 Kč</strong>. </p>\r\n<h4>STUDIO DISPLAY&nbsp;</h4>\r\n<div>\r\n<p>Je tu i nov&yacute; profesion&aacute;ln&iacute; displej. K Macbooku Pro je připoj&iacute;te dokonce tři. <strong>Nab&iacute;dne skvěl&yacute; 5K obraz vylep&scaron;en&yacute; pokryt&iacute;m P3 spektra RGB i již klasick&yacute;m True Tone přizpůsobuj&iacute;c&iacute;m barvy monitoru okol&iacute;</strong>. Monitor jako takov&yacute; m&aacute; pak je&scaron;tě antireflexn&iacute; vrstvu.</p>\r\n<p>I tady najdeme vpřed m&iacute;ř&iacute;c&iacute; 12MP kameru podporuj&iacute;c&iacute; Center Stage pro videohovory. <strong>Ty vylep&scaron;&iacute; i zvukov&yacute; segment složen&yacute; ze tř&iacute; mikrofonů</strong>, kter&yacute; by měl zajistit, aby byl v&aacute;&scaron; hlas sly&scaron;en čistě.</p>\r\n<p><strong>Skvěle zn&iacute; i kolekce &scaron;esti reproduktorů, kter&eacute; dohromady zvl&aacute;daj&iacute; i Spatial Audio</strong> &ndash; prostorov&yacute; zvuk. Naplno si tak budete moci už&iacute;t sn&iacute;mky podporuj&iacute;c&iacute; třeba standard Dolby Atmos. Obrazovka samotn&aacute; na v&aacute;s pak zaz&aacute;ř&iacute; až &scaron;esti sty nity.</p>\r\n<p>Co do rozhran&iacute; pak monitor nab&iacute;dne tři USB-C porty s rychlost&iacute; až deseti gigabitů za sekundu a jeden Thunderbolt port, s pomoc&iacute; kter&eacute;ho můžete z monitoru nab&iacute;jet i notebook. <strong>Monitor v&aacute;s vyjde buďto na 42 990 korun, či 51 990 korun</strong>, pokud budete m&iacute;t z&aacute;jem o sklo s nanotexturou. <strong>Za stojan, kter&yacute; se kromě 30 stupňů rotace pohne i vertik&aacute;lně, si zaplat&iacute;te dvan&aacute;ct tis&iacute;c.</strong> Jak taky u Apple jinak.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '2022-03-09 13:00:45', 1),
(9, 4, 6, 'Google představuje nástroj pro moderaci komentářů na sociálních sítích', 'Google Jigsaw publikuje kód pro open-source nástroj „správce pro obtěžování“. Ten komentáře na novinářských sociálních sítích či sítích celebrit přehodnotí ve své Perspective API a pomůže tak s identifikací urážek a obtěžování. Začíná na Twitteru.', '                        <div>\r\n<p>Google Jigsaw publikuje kód pro open-source nástroj „správce pro obtěžování“. <strong>Ten komentáře na novinářských sociálních sítích či sítích celebrit přehodnotí ve své Perspective API a pomůže tak s identifikací urážek a obtěžování</strong>. Začíná na Twitteru.</p>\r\n<p>Zveřejnění kódu umožňuje vývojářům, aby na něm začali psát své aplikace. <strong>K prvním novinářům se jednodušší způsob moderace dostane někdy v červnu</strong>.</p>\r\n<p>Nástroj rozděluje komentáře podle toxicity na několik vrstev, záleží na míře nadávek, výhružek nebo sprostých slov. <strong>Všechny takové komentáře jsou rozděleny po skupinách v jednom menu</strong>, jejich smazání či nahlášení je tak jednodušší než procházet jeden komentář po druhém v současném moderátorském rozhraní Twitteru. Pokud se pak moderátoři chtějí obsahu zpráv vyhnout, mohou jej nechat rozmazat, a tak s nimi vůbec nepřijdou do kontaktu.</p>\r\n<div>\r\n<p><strong>Správce pro obtěžování také umožňuje stáhnout přímo zprávu se škodlivými zprávami</strong>, aby pak bylo pro majitele účtu v případě přímých výhružek jednodušší incidenty nahlásit na policii.</p>\r\n<p>Nástroj nebyl na Mezinárodní den žen vydán náhodou, <strong>datum vydání má symbolizovat množství sexuálních narážek, které musí nemálokdy zažívat</strong>. Právě tento nástroj by mohl pomoci s jejich redukcí.</p>\r\n<p>Přesto to není jen růžové. <strong>Na stejné logice bylo Googlem postaveno již třeba prohlížečové rozšíření Tune, to bylo ale daleko od dokonalosti</strong>. Jako problémový často označilo i satirický obsah a jako toxické někdy vyhodnocovali i často vhodně využité výrazy hluchý či slepý.</p>\r\n<p>Na rozdíl od služeb postavených na umělé inteligenci, které poskytují sítě samotné, <strong>má tato být spíše pomocníkem pro účty s velkou komentářovou sekcí</strong>. Filtrování právě tady může být totiž manuálně prakticky nezvládnutelné.</p>\r\n</div>\r\n</div>                        ', '2022-03-09 13:28:40', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `role` enum('editor','admin') COLLATE utf8_czech_ci NOT NULL DEFAULT 'editor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `authors`
--

INSERT INTO `authors` (`id`, `name`, `surname`, `password`, `email`, `role`) VALUES
(1, 'Vojtěch', 'Petr', '$2y$10$RVqu0xgIUp7QwWaejOMhouolqIy6c24duiSaBrZBmSw7kWMSUeazW', 'petr@phpnews.tech', 'editor'),
(2, 'Adan', 'Kurfürst ', '$2y$10$RVqu0xgIUp7QwWaejOMhouolqIy6c24duiSaBrZBmSw7kWMSUeazW', 'kurfurst@phpnews.tech', 'editor'),
(3, 'Martin', 'Havlíček', '$2y$10$RVqu0xgIUp7QwWaejOMhouolqIy6c24duiSaBrZBmSw7kWMSUeazW', 'havlicek@phpnews.tech', 'editor'),
(4, 'Karel', 'Vaněk', '$2y$10$RVqu0xgIUp7QwWaejOMhouolqIy6c24duiSaBrZBmSw7kWMSUeazW', 'vanek@phpnews.tech', 'editor'),
(5, 'Michal', 'Burian ', '$2y$10$RVqu0xgIUp7QwWaejOMhouolqIy6c24duiSaBrZBmSw7kWMSUeazW', 'burian@phpnews.tech', 'editor'),
(6, 'Jan', 'Kadlec', '$2y$10$RVqu0xgIUp7QwWaejOMhouolqIy6c24duiSaBrZBmSw7kWMSUeazW', 'ladkan@phpnews.tech', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabulky `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'Steam'),
(3, 'Oneplus'),
(4, 'Lenovo'),
(5, 'Samsung'),
(6, 'Google');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Klíče pro tabulku `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pro tabulku `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
