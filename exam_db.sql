-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 08:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(2, 'Elaina Beahan', '2021-02-24 17:00:45'),
(3, 'Cory Feil', '2021-02-24 17:00:45'),
(4, 'Zander Leffler', '2021-02-24 17:00:45'),
(5, 'Hillary Prosacco', '2021-02-24 17:00:45'),
(6, 'Otis Kris', '2021-02-24 17:00:45'),
(7, 'Ulises Terry', '2021-02-24 17:00:45'),
(8, 'Darrell Watsica', '2021-02-24 17:00:45'),
(9, 'Prof. Chase Nienow', '2021-02-24 17:00:45'),
(10, 'Dr. Ophelia Fahey', '2021-02-24 17:00:45'),
(53, 'Sample Cat', '2021-03-01 02:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`) VALUES
(1, 'North', '2021-02-28 08:04:00'),
(2, 'East', '2021-02-28 08:04:00'),
(3, 'South', '2021-02-28 08:04:00'),
(4, 'West', '2021-02-28 08:04:00'),
(5, 'North West', '2021-02-28 08:04:00'),
(10, 'South22', '2021-03-01 01:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `stocks` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `barcode`, `name`, `price`, `description`, `is_active`, `stocks`, `category_id`, `location_id`, `created_at`) VALUES
(3, '5123126069357', '5123126069357', 1, 'Ducimus doloribus incidunt molestias voluptas rerum quasi enim. Cupiditate possimus perspiciatis id quia illum nisi. Nobis adipisci rerum provident debitis omnis eveniet. Quas distinctio ullam illo.', 1, 138, 4, 1, '2021-02-24 17:00:45'),
(4, '1332523273487', 'Mr. Dwight Goodwin I', 6, 'Perferendis aut aperiam suscipit blanditiis laborum. Tempora adipisci temporibus adipisci esse odio facere. Hic consectetur nesciunt rerum aut eum est cumque. Architecto nihil sint fuga.', 1, 1489, 10, 1, '2021-02-24 17:00:45'),
(5, '8836722319975', 'Ms. Araceli Haag', 0, 'Quae perspiciatis nisi velit alias quae. Provident quae enim at numquam neque. Ut quasi esse officia qui molestiae.', 1, 854, 5, 1, '2021-02-24 17:00:45'),
(6, '5062484029583', 'Marisol Hyatt', 9, 'Numquam quos nemo rerum aut. Cum aspernatur dolorem ab dolorum doloremque. Et iste quam reprehenderit eos et.', 1, 1365, 5, 1, '2021-02-24 17:00:45'),
(7, '7341242801929', 'Bertha Kertzmann', 8, 'Odit quisquam ut dolorum voluptatem. Libero eum dolorem commodi consequatur quia recusandae corrupti. Amet distinctio autem quis temporibus et.', 1, 1392, 6, 1, '2021-02-24 17:00:45'),
(8, '8115600575222', 'Rashawn Stehr', 0, 'Commodi ut suscipit laudantium nobis sapiente voluptatem. Velit officiis quam non voluptas mollitia. Voluptas quod reiciendis voluptatem. Ut cum in aperiam impedit vitae dolorem optio.', 1, 755, 7, 1, '2021-02-24 17:00:45'),
(9, '5724185811972', 'Delfina Howe', 9, 'Fugit labore quaerat repellat eligendi ducimus. Vel accusamus iure quod et id. Ipsa odio ut earum ratione nostrum iste.', 1, 983, 5, 1, '2021-02-24 17:00:45'),
(10, '3096759222074', 'Norma Willms III', 4, 'Id inventore et aut ipsa rerum et. Necessitatibus dolores id nisi repudiandae. Sint doloribus occaecati illo aut. Repellendus quas non rem et nobis et tempore ut.', 1, 1179, 7, 1, '2021-02-24 17:00:45'),
(11, '9456882492197', 'Keyon Hirthe', 1, 'Non natus tempore et consequatur. Earum consequatur et placeat aut. Cupiditate non rerum voluptatem dignissimos et.', 1, 369, 3, 1, '2021-02-24 17:00:45'),
(12, '5579069453362', 'Jason Smitham', 9, 'Asperiores totam quas consequatur quia. Molestias quisquam iusto velit. Quis voluptas sed at et.', 1, 1099, 5, 1, '2021-02-24 17:00:45'),
(13, '9151110546405', 'Dr. Mallie Pollich I', 3, 'Dolores dolore ut praesentium aut. Sit laborum reprehenderit saepe. Eligendi quia rerum id commodi quia.', 1, 823, 2, 1, '2021-02-24 17:00:45'),
(14, '6136746825257', 'Bobby Schmeler', 0, 'Impedit provident est laudantium. Et provident iste ipsam nihil dolor eligendi. Non dolor culpa consequuntur non vero.', 1, 263, 9, 1, '2021-02-24 17:00:45'),
(15, '1287226847704', 'Prof. Luis Okuneva', 0, 'Quo occaecati est deleniti nisi similique illum. Iusto asperiores quidem deleniti eveniet voluptatem.', 1, 124, 5, 1, '2021-02-24 17:00:45'),
(16, '0431689955129', 'Mrs. Muriel Kovacek', 3, 'Asperiores est consequatur sed voluptate cum. Et quibusdam minima quia ex aut. Dolor odit iusto dolores qui fugit veniam nostrum.', 1, 514, 8, 1, '2021-02-24 17:00:45'),
(17, '9707837891467', 'Tania Cormier', 1, 'In voluptas ipsum voluptas. Cumque vitae quis quo et sit quas maiores. Officiis omnis reiciendis quia consequatur.', 1, 358, 4, 1, '2021-02-24 17:00:45'),
(18, '5699826089822', 'Mrs. Greta Glover III', 5, 'Cupiditate sunt velit rem. Iure nihil consequuntur cupiditate omnis. Voluptatum consequatur aliquid quia magni delectus adipisci culpa. Corporis laudantium dolor quia quaerat et consectetur.', 1, 668, 10, 1, '2021-02-24 17:00:45'),
(19, '3060102817859', 'Amina Rempel', 2, 'Omnis ut autem eos animi. Numquam quos animi velit ex vitae.', 1, 1473, 10, 1, '2021-02-24 17:00:45'),
(20, '9033320017114', 'Prof. Adaline Kuvalis', 0, 'Voluptatum iste adipisci tempora quia nemo et quasi consectetur. Quibusdam quia aspernatur odit itaque ex aut aut. Adipisci aut est non. Hic qui eum vel saepe.', 1, 727, 3, 1, '2021-02-24 17:00:45'),
(21, '7025165445032', 'Josefina Gerhold', 3, 'Neque nisi autem est nihil facilis. Modi voluptatem non placeat qui sit a sunt voluptatum. Hic ad autem molestiae nesciunt aut eos cupiditate. Soluta sed repellendus cum accusamus enim quibusdam nam.', 1, 1000, 3, 2, '2021-02-24 17:00:45'),
(23, '6291724353686', 'Joy Smitham', 9, 'Rerum iusto at occaecati vel omnis maiores. Aspernatur ut accusantium praesentium autem laborum quam dolores. Id numquam qui excepturi.', 1, 310, 5, 2, '2021-02-24 17:00:45'),
(24, '6336009678426', 'Lukas Sanford', 9, 'Et voluptas ipsam cumque dignissimos blanditiis ad aut. Sed quam sunt non in. Corrupti ipsam aliquid tenetur eum voluptatem ullam molestiae. Libero qui maxime alias.', 1, 150, 3, 2, '2021-02-24 17:00:45'),
(25, '5568132944869', 'Mrs. Cara Anderson PhD', 7, 'Provident cum qui molestiae ut cumque. A et quod est. Unde sed nulla ipsum voluptatem.', 1, 806, 8, 2, '2021-02-24 17:00:45'),
(26, '8260854084485', 'Jasmin Bernier Sr.', 0, 'Laboriosam quas neque et. Magni id suscipit corrupti repudiandae ut incidunt quo. Error quasi voluptas quo incidunt quis. Dicta repudiandae qui vel numquam ratione repudiandae est.', 1, 314, 6, 2, '2021-02-24 17:00:45'),
(27, '9980346878079', 'Jaqueline Hills', 0, 'Quod numquam cumque quas. Rerum ut ea aut hic quisquam ullam et. Id consequatur necessitatibus dolor quo commodi.', 1, 248, 6, 2, '2021-02-24 17:00:45'),
(28, '7128611482817', 'Prof. Jaron Bergstrom II', 8, 'Inventore atque quidem magnam reiciendis sit nostrum magnam molestias. Nemo ut ea autem et. Nam soluta laboriosam qui dolor id perferendis. Minus ipsa voluptatum quia similique voluptatem.', 1, 569, 6, 2, '2021-02-24 17:00:45'),
(29, '8883847997540', 'Tom Grimes', 3, 'Nam voluptate et aut exercitationem aut et. Illum accusantium explicabo eius et.', 1, 1483, 6, 2, '2021-02-24 17:00:45'),
(30, '4585504306279', 'Patricia Gaylord DVM', 3, 'Enim et eum itaque voluptas. Voluptatem assumenda sunt blanditiis voluptatem fugit totam sit.', 1, 395, 8, 2, '2021-02-24 17:00:45'),
(31, '9739965984988', 'Seamus Turner', 1, 'Quasi at dicta natus. Reiciendis enim ut omnis sint quis. Et quo ad optio repellat fugit.', 1, 1161, 8, 2, '2021-02-24 17:00:45'),
(32, '6970885183034', 'Dr. Kevin Cronin', 6, 'Officiis et quo cumque autem. Est itaque accusamus fugiat consectetur. Eos omnis ut sit culpa voluptas blanditiis et.', 1, 1478, 3, 2, '2021-02-24 17:00:45'),
(34, '6505849813780', 'Kaleb Lang', 5, 'Quis est quia est nesciunt quam. Hic sit excepturi cupiditate distinctio.', 1, 432, 2, 2, '2021-02-24 17:00:45'),
(35, '4285737776756', 'Delilah Schultz', 4, 'Porro consequatur totam excepturi expedita enim. Unde harum velit dignissimos harum. Assumenda officia voluptas animi. Quia rerum non quidem non.', 1, 325, 3, 2, '2021-02-24 17:00:45'),
(36, '8467508077811', 'Madisen Lowe PhD', 4, 'Officia in et distinctio et exercitationem. Molestiae odio qui expedita optio. Dicta nam ut autem quis est nulla impedit. Aspernatur consequatur dolorem aut quia dignissimos.', 1, 1097, 2, 2, '2021-02-24 17:00:45'),
(37, '8405561656000', 'Tara Nicolas', 6, 'Nostrum eos veniam ipsum voluptatum illum qui. Ut ut molestiae commodi molestiae. Ratione molestiae sint quisquam dolorum odit distinctio. Qui expedita natus nam rerum iste voluptatem.', 1, 236, 6, 2, '2021-02-24 17:00:45'),
(38, '4237525201681', 'Jonatan Zemlak', 7, 'Cupiditate nihil nulla eius et omnis sint. Maxime nulla et eveniet vitae. Dignissimos ipsam deserunt sint.', 1, 1277, 7, 2, '2021-02-24 17:00:45'),
(39, '7850306867356', 'Mr. Landen Schowalter II', 3, 'Id quos consequatur aut exercitationem. Sit aut vitae facere quaerat nisi. Voluptatem voluptatem explicabo dolorum aut. Velit inventore optio consequuntur.', 1, 625, 10, 2, '2021-02-24 17:00:45'),
(40, '8597685110015', 'Jeffry Blanda III', 2, 'Modi aut et alias consequatur aut sunt maxime neque. Qui excepturi non ullam porro aliquam. Consequatur blanditiis dolorem ut fugiat harum quia hic.', 1, 736, 3, 2, '2021-02-24 17:00:45'),
(41, '9538513807010', 'Taryn Pollich Sr.', 0, 'Sit doloremque sit necessitatibus voluptatum. Quibusdam assumenda id rem. Voluptatum ratione dolorem rerum nesciunt et veniam. Est animi est velit dicta laudantium.', 1, 272, 6, 3, '2021-02-24 17:00:45'),
(42, '6217185054689', 'Raymond Heller', 6, 'Quis voluptatem qui blanditiis rerum provident sed ullam. Minus quod nemo deleniti saepe quaerat magnam. Ea magnam dolores nihil. Excepturi assumenda tempora ad aut quos maiores consequatur.', 1, 987, 4, 3, '2021-02-24 17:00:45'),
(43, '6643414775986', 'Miss Gabriella Kihn V', 3, 'Tenetur error odio saepe est libero unde. Pariatur impedit enim molestiae et atque sapiente eum quia. Tempora optio quasi esse esse eveniet quasi enim.', 1, 30, 9, 3, '2021-02-24 17:00:45'),
(44, '5981768931629', 'John Oberbrunner', 4, 'Quaerat inventore officia iure quidem eveniet. Sit dolorem qui et id delectus et totam. Velit molestiae et in culpa placeat. Sint dolores amet at sint vero sit molestiae.', 1, 110, 2, 3, '2021-02-24 17:00:45'),
(45, '0727385426156', 'Griffin Hills', 4, 'Quas consequuntur vero odio natus aut est quisquam. Ad fuga hic dicta quibusdam. Nihil dolores eos dignissimos eaque nisi. Totam qui facere ut provident.', 1, 1492, 3, 3, '2021-02-24 17:00:45'),
(46, '4191944577225', 'Dewitt Lockman', 0, 'Perspiciatis dolores sed repudiandae sed maxime aspernatur. Id odit ducimus et totam eos qui. Qui eum illum nihil at natus.', 1, 99, 10, 3, '2021-02-24 17:00:45'),
(48, '6185322305133', 'Velda Jacobs', 3, 'Ex voluptatum quibusdam nesciunt error cumque omnis sed. Quasi similique blanditiis ut et. Cupiditate qui quo doloribus. Et et sed aspernatur nesciunt illum.', 1, 234, 7, 3, '2021-02-24 17:00:45'),
(49, '2688665816754', 'Mrs. Clemmie Cruickshank DVM', 9, 'Et quod voluptas saepe non. Ut quidem voluptatem est placeat et doloribus voluptas.', 1, 227, 3, 3, '2021-02-24 17:00:45'),
(50, '9733502121317', 'Abagail Russel', 7, 'Magnam cumque architecto tempora aspernatur et velit ex. Reprehenderit eos culpa aut commodi. Eos tempora est vel ratione officiis doloremque quae.', 1, 203, 3, 3, '2021-02-24 17:00:45'),
(51, '6655872884520', 'Buddy Bechtelar V', 7, 'Autem minima nobis distinctio veniam velit alias. Et quo ducimus dolorem velit eligendi officia.', 1, 898, 10, 3, '2021-02-24 17:00:45'),
(52, '7924822472421', 'Jacques Nolan', 9, 'Voluptatum fuga similique quia exercitationem sed dolor ad consequatur. Ex sint illo itaque dolorem ut. Et qui alias eius a blanditiis et.', 1, 420, 8, 3, '2021-02-24 17:00:45'),
(53, '3039404179583', 'Mrs. Wendy Keeling', 0, 'Molestiae non rem nostrum eveniet necessitatibus. Optio impedit omnis porro dolores esse.', 1, 1127, 7, 3, '2021-02-24 17:00:45'),
(54, '4452376013881', 'Dr. Soledad Kuhic', 9, 'Consequatur eum vitae dicta et. Consequatur qui ex aliquam voluptas modi. Provident aperiam aut error eaque delectus beatae maxime.', 1, 677, 7, 3, '2021-02-24 17:00:45'),
(55, '4584218525815', 'Alyson Treutel', 8, 'Qui ut distinctio voluptatem dolores dolores et. Consequatur ipsum rerum odio. Culpa officia quasi ipsum sed eligendi.', 1, 716, 4, 3, '2021-02-24 17:00:45'),
(56, '8144724292487', 'Keaton Kovacek', 5, 'Sapiente et cumque blanditiis ut. Porro cumque eveniet labore quam similique doloremque. Dolor ut vel eum aliquam sed ea.', 1, 642, 2, 3, '2021-02-24 17:00:45'),
(57, '4152943086309', 'Woodrow Schaden Sr.', 0, 'Dolorum nemo consequatur perferendis. Voluptate est doloribus praesentium rerum eius quam soluta. Reiciendis unde qui veritatis impedit in quis in.', 1, 1187, 6, 3, '2021-02-24 17:00:45'),
(58, '7847426095448', 'Eden Bernhard', 8, 'In recusandae corporis reiciendis qui quia consequatur ut. Labore perferendis et quaerat odit dolores nemo. Est aspernatur alias quia voluptas commodi. Eligendi asperiores esse fuga.', 1, 875, 5, 3, '2021-02-24 17:00:45'),
(59, '0749877186157', 'Bernie Borer', 5, 'Suscipit aspernatur nam nostrum inventore ad pariatur. Aut laborum ut fugit neque autem consectetur saepe omnis. In necessitatibus qui aut reiciendis adipisci ex delectus.', 1, 983, 3, 3, '2021-02-24 17:00:45'),
(60, '7662982615998', 'Jacklyn Abernathy', 5, 'Libero distinctio consequatur tempora dolores. Non labore assumenda nihil omnis soluta qui sint dignissimos. Ut eius quo et sit officiis ipsam aut. Dolorem optio eos nihil non rerum omnis nobis.', 1, 34, 7, 3, '2021-02-24 17:00:45'),
(61, '9795949546825', 'Guy Larkin', 8, 'Rerum nobis quo sed cum cum. Molestiae ullam perspiciatis est ut autem. Quos recusandae sed libero eligendi. Possimus fuga in ut omnis voluptatem quisquam quae.', 1, 152, 10, 4, '2021-02-24 17:00:45'),
(62, '6002043845529', 'Prof. Hoyt Jacobi DVM', 4, 'Sed aperiam amet illum mollitia quod pariatur autem qui. Quia soluta veniam eligendi et voluptas nisi. Quam reiciendis numquam dolores doloribus. Est aut cum velit delectus.', 1, 110, 6, 4, '2021-02-24 17:00:45'),
(63, '1275617575237', 'Leonel Wilderman', 1, 'Ducimus quo accusamus numquam sed similique et. Recusandae velit vitae quia sint reiciendis autem. Quisquam et distinctio illo temporibus id qui.', 1, 154, 9, 4, '2021-02-24 17:00:45'),
(64, '9738151640028', 'Mr. Mackenzie Hammes', 3, 'Aliquid et perferendis nihil optio facilis. Totam molestiae ipsa dolor animi ipsam cumque. Recusandae est atque autem sint architecto illum. Laborum non earum est assumenda voluptatem esse mollitia.', 1, 1499, 7, 4, '2021-02-24 17:00:45'),
(66, '2738624561086', 'Scot Wiza', 5, 'Suscipit aperiam veritatis placeat ut. A earum optio sit voluptatum. Pariatur et vel est sed voluptas quis libero quasi.', 1, 1247, 2, 4, '2021-02-24 17:00:45'),
(67, '9814209039669', 'Dr. Gayle Schamberger', 7, 'Est laboriosam aut fugiat similique ea repellendus maxime. Quidem magni voluptatem labore. Qui praesentium omnis nemo asperiores. Qui temporibus perspiciatis dolorem id quidem aliquid.', 1, 82, 4, 4, '2021-02-24 17:00:45'),
(68, '5492505545325', 'Jerrold Robel', 7, 'Reiciendis magni qui illum rem quia. Placeat non non aut assumenda a. Blanditiis distinctio ut est. Vel quos maiores aut sunt sit.', 1, 1339, 7, 4, '2021-02-24 17:00:45'),
(69, '9522611078335', 'Chad Cronin', 6, 'Est et quia eligendi maxime pariatur eos omnis. Modi porro fugiat ducimus velit. Sit soluta nam in sit nihil reiciendis.', 1, 114, 4, 4, '2021-02-24 17:00:45'),
(70, '5377094509180', 'Dr. Cornelius Runolfsson', 0, 'Distinctio enim cumque reiciendis est in possimus. Tenetur dolorum ab dicta et sed. Itaque ex voluptas sed qui optio.', 1, 958, 2, 4, '2021-02-24 17:00:45'),
(71, '8698202456552', 'Kim Ondricka', 1, 'Saepe deserunt explicabo suscipit. Blanditiis dicta omnis in deleniti. Optio velit ullam qui placeat. Ut id totam quasi recusandae et ratione.', 1, 14, 8, 4, '2021-02-24 17:00:45'),
(72, '3163458758903', 'Mireille Fisher', 6, 'Odit libero aut mollitia nam quisquam nobis dolore. Quidem et ullam consequatur eligendi. Inventore quae tempora sit quo.', 1, 841, 9, 4, '2021-02-24 17:00:45'),
(74, '1329297259762', 'Abbey Ritchie IV', 0, 'At dolores quod recusandae cupiditate. Voluptas eaque mollitia nemo velit. Repellendus iste repudiandae voluptatem.', 1, 1075, 4, 4, '2021-02-24 17:00:45'),
(75, '7129170201925', 'Mr. Abelardo Harvey Sr.', 7, 'Tenetur eum nesciunt ut. Asperiores veniam non eum aliquid autem voluptas ipsum. Quo illo nostrum laborum impedit laboriosam maiores.', 1, 963, 3, 4, '2021-02-24 17:00:45'),
(76, '8161207404793', 'Prof. Deja Johnston DDS', 6, 'Aliquam non dolores eius ut. Rem et iure reprehenderit ipsam iusto. Quae ad ut non eaque.', 1, 413, 2, 4, '2021-02-24 17:00:45'),
(77, '4837954236294', 'Tristian Jenkins', 3, 'Impedit tempore voluptatem cupiditate ut sed natus expedita. Ut itaque est itaque eos et et et. Quia et perferendis qui facilis.', 1, 438, 6, 4, '2021-02-24 17:00:45'),
(78, '7933690403468', 'Mr. Candelario Kuhn', 0, 'Animi et cum corrupti voluptas voluptas ut cupiditate consequatur. Nobis aperiam optio sed expedita maxime omnis.', 1, 376, 2, 4, '2021-02-24 17:00:45'),
(79, '9754885507475', 'Prof. Adan Schmidt', 1, 'Hic ad et in. Rerum facere harum est est. Sapiente quia laborum qui quae dolores. Qui debitis et repellendus et quia eos dolorem.', 1, 899, 9, 4, '2021-02-24 17:00:45'),
(80, '1346920118340', 'Sheridan Gutkowski', 9, 'Nulla quia voluptas ad ipsa omnis. Nisi repudiandae beatae velit fuga est saepe omnis. Et nostrum dolorum cum et quo.', 1, 1485, 3, 4, '2021-02-24 17:00:45'),
(88, '234324', 'ewfwef', 34, 'wefwefew', 1, 34, 3, 2, NULL),
(89, '23423', 'sssss', 3, 'wefwefew', 0, 344, 2, 2, NULL),
(90, '111111', 'Jofie Bernas', 34, 'wfwfwefwe', 1, 4343, 3, 1, NULL),
(98, '34324324', 'For sample Cat', 24, 'wefwefwef', 1, 4242, 53, 1, '2021-03-01 02:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Jofie', 'jbdev21@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-02-24 17:01:32', '2021-02-24 17:01:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_barcode_unique` (`barcode`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materials_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
