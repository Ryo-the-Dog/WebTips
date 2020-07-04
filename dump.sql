-- MySQL dump 10.13  Distrib 5.7.26, for osx10.9 (x86_64)
--
-- Host: us-cdbr-iron-east-01.cleardb.net    Database: heroku_0c8074435c70d67
-- ------------------------------------------------------
-- Server version	5.5.62-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `allclears`
--

DROP TABLE IF EXISTS `allclears`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allclears` (
  `user_id` bigint(20) unsigned NOT NULL,
  `step_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `allclears_user_id_index` (`user_id`),
  KEY `allclears_step_id_index` (`step_id`),
  CONSTRAINT `allclears_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `steps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `allclears_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allclears`
--

LOCK TABLES `allclears` WRITE;
/*!40000 ALTER TABLE `allclears` DISABLE KEYS */;
/*!40000 ALTER TABLE `allclears` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'語学','2020-05-10 18:42:02','2020-05-10 18:42:02'),(2,'英語','2020-05-10 18:42:02','2020-05-10 18:42:02'),(3,'文学','2020-05-10 18:42:02','2020-05-10 18:42:02'),(4,'法律','2020-05-10 18:42:02','2020-05-10 18:42:02'),(5,'科学','2020-05-10 18:42:02','2020-05-10 18:42:02'),(6,'IT','2020-05-10 18:42:02','2020-05-10 18:42:02'),(7,'プログラミング','2020-05-10 18:42:02','2020-05-10 18:42:02'),(8,'マネー','2020-05-10 18:42:02','2020-05-10 18:42:02'),(9,'ビジネス','2020-05-10 18:42:02','2020-05-10 18:42:02'),(10,'副業','2020-05-10 18:42:02','2020-05-10 18:42:02');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_step`
--

DROP TABLE IF EXISTS `category_step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_step` (
  `category_id` int(10) unsigned NOT NULL,
  `step_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`category_id`,`step_id`),
  KEY `category_step_step_id_foreign` (`step_id`),
  CONSTRAINT `category_step_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `steps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_step_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_step`
--

LOCK TABLES `category_step` WRITE;
/*!40000 ALTER TABLE `category_step` DISABLE KEYS */;
INSERT INTO `category_step` VALUES (6,1),(7,1),(10,1),(1,2),(2,2),(8,3),(9,4),(1,5),(2,5),(9,6),(1,7),(6,8),(5,9),(1,10),(10,11),(4,12),(10,13),(2,14),(6,15),(8,16),(5,17);
/*!40000 ALTER TABLE `category_step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `challenges`
--

DROP TABLE IF EXISTS `challenges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `challenges` (
  `user_id` bigint(20) unsigned NOT NULL,
  `step_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `challenges_user_id_index` (`user_id`),
  KEY `challenges_step_id_index` (`step_id`),
  CONSTRAINT `challenges_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `steps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `challenges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challenges`
--

LOCK TABLES `challenges` WRITE;
/*!40000 ALTER TABLE `challenges` DISABLE KEYS */;
/*!40000 ALTER TABLE `challenges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `childsteps`
--

DROP TABLE IF EXISTS `childsteps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `childsteps` (
  `step_id` bigint(20) unsigned NOT NULL,
  `step_number` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `childsteps_step_id_foreign` (`step_id`),
  CONSTRAINT `childsteps_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `steps` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `childsteps`
--

LOCK TABLES `childsteps` WRITE;
/*!40000 ALTER TABLE `childsteps` DISABLE KEYS */;
INSERT INTO `childsteps` VALUES (1,1,'環境構築①　PCを買う','メーカーはどこでも良いのですが、プログラミングに関する情報はMacを前提としていることが多いのでMacがおすすめです。','2019-08-20 16:20:52','2020-05-04 01:03:20',1),(1,2,'環境構築②　テキストエディタをダウンロードする','まずは無料のソフトをダウンロードしましょう。おすすめはSublime Textというエディタです。','2019-06-29 04:05:28','2020-01-09 05:22:42',2),(1,3,'Progateを受講する','Progateはゲーム感覚でプログラミングを学べるサービスです。\n受講するコースは、HTML・CSSとJavaScriptです。','2020-03-04 23:55:55','2019-09-20 02:07:36',3),(1,4,'ドットインストールを受講する','ドットインストールは動画でプログラミングを学ぶサービスです。\n受講するコースはProgateと同じく、HTML・CSSとJavaScriptです。','2019-05-26 16:44:15','2019-09-09 23:34:31',4),(1,5,'既存のランディングページを探す','MUUUUU.ORGというランディングページを集めたサイトで、真似して制作するサイトを探しましょう。\nここで選ぶサイトは、できるだけ要素の重なりなどが無いシンプルな構図にしてください。','2020-02-29 03:35:59','2019-11-19 08:25:34',5),(1,6,'既存のランディングページを真似して制作する','STEP５で選んだサイトを真似して制作してみましょう。\n基本的に構図はそのまま真似してよいですが、配色・画像・文章は自分で考えた方が実力UPにつながります。\nまたどうしても書き方が分からない場合のみ、デベロッパーツールで確認しましょう。','2020-01-23 13:43:40','2019-09-12 23:50:36',6),(1,7,'クラウドソーシングサイトで仕事を受注する','クラウドワークス・ランサーズ・ココナラなどのクラウドソーシングサイトでランディングページの仕事を受注してみましょう。\n募集数に対して応募数が多いので、初めは受注できないことがほとんどです。そのため数件応募するだけではなく、20件以上応募しましょう','2019-06-07 00:26:25','2019-09-11 08:55:45',7),(2,1,'書籍購入① 「これでわかる英文法中学1~3年―新学習指導要領対応 (中学これでわかる)」','英語の基礎はこの本でバッチリです。','2019-08-18 09:33:34','2019-07-06 14:20:07',8),(2,2,'書籍購入② 「はじめて受けるTOEIC(R) L&Rテスト 全パート完全攻略」','TOEIC初学者の方にピッタリです。','2019-05-18 17:28:54','2020-04-20 13:31:16',9),(2,3,'書籍購入③ 「公式TOEIC　Listening　＆　Reading問題集（5)」','より実際の試験に近い問題集です。','2020-01-28 14:28:46','2019-11-26 21:47:22',10),(2,4,'③の書籍の模試を実施','現時点での自分の実力を確認しましょう。','2019-05-28 00:00:47','2020-04-30 05:46:21',11),(2,5,'①と②の書籍で学習する','約３ヶ月を目安に学習します。','2019-05-17 02:23:51','2019-10-23 22:21:13',12),(2,6,'③の書籍で学習する','基礎ができたらあとは実践のみです。\n約２ヶ月間で２周することを目安に進めましょう。','2020-05-06 04:52:04','2020-02-17 05:47:50',13),(3,1,'証券会社のサイトで口座を開設する','SBI証券が使いやすくておすすめです。','2019-08-03 14:51:48','2020-03-24 04:43:53',14),(3,2,'つみたてNISAに申し込む','つみたてNISAのページから申し込んでください。','2020-01-18 14:37:07','2019-12-30 13:24:08',15),(3,3,'投資信託を購入する','実際に投資信託を購入します。\n「ニッセイ外国株式インデックスファンド」か「ｅＭＡＸＩＳ　Ｓｌｉｍ　全世界株式（除く日本）」が費用が安く、世界経済の成長を享受できるのでおすすめです。','2019-09-18 13:52:08','2019-12-03 09:54:59',16),(3,4,'積立コースを選択する','毎月・毎週・毎日コースから選択します。\nおすすめは毎月コースで、給料日の次の日に設定しておくとお金を使ってしまう前に積み立てられます。\nまた、NISA投資可能枠を全て使いきるための「NISA枠ぎりぎり注文」も設定しておきましょう。','2019-05-16 09:08:14','2019-07-20 23:19:08',17),(4,1,'就業規則で退職を希望してから実際に退職できるまでの期間を確認','企業によって退職を希望する旨を伝えてから実際に退職できるまでにかかる期間が異なります。\n３ヶ月前までに退職願いを提出する必要がある企業などもありますので、退職希望を伝える前に確認しておきましょう。','2020-02-16 03:13:30','2020-01-01 21:55:55',18),(4,2,'転職サイトに登録する','転職サイトで気になる業界や給料・勤務時間などをチェックして、希望に見合う企業を探しましょう。','2019-10-11 17:29:33','2020-03-01 01:00:01',19),(4,3,'上司に退職の旨を伝える','この時に自身の転職活動の状況や有給の残日数なども考慮して、いつ頃に退職したいかを相談してください。\nまた、企業によっては同時に退職願いの提出が必要になるので確認しておきましょう。','2019-08-26 02:40:18','2020-01-13 15:53:42',20),(4,4,'面接を受ける','STEP3の退職の相談と同時並行で面接を受けます。\nもし退職日が決まっているなら、それも面接の際に伝えましょう。','2019-08-02 09:29:21','2019-12-15 10:49:14',21),(4,5,'仕事の引継ぎ','後々トラブルを避けるためにも、自身が抱えている仕事を上司や同僚に全て引き継ぎます。','2019-12-24 01:22:51','2019-12-06 23:07:15',22),(5,1,'書籍で学ぶ','単語：「DUO3.0」\n文法：「中学英語をもう一度ひとつひとつわかりやすく」\n文法：「基礎からの新々総合英語 (チャート式・シリーズ)」\nリスニング：「英語耳[改訂・新CD版] 発音ができるとリスニングができる」','2019-11-13 09:35:52','2019-12-11 09:38:23',23),(5,2,'アプリで学ぶ','リーディング：「英語リーディングアプリPOLYGLOTS（ポリグロッツ）」\nリスニング：「TEDICTライト」','2019-11-28 16:39:34','2020-05-01 21:37:19',24),(5,3,'オンライン英会話スクールを受講する','おすすめは「DMM英会話」です。','2020-02-10 23:17:08','2020-04-14 16:44:03',25),(6,1,'毎月美容院に行く','床屋と比べると美容院は割高ですが、その分オシャレでカッコいいヘアースタイルになれます。','2020-02-05 02:36:22','2019-12-28 18:54:40',26),(6,2,'髭・眉毛・鼻毛の手入れを毎日行う','男性の場合髭だけで十分と考える方もいますが、眉毛がボサボサだとどんなに髪をセットしてもサマになりません。\n必ず毎日手入れをしましょう。','2020-01-11 09:38:53','2019-06-06 22:54:54',27),(6,3,'口臭ケアをする','常にブレスケアを持ち歩きましょう。\nまたクリアクリンなどの洗口液も持ち歩いておくと、時間が無くて歯を磨けない時に便利です。','2019-07-04 11:05:36','2019-05-25 00:02:57',28),(6,4,'ブランド物の靴を買う','オシャレは足元からです。長く使えるので多少奮発しても良い靴を選びましょう。\nおすすめのブランドはお金に余裕のある方は「リーガル」、あまりお金をかけられない方は「ロックポート」です。','2019-05-17 00:17:18','2020-04-09 09:14:00',29),(6,5,'オーダーメイドスーツを買う','最近ではオンラインでもオーダースーツを買うことができます。\n自分の体に合ったスーツを着ましょう。\nおすすめのサイトは「Suit ya」です。','2019-09-16 14:28:34','2019-10-07 08:52:11',30),(7,1,'書籍を購入する','単語帳の場合日常ではあまり使わない単語が出てくるので、文法だけで良いと思います。\nおすすめは「ゼロからスタートスペイン語（文法編） だれにでもわかる文法と発音の基本ルール」です。','2020-04-19 22:31:20','2019-10-09 09:30:56',31),(7,2,'YouTubeでリスニングする','「ProfeDeELE.es」というチャンネルでは基礎の基礎まで網羅しているので、初心者の方にとてもおすすめです。','2019-08-17 15:54:59','2019-05-31 01:02:11',32),(7,3,'スペイン語の映画を鑑賞する','NetFlixで「スペイン映画」と検索をすると、数は少ないですがスペイン映画を見ることができます。\n実際に使われる文章や、会話スピードを実感できます。','2019-10-20 16:34:07','2019-06-05 06:36:38',33),(7,4,'オンラインスクールを受講する','「DMM英会話」では英語だけでなくスペイン語も受講できます。\n無料体験もあるので是非申し込んでみてください。','2020-03-05 17:40:06','2019-09-30 14:55:46',34),(8,1,'コーディングを理解する①','デザイナーが考えたデザイン案を基にエンジニアがコーディングをするため、デザイナーでもHTML・CSSの知識が必要になります。\n「スラスラわかるHTML&CSSの基本」と「HTML5&CSS3標準デザイン講座」という書籍でまずは基礎から学びましょう。','2019-06-26 18:28:06','2019-08-14 21:32:00',35),(8,2,'コーディングを理解する②','書籍の次はオンライン学習ツールでHTML・CSSを学びましょう。\n「Progate」と「ドットインストール」というサイトを使いましょう。\n併せて「Sublime Text」というコーディングするためのテキストエディタというツールもダウンロードしましょう。','2019-08-13 22:20:50','2019-10-25 21:08:57',36),(8,3,'デザインツール「Photoshop」の基礎を学ぶ','デザインツールには「illustrator」もありますが、Photoshopを採用している企業が圧倒的に多いです。\n「Udemy」というオンライン学習サービスで使い方の基礎を学びましょう。','2019-09-08 22:35:53','2019-05-11 04:03:22',37),(8,4,'デザインの知識を得る','まずは「ノンデザイナーズ・デザインブック」という書籍で、デザインとはどういうものなのかを理解しましょう。','2019-09-17 12:23:31','2019-09-08 03:44:17',38),(8,5,'既存サイトから学ぶ','「I/O3000」というサイトにはたくさんのかっこいいサイトが掲載されています。\n当然ただ眺めているだけだと実力は身に付かないので、Photoshopを使ってそのサイトのデザインをそのまま写してみましょう。\nこれを何度も繰り返していけば、確実にデザイン力が身に付きます。','2020-03-16 14:21:06','2019-05-21 03:45:18',39),(9,1,'サンプル','サンプルです。','2018-11-16 07:02:14','2019-02-24 06:37:35',40),(10,1,'サンプル','サンプルです。','2018-12-02 03:26:30','2018-07-21 17:12:34',41),(11,1,'サンプル','サンプルです。','2018-08-19 06:48:45','2019-02-17 19:05:18',42),(12,1,'サンプル','サンプルです。','2018-10-04 20:30:20','2018-05-29 08:43:58',43),(13,1,'サンプル','サンプルです。','2018-07-06 11:49:07','2018-05-14 13:48:31',44),(14,1,'サンプル','サンプルです。','2018-12-26 12:31:27','2018-08-22 18:56:12',45),(15,1,'サンプル','サンプルです。','2019-01-18 09:04:35','2018-06-02 02:21:10',46),(16,1,'サンプル','サンプルです。','2019-03-28 17:16:10','2018-09-16 12:16:55',47),(17,1,'サンプル','サンプルです。','2018-12-31 13:17:31','2018-07-31 01:03:22',48),(18,1,'サンプル','サンプルです。','2018-10-18 07:38:45','2018-06-01 08:48:19',49);
/*!40000 ALTER TABLE `childsteps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clears`
--

DROP TABLE IF EXISTS `clears`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clears` (
  `user_id` bigint(20) unsigned NOT NULL,
  `child_step_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `clears_user_id_index` (`user_id`),
  KEY `clears_child_step_id_index` (`child_step_id`),
  CONSTRAINT `clears_child_step_id_foreign` FOREIGN KEY (`child_step_id`) REFERENCES `childsteps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `clears_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clears`
--

LOCK TABLES `clears` WRITE;
/*!40000 ALTER TABLE `clears` DISABLE KEYS */;
/*!40000 ALTER TABLE `clears` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1811 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (81,'2020_03_16_200010_change_default_value_on_clear_flg_child_steps_table',1),(91,'2020_03_17_122829_add_user_img_on_users_table',1),(101,'2020_03_17_181252_add_introduce_on_users_table',1),(1661,'2014_10_12_000000_create_users_table',2),(1671,'2014_10_12_100000_create_password_resets_table',2),(1681,'2020_03_15_165824_create_steps_table',2),(1691,'2020_03_15_181941_foreign_user_id_to_steps',2),(1701,'2020_03_15_182224_create_child_steps_table',2),(1711,'2020_03_15_184346_create_challenges_table',2),(1721,'2020_03_15_184951_create_categories_table',2),(1731,'2020_03_15_185205_create_category_step_table',2),(1741,'2020_03_17_203244_add_id_on_child_steps_table',2),(1751,'2020_03_18_112623_add_soft_deletes_on_users_table',2),(1761,'2020_03_18_154407_change_step_id_not_cascade_to_cascade_on_child_steps_table',2),(1771,'2020_03_22_182338_create_clears_table',2),(1781,'2020_03_26_222251_create_all_clears_table',2),(1791,'2020_04_25_231858_add_step_img_on_steps_table',2),(1801,'2020_04_29_185109_change_user_id_not_cascade_to_cascade_on_steps_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `steps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `steps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `step_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `steps_user_id_foreign` (`user_id`),
  CONSTRAINT `steps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `steps` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `steps` VALUES (1,1,'最短でweb制作でお金を稼ぐ！',3,'最短でweb制作でお金を稼ぐまでのステップです。\n稼げるようになるまでの難易度が比較的低いとされる、ランディングページを制作できるようになる方法です。','2019-12-31 13:08:45','2019-06-10 20:07:10','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584405/step_sample_1_jju4vo.jpg'),(2,2,'TOEIC初学者が一発で700点取る方法',6,'一発でTOEIC700点取れる方法です。','2019-09-19 19:50:39','2020-01-01 05:53:13','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584403/step_sample_2_s4qayp.jpg'),(3,3,'投資の始め方',1,'今話題のつみたてNISAで投資を始めるまでのステップです。','2019-12-10 15:52:30','2020-03-27 17:53:35','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_3_c4ifrn.jpg'),(4,4,'転職に必要なこと',3,'転職をするまでに必要なことです。','2019-09-15 01:48:48','2019-11-26 03:17:46','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_4_yf076a.jpg'),(5,2,'留学せずに英語の日常会話をマスターしよう',6,'英語を勉強したはずなのに、いざとなると全然話せないという方は多いと思います。\n最低限英語を話せるようになるまでの最短ステップです！','2020-03-30 22:57:05','2019-08-11 16:02:41','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_5_j3suzp.jpg'),(6,3,'できるビジネスマンになろう！',3,'カッコいいビジネスマンになるための秘訣をお教えします。\n職場での信頼感が上がること間違い無しです！','2020-04-18 11:46:11','2019-06-12 08:20:50','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_6_jbm79c.jpg'),(7,5,'スペイン語初級講座',3,'現在中国語、英語に続いて使っている人の多い言語がスペイン語です。\nこれからもスペイン語を使う人は増えていくので、この機会に是非勉強してみてください！','2019-07-21 22:06:30','2020-02-29 18:33:32','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584406/step_sample_7_gevlcs.jpg'),(8,6,'webデザインを学ぼう！',3,'webデザイナーではないけれど、デザインの力を身に付けたいという方におすすめです。','2019-10-22 09:09:40','2019-07-05 22:55:18','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584405/step_sample_8_f7vx8e.png'),(9,3,'テスト用サンプルデータ',14,'テスト用のサンプルデータです。','2019-01-04 14:53:35','2018-11-11 16:23:08',NULL),(10,1,'テスト用サンプルデータ',24,'テスト用のサンプルデータです。','2018-05-21 18:40:18','2018-10-23 07:33:45',NULL),(11,3,'テスト用サンプルデータ',4,'テスト用のサンプルデータです。','2018-10-08 04:31:07','2019-01-08 08:25:53',NULL),(12,4,'テスト用サンプルデータ',15,'テスト用のサンプルデータです。','2018-10-13 15:18:21','2018-09-20 18:13:04',NULL),(13,2,'テスト用サンプルデータ',31,'テスト用のサンプルデータです。','2018-07-02 02:19:34','2018-09-23 08:30:00',NULL),(14,3,'テスト用サンプルデータ',19,'テスト用のサンプルデータです。','2018-11-30 01:27:02','2018-09-29 20:50:41',NULL),(15,5,'テスト用サンプルデータ',9,'テスト用のサンプルデータです。','2018-12-18 19:32:42','2018-07-03 15:49:25',NULL),(16,2,'テスト用サンプルデータ',30,'テスト用のサンプルデータです。','2019-02-14 07:00:50','2018-08-11 14:44:52',NULL),(17,5,'テスト用サンプルデータ',14,'テスト用のサンプルデータです。','2018-12-06 18:27:17','2019-04-04 21:09:19',NULL),(18,1,'テスト用サンプルデータ',21,'テスト用のサンプルデータです。','2018-08-02 21:28:02','2018-05-15 23:12:43',NULL);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ユースケ','yusuke@gmail.com',NULL,'$2y$10$IKHSh/UNkRiN9bONAGmCoeAaVIVZJ5Hx36ChdTmXDOD8Jwxtfb0U2','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584410/user_sample_1_gcpoao.jpg','都内でエンジニアをしています。\n主にプログラミングに関するSTEPを投稿します。','8tQ1so0FFPRLMuNw9MvCrN9g7ee8vgTMNsQAgt2XN6tS9AbQGfAp26PD45un','2020-05-10 18:42:02','2020-05-10 18:42:02',NULL),(2,'Jonny','jonny@gmail.com',NULL,'$2y$10$cOUYeKEcoKS1amSaU6o/0uI0dUrxQy5t4pOPH.BE6dXXVtxze9mEe','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584409/user_sample_2_u9wbpz.jpg','中学校で英語を教えてます。\nみなさんの英語学習をサポートしたいです！','ML7HEBsmq9','2020-05-10 18:42:02','2020-05-10 18:42:02',NULL),(3,'高橋 浩之','hiroyuki@gmail.com',NULL,'$2y$10$eIxJZtQwyzPvHuuro44KY.bEJ6cZ2wH.CnAU0dR3I5IzYrSG6Y.zO','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584407/user_sample_3_jyfs8z.jpg','ビジネスやマネー関連の知識を投稿しています。\nよろしくお願いします！','AUWiONDMBu','2020-05-10 18:42:02','2020-05-10 18:42:02',NULL),(4,'綾乃','ayano@gmail.com',NULL,'$2y$10$UPGjMIlOuriuftP6c0qO6u/OtVXn/dKR02bfMjWkPVt6wmUp2WB4u','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584405/user_sample_4_edwyup.jpg','過去に６回の転職経験があります。\n面接のコツや転職活動に必要な知識を投稿しています。','0p3RE1cffi','2020-05-10 18:42:02','2020-05-10 18:42:02',NULL),(5,'ミキ','miki@gmail.com',NULL,'$2y$10$IVOo.nMovW47cAOBWwwbWO0ln2MwOu1aUjuVMavdLWR7URCPlgBga','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584407/user_sample_5_xoojku.jpg','英語とスペイン語が得意です。\nよろしくお願いします！','9gTNUt9UaD','2020-05-10 18:42:02','2020-05-10 18:42:02',NULL),(6,'木下 由香','yuka@gmail.com',NULL,'$2y$10$xF4AeLSW9tBt2mpTEkS8d.UMY871uykdVsv6ab.ynkO7CabvmXCs.','https://res.cloudinary.com/djix7zcpk/image/upload/v1588584409/user_sample_6_j4okml.jpg','フリーランスのwebデザイナーです。\nデザインが苦手な方は是非私のSTEPを実践してみてください。','w57csv9uzm','2020-05-10 18:42:02','2020-05-10 18:42:02',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-11  1:02:33
