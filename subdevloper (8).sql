-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 03 2020 г., 07:49
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `subdevloper`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 2, 1595768639),
('premium', 3, 1587192077),
('theCreator', 1, 1587278077);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Administrator of this application', NULL, NULL, 1566550627, 1566550627),
('employee', 1, 'Employee of this site/company who has lower rights than admin', NULL, NULL, 1566550627, 1566550627),
('manageUsers', 2, 'Allows admin+ roles to manage users', NULL, NULL, 1566550627, 1566550627),
('member', 1, 'Authenticated user, equal to \"@\"', NULL, NULL, 1566550627, 1566550627),
('premium', 1, 'Premium users. Authenticated users with extra powers', NULL, NULL, 1566550627, 1566550627),
('theCreator', 1, 'You!', NULL, NULL, 1566550627, 1566550627),
('usePremiumContent', 2, 'Allows premium+ roles to use premium content', NULL, NULL, 1566550627, 1566550627);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('theCreator', 'admin'),
('admin', 'employee'),
('admin', 'manageUsers'),
('premium', 'member'),
('employee', 'premium'),
('premium', 'usePremiumContent');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 'O:25:\"backend\\rbac\\rules\\AuthorRule\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1566550627;s:9:\"updatedAt\";i:1566550627;}', 1566550627, 1566550627);

-- --------------------------------------------------------

--
-- Структура таблицы `book_author`
--

CREATE TABLE `book_author` (
  `id` int(10) NOT NULL,
  `fnf` varchar(255) NOT NULL,
  `born_date` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `address` text NOT NULL,
  `status` smallint(6) DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_author`
--

INSERT INTO `book_author` (`id`, `fnf`, `born_date`, `gender`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"uz\":\"Robin Sharma uz\",\"ru\":\"Robin Sharma ru\",\"en\":\"Robin Sharma en\"}', '', 'male', '', 1, '2020-03-10 15:28:26', '2020-03-15 10:37:15'),
(2, '{\"uz\":\"Robert Luis Stivenson uz\",\"ru\":\"Robert Luis Stivenson ru\",\"en\":\"Robert Luis Stivenson en\"}', '', 'male', '', 1, '2020-03-10 15:29:34', '2020-03-15 10:37:42'),
(3, '{\"uz\":\"Юсуф Исмоилов, Шавкат Каримов uz\",\"ru\":\"Юсуф Исмоилов, Шавкат Каримов ru\",\"en\":\"Юсуф Исмоилов, Шавкат Каримов en\"}', '', 'male', '', 1, '2020-03-10 15:32:04', '2020-03-15 10:38:09'),
(4, '{\"uz\":\"Марио Пьюзо uz\",\"ru\":\"Марио Пьюзо ru\",\"en\":\"Марио Пьюзо en\"}', '', 'male', '', 1, '2020-03-10 15:34:44', '2020-03-15 10:38:42'),
(5, '{\"uz\":\"Назар Эшонқул uz\",\"ru\":\"Назар Эшонқул ru\",\"en\":\"Назар Эшонқул en\"}', '', 'male', '', 1, '2020-03-10 15:35:03', '2020-03-15 10:39:07'),
(6, '{\"uz\":\"Фёдор Достоевский uz\",\"ru\":\"Фёдор Достоевский ru\",\"en\":\"Фёдор Достоевский en\"}', '', 'male', '', 1, '2020-03-10 15:35:27', '2020-03-15 10:39:34'),
(7, '{\"uz\":\"Теодор Драйзер uz\",\"ru\":\"Теодор Драйзер ru\",\"en\":\"Теодор Драйзер en\"}', '', 'male', '', 1, '2020-03-10 15:35:48', '2020-03-15 10:40:13'),
(8, '{\"uz\":\"Худойберди Тўхтабоев uz\",\"ru\":\"Худойберди Тўхтабоев ru\",\"en\":\"Худойберди Тўхтабоев en\"}', '', 'male', '', 1, '2020-03-10 15:36:09', '2020-03-15 10:40:35'),
(9, '{\"uz\":\"Гебберт Уэллс uz\",\"ru\":\"Гебберт Уэллс ru\",\"en\":\"Гебберт Уэллс en\"}', '', 'male', '', 1, '2020-03-10 15:36:25', '2020-03-15 10:40:59'),
(10, '{\"uz\":\"Артур Конан Дойл uz\",\"ru\":\"Артур Конан Дойл ru\",\"en\":\"Артур Конан Дойл en\"}', '', 'male', '', 1, '2020-03-10 15:36:41', '2020-03-15 10:41:23'),
(11, '{\"uz\":\"Ўткир Ҳошимов uz\",\"ru\":\"Ўткир Ҳошимовru\",\"en\":\"Ўткир Ҳошимовen\"}', '', 'male', '', 1, '2020-03-10 15:36:58', '2020-03-15 10:41:49'),
(12, '{\"uz\":\"Аҳмад Муҳаммад Турсун uz\",\"ru\":\"Аҳмад Муҳаммад Турсун ru\",\"en\":\"Аҳмад Муҳаммад Турсун en\"}', '', 'male', '', 1, '2020-03-10 15:38:53', '2020-03-15 10:42:15'),
(13, '{\"uz\":\"Александр Сергеевич Пушкин uz\",\"ru\":\"Александр Сергеевич Пушкин ru\",\"en\":\"Александр Сергеевич Пушкин en\"}', '', 'male', '', 1, '2020-03-10 15:39:07', '2020-03-15 10:42:36'),
(14, '{\"uz\":\"Мухторхон Эшон Умархўжа uz\",\"ru\":\"Мухторхон Эшон Умархўжа ru\",\"en\":\"Мухторхон Эшон Умархўжа en\"}', '', 'male', '', 1, '2020-03-10 15:39:27', '2020-03-15 10:36:16'),
(15, '{\"uz\":\"Корней Чуковский uz\",\"ru\":\"Корней Чуковский ru\",\"en\":\"Корней Чуковский en\"}', '', 'male', '', 1, '2020-03-10 15:39:46', '2020-03-15 10:35:54'),
(16, '{\"uz\":\"Генри Марш uz\",\"ru\":\"Генри Марш ru\",\"en\":\"Генри Марш en\"}', '', 'male', '', 1, '2020-03-10 15:40:02', '2020-03-15 10:35:32'),
(17, '{\"uz\":\"Фрэнсис Фицджеральдuz\",\"ru\":\"Фрэнсис Фицджеральд ru\",\"en\":\"Фрэнсис Фицджеральд en\"}', '', 'male', '', 1, '2020-03-10 15:40:18', '2020-03-15 10:35:06'),
(18, '{\"uz\":\"Т.Т.Кельдиев uz\",\"ru\":\"Т.Т.Кельдиев ru\",\"en\":\"Т.Т.Кельдиев en\"}', '', 'male', '', 1, '2020-03-10 15:40:38', '2020-03-15 10:34:37'),
(19, '{\"uz\":\"Джанни Родариuz\",\"ru\":\"Джанни Родариru\",\"en\":\"Джанни Родариen\"}', '', 'male', '', 1, '2020-03-10 15:40:54', '2020-03-15 10:34:07'),
(20, '{\"uz\":\"Жек Лондонuz\",\"ru\":\"Жек Лондонru\",\"en\":\"Жек Лондонen\"}', '', 'male', '', 1, '2020-03-10 15:41:16', '2020-03-15 10:33:42'),
(21, '{\"uz\":\"Миркарим Осим uz\",\"ru\":\"Миркарим Осимru\",\"en\":\"Миркарим Осимen\"}', '', 'male', '', 1, '2020-03-10 15:41:31', '2020-03-15 10:33:19'),
(22, '{\"uz\":\"Ғиёсиддин Юсуф uz\",\"ru\":\"Ғиёсиддин Юсуф ru\",\"en\":\"Ғиёсиддин Юсуф en\"}', '', 'male', '', 1, '2020-03-10 15:43:02', '2020-03-15 10:32:47'),
(23, '{\"uz\":\"Жим Рон uz\",\"ru\":\"Жим Рон ru\",\"en\":\"Жим Рон en\"}', '', 'male', '', 1, '2020-03-10 15:43:25', '2020-03-15 10:32:10'),
(24, '{\"uz\":\"Заҳириддин Муҳамммад Бобурuz\",\"ru\":\"Заҳириддин Муҳамммад Бобурru\",\"en\":\"Заҳириддин Муҳамммад Бобурen\"}', '', 'male', '', 1, '2020-03-10 15:43:43', '2020-03-15 10:31:38'),
(25, '{\"uz\":\"Шерали Қўлдашев uz\",\"ru\":\"Шерали Қўлдашев ru\",\"en\":\"Шерали Қўлдашев en\"}', '', 'male', '', 1, '2020-03-10 15:43:58', '2020-03-15 10:31:14'),
(26, '{\"uz\":\"Насиба Эрхонова, Зуҳра Рўзиева uz\",\"ru\":\"Насиба Эрхонова, Зуҳра Рўзиева ru\",\"en\":\"Насиба Эрхонова, Зуҳра Рўзиева en\"}', '', 'male', '', 1, '2020-03-10 15:44:51', '2020-03-15 10:30:43'),
(27, '{\"uz\":\"Хорхе Луис Борхес uz\",\"ru\":\"Хорхе Луис Борхес uz\",\"en\":\"Хорхе Луис Борхес en\"}', '', 'male', '', 1, '2020-03-10 15:45:12', '2020-03-15 10:30:15'),
(28, '{\"uz\":\"Фахриёрuz\",\"ru\":\"Фахриёрru\",\"en\":\"Фахриёрen\"}', '', 'male', '', 1, '2020-03-10 15:45:30', '2020-03-15 10:29:36'),
(29, '{\"uz\":\"uzuzuz\",\"ru\":\"rururu\",\"en\":\"enene\"}', '', 'male', '', 1, '2020-03-10 15:45:42', '2020-03-15 10:29:16'),
(30, '{\"uz\":\"Лао-Зиuz\",\"ru\":\"Лао-Зиru\",\"en\":\"Лао-Зиen\"}', '', 'male', '', 1, '2020-03-10 15:45:57', '2020-03-15 10:28:38'),
(31, '{\"uz\":\"Марк Твенuz\",\"ru\":\"Марк Твенru\",\"en\":\"Марк Твенen\"}', '', 'male', '', 1, '2020-03-10 15:46:17', '2020-03-15 10:28:17'),
(32, '{\"uz\":\"Антон Чеховuz\",\"ru\":\"Антон Чеховru\",\"en\":\"Антон Чеховen\"}', '', 'male', '', 1, '2020-03-10 15:46:32', '2020-04-16 09:51:40');

-- --------------------------------------------------------

--
-- Структура таблицы `book_category`
--

CREATE TABLE `book_category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `status` smallint(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_category`
--

INSERT INTO `book_category` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, '{\"uz\":\"ILm-fan darsliklaruz\",\"ru\":\"ILm-fan darsliklarru\",\"en\":\"ILm-fan darsliklaren\"}', '2020-03-05 18:15:48', '2020-03-15 07:01:38', 1),
(2, '{\"uz\":\"Diniy adabiyotlaruz\",\"ru\":\"Diniy adabiyotlarru\",\"en\":\"Diniy adabiyotlaren\"}', '2020-03-05 18:16:16', '2020-03-15 07:01:16', 1),
(3, '{\"uz\":\"Bolalar adabiyotiuz\",\"ru\":\"Bolalar adabiyotiru\",\"en\":\"Bolalar adabiyotien\"}', '2020-03-05 18:16:41', '2020-03-15 07:00:56', 1),
(4, '{\"uz\":\"Zamonaviy o\'zbek adabiyotiuz\",\"ru\":\"Zamonaviy o\'zbek adabiyotiru\",\"en\":\"Zamonaviy o\'zbek adabiyotien\"}', '2020-03-05 18:17:28', '2020-03-15 07:00:34', 1),
(5, '{\"uz\":\"Rus adabiyotlaruz\",\"ru\":\"Rus adabiyotlarru\",\"en\":\"Rus adabiyotlaren\"}', '2020-03-05 18:19:24', '2020-03-15 07:00:11', 1),
(6, '{\"uz\":\"Biznes va pisixologiyauz\",\"ru\":\"Biznes va pisixologiyaru\",\"en\":\"Biznes va pisixologiyaen\"}', '2020-03-05 18:19:49', '2020-03-15 06:59:32', 1),
(7, '{\"uz\":\"O\'zbek adabiyotiuz\",\"ru\":\"O\'zbek adabiyotiru\",\"en\":\"O\'zbek adabiyotien\"}', '2020-03-05 18:20:05', '2020-03-15 06:59:10', 1),
(8, '{\"uz\":\"Jahon adabiyotiuz\",\"ru\":\"Jahon adabiyotiru\",\"en\":\"Jahon adabiyotien\"}', '2020-03-05 18:20:26', '2020-03-15 06:58:50', 1),
(9, '{\"uz\":\"Tabbiy fanlaruz\",\"ru\":\"Tabbiy fanlarru\",\"en\":\"Tabbiy fanlaren\"}', '2020-03-05 18:21:31', '2020-04-14 15:47:30', 1),
(10, '{\"uz\":\"Gumanitar fanlaruz\",\"ru\":\"Gumanitar fanlarru\",\"en\":\"Gumanitar fanlaren\"}', '2020-03-05 18:21:52', '2020-03-15 06:58:08', 1),
(11, '{\"uz\":\"Texnikauz\",\"ru\":\"Texnikaru\",\"en\":\"Texnikaen\"}', '2020-03-05 18:22:05', '2020-03-15 06:57:45', 1),
(12, '{\"uz\":\"Dasturlashuz\",\"ru\":\"Dasturlashru\",\"en\":\"Dasturlashen\"}', '2020-03-05 18:22:20', '2020-03-15 06:57:24', 1),
(13, '{\"uz\":\"Talabalar uchunuz\",\"ru\":\"Talabalar uchunru\",\"en\":\"Talabalar uchunen\"}', '2020-03-05 18:22:46', '2020-03-15 06:57:06', 1),
(14, '{\"uz\":\"Abiturientlar uchunuz\",\"ru\":\"Abiturientlar uchunru\",\"en\":\"Abiturientlar uchunen\"}', '2020-03-05 18:24:01', '2020-03-15 06:56:41', 1),
(23, '{\"uz\":\"Matematikauz\",\"ru\":\"Matematikaru\",\"en\":\"Matematikaen\"}', '2020-03-06 06:19:25', '2020-03-15 06:56:19', 1),
(26, '{\"uz\":\"Tabbiyuz\",\"ru\":\"Tabbiyru\",\"en\":\"Tabbiyen\"}', '2020-03-07 04:39:33', '2020-04-16 09:37:55', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `book_image`
--

CREATE TABLE `book_image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `book_order`
--

CREATE TABLE `book_order` (
  `id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `qty` int(10) NOT NULL,
  `sum` float NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `region_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_order`
--

INSERT INTO `book_order` (`id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `region_id`, `city_id`, `address`) VALUES
(1, '2020-04-16 01:59:58', '2020-04-16 01:59:58', 4, 114000, 0, 'Usmonkulov Bobur Raxmatulla o\'g\'li', 'usmonkulov5@gmail.com', '+998(90) 655-05-43', 7, 79, 'Lalmikor MFY Qo\'ng\'ir ot qishlog\'i'),
(2, '2020-04-16 02:10:23', '2020-04-16 02:10:23', 5, 89400, 0, 'Usmonkulov Bobur Raxmatulla o\'g\'li', 'usmonkulov5@gmail.com', '+998(90) 655-05-43', 7, 79, 'Lalmikor MFY Qo\'ng\'ir ot qishlog\'i'),
(3, '2020-04-16 04:56:14', '2020-04-16 04:56:14', 3, 63000, 0, 'Usmonkulov Bobur Raxmatulla o\'g\'li', '', '+998906550543', 7, 79, 'Lalmikor MFY Qo\'ng\'ir Ot qishlog\'i'),
(4, '2020-04-16 04:58:18', '2020-04-16 04:58:18', 6, 132555, 0, 'Usmonkulov Bobur Raxmatulla o\'g\'li', '', '+998(90) 655-05-43', 7, 79, 'Lalmikor MFY Qo\'ng\'ir ot qishlog\'i'),
(5, '2020-04-16 05:03:14', '2020-04-16 05:03:14', 1, 30000, 0, 'Usmonkulov Bobur Raxmatulla o\'g\'li', '', '+998(90) 655-05-43', 7, 79, 'Lalmikor MFY Qo\'ng\'ir ot qishlog\'i'),
(6, '2020-04-16 05:04:32', '2020-04-16 05:04:32', 1, 4200, 0, 'Usmonkulov Bobur Raxmatulla o\'g\'li', '', '+998(90) 655-05-43', 7, 79, 'Lalmikor MFY Qo\'ng\'ir ot qishlog\'i'),
(7, '2020-04-16 05:06:42', '2020-04-16 05:06:42', 4, 52110, 0, 'Usmonkulov Bobur Raxmatulla o\'g\'li', 'usmonkulov5@gmail.com', '+998(90) 655-05-43', 7, 79, 'Lalmikor MFY Qo\'ng\'ir ot qishlog\'i'),
(8, '2020-04-16 09:23:09', '2020-04-16 09:23:09', 1, 4200, 0, 'Usmonkulov Bobur Raxmatulla o\'g\'li', '', '+998(90) 655-05-43', 7, 79, 'Lalmikor MFY Qo\'ng\'ir ot qishlog\'i'),
(9, '2020-04-16 15:28:08', '2020-04-16 15:28:08', 5, 106555, 0, 'Usmonkulov Bobur Raxmatulla o\'g\'li', 'usmonkulov5@gmail.com', '+998(90) 655-05-43', 7, 79, 'Lalmikor MFY Qo\'ng\'ir ot qishlog\'i'),
(10, '2020-05-20 15:52:36', '2020-05-20 15:52:36', 12, 192000, 0, 'Usmonqulova Shoxista', 'usmonkulov5@gmail.com', '+998906550543', 7, 79, 'Lalmikor MFY Qo\'ng\'ir ot qishlog\'i'),
(11, '2020-05-31 16:43:59', '2020-05-31 16:43:59', 5, 109000, 0, 'Usmonkulov Bobur Raxmatulla o\'g\'li', 'usmonkulov5@gmail.com', '+998(97) 919-05-43', 7, 79, 'Lalmikor MFY Qo\'ng\'ir ot qishlog\'i');

-- --------------------------------------------------------

--
-- Структура таблицы `book_order_items`
--

CREATE TABLE `book_order_items` (
  `id` int(10) NOT NULL,
  `book_order_id` int(10) NOT NULL,
  `book_product_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int(10) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_order_items`
--

INSERT INTO `book_order_items` (`id`, `book_order_id`, `book_product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
(1, 1, 17, 'uz', 30000, 1, 30000),
(2, 1, 14, 'Қаттиқ муқоваuz', 30000, 1, 30000),
(3, 1, 8, 'Қатлномаuz', 33000, 1, 33000),
(4, 1, 9, 'Кеча ва кундузuz', 21000, 1, 21000),
(5, 2, 17, 'uz', 30000, 1, 30000),
(6, 2, 11, 'dwdwuz', 21000, 1, 21000),
(7, 2, 14, 'Қаттиқ муқоваuz', 30000, 1, 30000),
(8, 3, 5, 'Чўқинтирган ота 2uz', 21000, 2, 42000),
(9, 3, 6, 'Темур Тузуклариuz', 21000, 1, 21000),
(10, 4, 12, 'uzuzu', 555, 1, 555),
(11, 4, 10, 'гулларuz', 21000, 1, 21000),
(12, 4, 11, 'dwdwuz', 21000, 1, 21000),
(13, 4, 17, 'uz', 30000, 1, 30000),
(14, 4, 14, 'Қаттиқ муқоваuz', 30000, 2, 60000),
(15, 5, 17, 'uz', 30000, 1, 30000),
(16, 7, 14, 'Қаттиқ муқоваuz', 30000, 1, 30000),
(17, 7, 15, 'Молхонаuz', 555, 1, 555),
(18, 7, 11, 'dwdwuz', 21000, 1, 21000),
(19, 7, 12, 'uzuzu', 555, 1, 555),
(20, 9, 12, 'uzuzu', 555, 1, 555),
(21, 9, 13, 'Молхонаuz', 34000, 1, 34000),
(22, 9, 14, 'Қаттиқ муқоваuz', 30000, 1, 30000),
(23, 9, 6, 'Темур Тузуклариuz', 21000, 1, 21000),
(24, 9, 10, 'гулларuz', 21000, 1, 21000),
(25, 10, 7, 'Отаuz', 16000, 12, 192000),
(26, 11, 17, 'uz', 30000, 1, 30000),
(27, 11, 11, 'dwdwuz', 21000, 1, 21000),
(28, 11, 9, 'Кеча ва кундузuz', 21000, 1, 21000),
(29, 11, 7, 'Отаuz', 16000, 1, 16000),
(30, 11, 5, 'Чўқинтирган ота 2uz', 21000, 1, 21000);

-- --------------------------------------------------------

--
-- Структура таблицы `book_product`
--

CREATE TABLE `book_product` (
  `id` int(10) NOT NULL,
  `book_category_id` int(10) NOT NULL,
  `book_author_id` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `content` text,
  `price` float DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'по-image.png',
  `status` smallint(6) DEFAULT '0',
  `hit` enum('0','1') NOT NULL DEFAULT '0',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `sale` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_product`
--

INSERT INTO `book_product` (`id`, `book_category_id`, `book_author_id`, `name`, `content`, `price`, `keywords`, `description`, `img`, `status`, `hit`, `new`, `sale`, `created_at`, `updated_at`) VALUES
(2, 8, 4, '{\"uz\":\"гулларuz\",\"oz\":\"\",\"ru\":\"гулларru\",\"en\":\"гулларen\"}', '{\"uz\":\"<p>гулларuz<\\/p>\\r\\n\",\"oz\":\"\",\"ru\":\"<p>гулларru<\\/p>\\r\\n\",\"en\":\"<p>гулларen<\\/p>\\r\\n\"}', 34000, '{\"uz\":\"гулларuz\",\"oz\":\"\",\"ru\":\"гулларru\",\"en\":\"гулларen\"}', '{\"uz\":\"гулларuz\",\"oz\":\"\",\"ru\":\"гулларru\",\"en\":\"гулларen\"}', 'uploads/upload/book-productss/image/15868822355e95e6bb80e084.96026888.png', 1, '1', '0', '0', '2020-03-06 08:39:26', '2020-04-14 16:37:15'),
(3, 8, 3, '{\"uz\":\"1984 (Қаттиқ муқова)uz\",\"ru\":\"1984 (Қаттиқ муқова)ru\",\"en\":\"1984 (Қаттиқ муқова)en\"}', '{\"uz\":\"<p>1984 (Қаттиқ муқова)uz<\\/p>\\r\\n\",\"ru\":\"<p>1984 (Қаттиқ муқова)uz<\\/p>\\r\\n\",\"en\":\"<p>1984 (Қаттиқ муқова)en<\\/p>\\r\\n\"}', 30000, '{\"uz\":\"1984 (Қаттиқ муқова)uz\",\"ru\":\"1984 (Қаттиқ муқова)uz\",\"en\":\"1984 (Қаттиқ муқова)en\"}', '{\"uz\":\"1984 (Қаттиқ муқова)uz\",\"ru\":\"1984 (Қаттиқ муқова)uz\",\"en\":\"1984 (Қаттиқ муқова)en\"}', 'uploads/upload/book-productss/image/15834847935e620f794f0450.58962486.jpg', 1, '1', '0', '0', '2020-03-06 08:53:13', '2020-03-15 07:50:04'),
(4, 8, 27, '{\"uz\":\"Молхонаuz\",\"ru\":\"Молхонаru\",\"en\":\"Молхонаen\"}', '{\"uz\":\"<h4>Молхонаuz<\\/h4>\\r\\n\",\"ru\":\"<p>Молхонаru<\\/p>\\r\\n\",\"en\":\"<p>Молхонаen<\\/p>\\r\\n\"}', 12000, '{\"uz\":\"Молхонаuz\",\"ru\":\"Молхонаru\",\"en\":\"Молхонаen\"}', '{\"uz\":\"Молхонаuz\",\"ru\":\"Молхонаru\",\"en\":\"Молхонаen\"}', 'uploads/upload/book-productss/image/15834922835e622cbb20bd55.02207817.jpeg', 1, '1', '0', '0', '2020-03-06 08:59:25', '2020-03-15 07:51:18'),
(5, 8, 32, '{\"uz\":\"Чўқинтирган ота 2uz\",\"ru\":\"Чўқинтирган ота 2ru\",\"en\":\"Чўқинтирган ота 2en\"}', '{\"uz\":\"<p>Чўқинтирган ота 2uz<\\/p>\\r\\n\",\"ru\":\"<p>Чўқинтирган ота 2ru<\\/p>\\r\\n\",\"en\":\"<p>en<\\/p>\\r\\n\"}', 21000, '{\"uz\":\"Чўқинтирган ота 2uz\",\"ru\":\"Чўқинтирган ота 2ru\",\"en\":\"Чўқинтирган ота 2en\"}', '{\"uz\":\"Чўқинтирган ота 2uz\",\"ru\":\"Чўқинтирган ота 2ru\",\"en\":\"Чўқинтирган ота 2en\"}', 'uploads/upload/book-productss/image/15834861795e6214e3f21cb6.75282374.jpg', 1, '1', '0', '0', '2020-03-06 09:16:19', '2020-03-15 07:52:40'),
(6, 7, 29, '{\"uz\":\"Темур Тузуклариuz\",\"ru\":\"Темур Тузуклариru\",\"en\":\"Темур Тузуклариen\"}', '{\"uz\":\"<p>Темур Тузуклариuz<\\/p>\\r\\n\",\"ru\":\"<p>Темур Тузуклариru<\\/p>\\r\\n\",\"en\":\"<p>Темур Тузуклариru<\\/p>\\r\\n\"}', 21000, '{\"uz\":\"Темур Тузуклариuz\",\"ru\":\"Темур Тузуклариru\",\"en\":\"Темур Тузуклариru\"}', '{\"uz\":\"Темур Тузуклариuz\",\"ru\":\"Темур Тузуклариru\",\"en\":\"Темур Тузуклариru\"}', 'uploads/upload/book-productss/image/15834864335e6215e1a2ebb8.94517774.jpg', 0, '1', '0', '0', '2020-03-06 09:20:33', '2020-04-20 10:01:27'),
(7, 7, 4, '{\"uz\":\"Отаuz\",\"ru\":\"Отаru\",\"en\":\"Отаen\"}', '{\"uz\":\"<p>Отаuz<\\/p>\\r\\n\",\"ru\":\"<p>Отаru<\\/p>\\r\\n\",\"en\":\"<p>Отаru<\\/p>\\r\\n\"}', 16000, '{\"uz\":\"Отаuz\",\"ru\":\"Отаru\",\"en\":\"Отаru\"}', '{\"uz\":\"Отаuz\",\"ru\":\"Отаru\",\"en\":\"Отаru\"}', 'uploads/upload/book-productss/image/15834866005e621688ae3996.09898690.jpg', 1, '1', '0', '0', '2020-03-06 09:23:20', '2020-03-15 07:55:04'),
(8, 7, 27, '{\"uz\":\"Қатлномаuz\",\"ru\":\"Қатлномаru\",\"en\":\"Қатлномаen\"}', '{\"uz\":\"<p>Қатлномаuz<\\/p>\\r\\n\",\"ru\":\"<p>Қатлномаru<\\/p>\\r\\n\",\"en\":\"<p>Қатлномаen<\\/p>\\r\\n\"}', 33000, '{\"uz\":\"Қатлномаuz\",\"ru\":\"Қатлномаru\",\"en\":\"Қатлномаen\"}', '{\"uz\":\"Қатлномаuz\",\"ru\":\"Қатлномаru\",\"en\":\"Қатлномаen\"}', 'uploads/upload/book-productss/image/15834867735e6217359a6065.22198632.png', 1, '1', '0', '0', '2020-03-06 09:26:13', '2020-03-15 07:56:01'),
(9, 7, 15, '{\"uz\":\"Кеча ва кундузuz\",\"ru\":\"Кеча ва кундузru\",\"en\":\"Кеча ва кундузen\"}', '{\"uz\":\"<p>Кеча ва кундузuz<\\/p>\\r\\n\",\"ru\":\"<p>Кеча ва кундузru<\\/p>\\r\\n\",\"en\":\"<p>Кеча ва кундузen<\\/p>\\r\\n\"}', 21000, '{\"uz\":\"Кеча ва кундузuz\",\"ru\":\"Кеча ва кундузru\",\"en\":\"Кеча ва кундузen\"}', '{\"uz\":\"Кеча ва кундузuz\",\"ru\":\"Кеча ва кундузru\",\"en\":\"Кеча ва кундузen\"}', 'uploads/upload/book-productss/image/15834871215e6218916f44b2.03152534.jpg', 1, '1', '0', '0', '2020-03-06 09:32:01', '2020-04-14 15:48:15'),
(10, 1, 15, '{\"uz\":\"гулларuz\",\"ru\":\"гулларru\",\"en\":\"гулларen\"}', '{\"uz\":\"<p>гулларuz<\\/p>\\r\\n\",\"ru\":\"<p>гулларru<\\/p>\\r\\n\",\"en\":\"<p>гулларen<\\/p>\\r\\n\"}', 21000, '{\"uz\":\"гулларuz\",\"ru\":\"гулларru\",\"en\":\"гулларen\"}', '{\"uz\":\"гулларuz\",\"ru\":\"гулларru\",\"en\":\"гулларen\"}', 'uploads/upload/book-productss/image/15835617695e633c29d962d0.94092553.jpg', 1, '1', '0', '0', '2020-03-07 06:16:09', '2020-03-15 07:59:16'),
(11, 1, 9, '{\"uz\":\"dwdwuz\",\"ru\":\"dwdwru\",\"en\":\"dwdwen\"}', '{\"uz\":\"<p>dwdwuz<\\/p>\\r\\n\",\"ru\":\"<p>dwdwru<\\/p>\\r\\n\",\"en\":\"<p>dwdwen<\\/p>\\r\\n\"}', 21000, '{\"uz\":\"dwdwuz\",\"ru\":\"dwdwru\",\"en\":\"dwdwen\"}', '{\"uz\":\"dwdwuz\",\"ru\":\"dwdwru\",\"en\":\"dwdwen\"}', 'uploads/upload/book-productss/image/15835618045e633c4c2c0d30.21941560.jpg', 1, '1', '0', '0', '2020-03-07 06:16:44', '2020-04-20 10:01:43'),
(12, 1, 4, '{\"uz\":\"uzuzu\",\"ru\":\"rurur\",\"en\":\"enenen\"}', '{\"uz\":\"<p>uzuzu<\\/p>\\r\\n\",\"ru\":\"<p>rurur<\\/p>\\r\\n\",\"en\":\"<p>venenen<\\/p>\\r\\n\"}', 555, '{\"uz\":\"uzuzu\",\"ru\":\"rurur\",\"en\":\"enenen\"}', '{\"uz\":\"uzuzu\",\"ru\":\"vrurur\",\"en\":\"venenen\"}', 'uploads/upload/book-productss/image/15835618315e633c67a687b8.65761312.jpeg', 1, '1', '0', '0', '2020-03-07 06:17:11', '2020-03-15 08:02:30'),
(13, 1, 28, '{\"uz\":\"Молхонаuz\",\"ru\":\"Молхонаru\",\"en\":\"Молхонаen\"}', '{\"uz\":\"<p>Молхонаuz<\\/p>\\r\\n\",\"ru\":\"<p>Молхонаru<\\/p>\\r\\n\",\"en\":\"<p>Молхонаen<\\/p>\\r\\n\"}', 34000, '{\"uz\":\"Молхонаuz\",\"ru\":\"Молхонаru\",\"en\":\"Молхонаen\"}', '{\"uz\":\"Молхонаuz\",\"ru\":\"Молхонаru\",\"en\":\"Молхонаen\"}', 'uploads/upload/book-productss/image/15835618715e633c8fb53943.75524333.jpg', 1, '1', '0', '0', '2020-03-07 06:17:51', '2020-03-15 08:00:18'),
(14, 1, 24, '{\"uz\":\"Қаттиқ муқоваuz\",\"ru\":\"Қаттиқ муқоваru\",\"en\":\"Қаттиқ муқоваen\"}', '{\"uz\":\"<p>Қаттиқ муқоваuz<\\/p>\\r\\n\",\"ru\":\"<p>Қаттиқ муқоваru<\\/p>\\r\\n\",\"en\":\"<p>Қаттиқ муқоваen<\\/p>\\r\\n\"}', 30000, '{\"uz\":\"Қаттиқ муқоваuz\",\"ru\":\"Қаттиқ муқоваru\",\"en\":\"Қаттиқ муқоваen\"}', '{\"uz\":\"Қаттиқ муқоваuz\",\"ru\":\"Қаттиқ муқоваru\",\"en\":\"Қаттиқ муқоваen\"}', 'uploads/upload/book-productss/image/15835619035e633cafe56539.17606631.jpg', 1, '1', '0', '0', '2020-03-07 06:18:23', '2020-03-15 07:56:58'),
(15, 7, 9, '{\"uz\":\"Молхонаuz\",\"ru\":\"Молхонаru\",\"en\":\"Молхонаen\"}', '{\"uz\":\"<p>Молхонаuz<\\/p>\\r\\n\",\"ru\":\"<p>Молхонаru<\\/p>\\r\\n\",\"en\":\"<p>Молхонаen<\\/p>\\r\\n\"}', 555, '{\"uz\":\"Молхонаuz\",\"ru\":\"Молхонаru\",\"en\":\"Молхонаen\"}', '{\"uz\":\"Молхонаuz\",\"ru\":\"Молхонаru\",\"en\":\"Молхонаen\"}', '', 1, '1', '0', '0', '2020-03-08 06:40:32', '2020-03-15 07:46:28'),
(16, 3, 3, '{\"uz\":\"uz\",\"ru\":\"ru\",\"en\":\"en\"}', '{\"uz\":\"<p>uz<\\/p>\\r\\n\",\"ru\":\"<p>ru<\\/p>\\r\\n\",\"en\":\"<p>en<\\/p>\\r\\n\"}', 25000, '{\"uz\":\"uz\",\"ru\":\"ru\",\"en\":\"en\"}', '{\"uz\":\"uz\",\"ru\":\"ru\",\"en\":\"en\"}', '', 1, '1', '0', '0', '2020-03-15 07:34:38', '2020-03-15 07:38:36'),
(17, 4, 3, '{\"uz\":\"uz\",\"ru\":\"ru\",\"en\":\"en\"}', '{\"uz\":\"<p>uz<\\/p>\\r\\n\",\"ru\":\"<p>ru<\\/p>\\r\\n\",\"en\":\"<p>en<\\/p>\\r\\n\"}', 30000, '{\"uz\":\"uz\",\"ru\":\"ru\",\"en\":\"en\"}', '{\"uz\":\"uz\",\"ru\":\"ru\",\"en\":\"en\"}', '', 1, '1', '0', '0', '2020-03-15 07:39:54', '2020-03-15 08:06:35'),
(18, 4, NULL, '{\"uz\":\"\",\"ru\":\"\",\"en\":\"\"}', '{\"uz\":\"<p>uz<\\/p>\\r\\n\",\"ru\":\"<p>ru<\\/p>\\r\\n\",\"en\":\"<p>en<\\/p>\\r\\n\"}', 4200, '{\"uz\":\"uz\",\"ru\":\"ru\",\"en\":\"en\"}', '{\"uz\":\"uz\",\"ru\":\"ru\",\"en\":\"en\"}', '', 1, '1', '0', '0', '2020-03-15 11:28:58', '2020-03-15 12:16:54'),
(19, 5, NULL, '{\"uz\":\"\",\"ru\":\"\",\"en\":\"\"}', '{\"uz\":\"\",\"ru\":\"\",\"en\":\"\"}', 555, '{\"uz\":\"\",\"ru\":\"\",\"en\":\"\"}', '{\"uz\":\"\",\"ru\":\"\",\"en\":\"\"}', '', 1, '0', '0', '0', '2020-03-15 12:20:08', '2020-04-16 11:35:17'),
(20, 3, NULL, '{\"uz\":\"\",\"ru\":\"\",\"en\":\"\"}', '{\"uz\":\"\",\"ru\":\"\",\"en\":\"\"}', NULL, '{\"uz\":\"\",\"ru\":\"\",\"en\":\"\"}', '{\"uz\":\"\",\"ru\":\"\",\"en\":\"\"}', '', 1, '0', '0', '0', '2020-03-15 12:27:56', '2020-04-16 11:35:24');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `status` smallint(6) DEFAULT '0',
  `color` smallint(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `created_at`, `updated_at`, `status`, `color`) VALUES
(1, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Jquery\"}', '2020-03-21 16:38:47', '2020-03-26 05:59:03', 1, 3),
(2, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Css\"}', '2020-03-21 16:40:02', '2020-03-24 04:52:26', 1, 4),
(3, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"JavaScript\"}', '2020-03-21 16:40:27', '2020-03-24 05:37:36', 1, 2),
(4, '{\"uz\":\"Veb dizayner\",\"oz\":\"Веб-дизайн\",\"ru\":\"Веб дизайн\",\"en\":\"Web Design\"}', '2020-03-21 16:41:01', '2020-04-13 10:28:32', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `region_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`, `region_id`) VALUES
(1, '{\"uz\":\"Oltinko‘l tumani\",\"oz\":\"Олтинкўл тумани\",\"ru\":\"Алтынкульский район\",\"en\":\"Oltinkol District\"}', 1),
(2, '{\"uz\":\"Andijon tumani\",\"oz\":\"Андижон тумани\",\"ru\":\"Андижанский район\",\"en\":\"Andijan District\"}', 1),
(3, '{\"uz\":\"Asaka tumani\",\"oz\":\"Асака тумани\",\"ru\":\"Асакинский район\",\"en\":\"Asaka District\"}', 1),
(4, '{\"uz\":\"Baliqchi tumani\",\"oz\":\"Балиқчи тумани\",\"ru\":\"Балыкчинский район\",\"en\":\"Baliqchi District\"}', 1),
(5, '{\"uz\":\"Bo‘z tumani\",\"oz\":\"Бўз тумани\",\"ru\":\"Бозский район\",\"en\":\"Boz District\"}', 1),
(6, '{\"uz\":\"Buloqboshi tumani\",\"oz\":\"Булоқбоши тумани\",\"ru\":\"Булакбашинский район\",\"en\":\"Buloqboshi District\"}', 1),
(7, '{\"uz\":\"Jalolquduq tumani\",\"oz\":\"Жалолқудуқ тумани\",\"ru\":\"Джалакудукский район\",\"en\":\"Jalalkuduk District\"}', 1),
(8, '{\"uz\":\"Izboskan tumani\",\"oz\":\"Избоскан тумани\",\"ru\":\"Избасканский район\",\"en\":\"Izboskan District\"}', 1),
(9, '{\"uz\":\"Qo‘rg‘ontepa tumani\",\"oz\":\"Қўрғонтепа тумани\",\"ru\":\"Кургантепинский район\",\"en\":\"Kurgontepa District\"}', 1),
(10, '{\"uz\":\"Marhamat tumani\",\"oz\":\"Марҳамат тумани\",\"ru\":\"Мархаматский район\",\"en\":\"Marhamat District\"}', 1),
(11, '{\"uz\":\"Paxtaobod tumani\",\"oz\":\"Пахтаобод тумани\",\"ru\":\"Пахтаабадский район\",\"en\":\"Pakhtaabad District\"}', 1),
(12, '{\"uz\":\"Ulug‘nor tumani\",\"oz\":\"Улуғнор тумани\",\"ru\":\"Улугнорский район\",\"en\":\"Ulugnor District\"}', 1),
(13, '{\"uz\":\"Xo‘jaobod tumani\",\"oz\":\"Хўжаобод тумани\",\"ru\":\"Ходжаабадский район\",\"en\":\"Khodjaobad Distric\"}', 1),
(14, '{\"uz\":\"Shaxrixon tumani\",\"oz\":\"Шахрихон тумани\",\"ru\":\"Шахриханский район\",\"en\":\"Shakhrihon District\"}', 1),
(15, '{\"uz\":\"Andijon shahar\",\"oz\":\"Андижон шаҳар\",\"ru\":\"Город Андижан\",\"en\":\"Andijon city\"}', 1),
(16, '{\"uz\":\"Xonobod shahar\",\"oz\":\"Хонобод шаҳар\",\"ru\":\"Город Ханабад\",\"en\":\"Xonobod city\"}', 1),
(17, '{\"uz\":\"Olot tumani\",\"oz\":\"Олот тумани\",\"ru\":\"Алатский район\",\"en\":\"Alat District\"}', 2),
(18, '{\"uz\":\"Buxoro tumani\",\"oz\":\"Бухоро тумани\",\"ru\":\"Бухарский район\",\"en\":\"Bukhara District\"}', 2),
(19, '{\"uz\":\"Vobkent tumani\",\"oz\":\"Вобкент тумани\",\"ru\":\"Вабкентский район\",\"en\":\"Vobkent city\"}', 2),
(20, '{\"uz\":\"G‘ijduvon tumani\",\"oz\":\"Ғиждувон тумани\",\"ru\":\"Гиждуванский район\",\"en\":\"Gijduvan District\"}', 2),
(21, '{\"uz\":\"Jondor tumani\",\"oz\":\"Жондор тумани\",\"ru\":\"Жондорский район\",\"en\":\"Jondor District\"}', 2),
(22, '{\"uz\":\"Kogon tumani\",\"oz\":\"Когон тумани\",\"ru\":\"Каганский район\",\"en\":\"Kagan District\"}', 2),
(23, '{\"uz\":\"Qorako‘l tumani\",\"oz\":\"Қоракўл тумани\",\"ru\":\"Каракульский район\",\"en\":\"Karakul District\"}', 2),
(24, '{\"uz\":\"Qorovulbozor tumani\",\"oz\":\"Қоровулбозор тумани\",\"ru\":\"Караулбазарский район\",\"en\":\"Karaulbazar District\"}', 2),
(25, '{\"uz\":\"Peshku tumani\",\"oz\":\"Пешку тумани\",\"ru\":\"Пешкунский район\",\"en\":\"Peshku District\"}', 2),
(26, '{\"uz\":\"Romitan tumani\",\"oz\":\"Ромитан тумани\",\"ru\":\"Ромитанский район\",\"en\":\"Romitan District\"}', 2),
(27, '{\"uz\":\"Shofirkon tumani\",\"oz\":\"Шофиркон тумани\",\"ru\":\"Шафирканский район\",\"en\":\"Shafirkan District\"}', 2),
(28, '{\"uz\":\"Buxoro shahar\",\"oz\":\"Бухоро шаҳар\",\"ru\":\"Город Бухара\",\"en\":\"Vabkent District\"}', 2),
(29, '{\"uz\":\"Arnasoy tumani\",\"oz\":\"Арнасой тумани\",\"ru\":\"Арнасайский район\",\"en\":\"Arnasay District\"}', 3),
(30, '{\"uz\":\"Baxmal tumani\",\"oz\":\"Бахмал тумани\",\"ru\":\"Бахмальский район\",\"en\":\"Bakhmal District\"}', 3),
(31, '{\"uz\":\"G‘allaorol tumani\",\"oz\":\"Ғаллаорол тумани\",\"ru\":\"Галляаральский район\",\"en\":\"Gallaorol District\"}', 3),
(32, '{\"uz\":\"Jizzax tumani\",\"oz\":\"Жиззах тумани\",\"ru\":\"Джизакская район\",\"en\":\"Jizzakh District\"}', 3),
(33, '{\"uz\":\"Do‘stlik tumani\",\"oz\":\"Дўстлик тумани\",\"ru\":\"Дустликский район\",\"en\":\"Dustlik District\"}', 3),
(34, '{\"uz\":\"Zomin tumani\",\"oz\":\"Зомин тумани\",\"ru\":\"Зааминский район\",\"en\":\"Zaamin District\"}', 3),
(35, '{\"uz\":\"Zarbdor tumani\",\"oz\":\"Зарбдор тумани\",\"ru\":\"Зарбдарский район\",\"en\":\"Zarbdor city\"}', 3),
(36, '{\"uz\":\"Zafarobod tumani\",\"oz\":\"Зафаробод тумани\",\"ru\":\"Зафарабадский район\",\"en\":\"Zafarobod District\"}', 3),
(37, '{\"uz\":\"Mirzacho‘l tumani\",\"oz\":\"Мирзачўл тумани\",\"ru\":\"Мирзачульский район	\",\"en\":\"Mirzachul District\"}', 3),
(38, '{\"uz\":\"Paxtakor tumani\",\"oz\":\"Пахтакор тумани\",\"ru\":\"Пахтакорский район\",\"en\":\"Pakhtakor District\"}', 3),
(39, '{\"uz\":\"Forish tumani\",\"oz\":\"Фориш тумани\",\"ru\":\"Фаришский район\",\"en\":\"Forish District\"}', 3),
(40, '{\"uz\":\"Yangiobod tumani\",\"oz\":\"Янгиобод тумани\",\"ru\":\"Янгиабадский район\",\"en\":\"Yangiabad District\"}', 3),
(41, '{\"uz\":\"Jizzax shahar\",\"oz\":\"Жиззах шаҳар\",\"ru\":\"Город Джизак\",\"en\":\"Jizzax city\"}', 3),
(42, '{\"uz\":\"G‘uzor tumani\",\"oz\":\"Ғузор тумани\",\"ru\":\"Гузарский район\",\"en\":\"Guzar District\"}', 4),
(43, '{\"uz\":\"Dehqonobod tumani\",\"oz\":\"Деҳқонобод тумани\",\"ru\":\"Дехканабадский район\",\"en\":\"Dehkanabad District\"}', 4),
(44, '{\"uz\":\"Qamashi tumani\",\"oz\":\"Қамаши тумани\",\"ru\":\"Камашинский район\",\"en\":\"Kamashi District\"}', 4),
(45, '{\"uz\":\"Qarshi tumani\",\"oz\":\"Қарши тумани\",\"ru\":\"Каршинский район\",\"en\":\"Karshi District\"}', 4),
(46, '{\"uz\":\"Koson tumani\",\"oz\":\"Косон тумани\",\"ru\":\"Касанский район\",\"en\":\"Koson District\"}', 4),
(47, '{\"uz\":\"Kasbi tumani\",\"oz\":\"Касби тумани\",\"ru\":\"Касбийский район\",\"en\":\"Kasby District\"}', 4),
(48, '{\"uz\":\"Kitob tumani\",\"oz\":\"Китоб тумани\",\"ru\":\"Китабский район\",\"en\":\"Kitob District\"}', 4),
(49, '{\"uz\":\"Mirishkor tumani\",\"oz\":\"Миришкор тумани\",\"ru\":\"Миришкорский район\",\"en\":\"Myrishkor District\"}', 4),
(50, '{\"uz\":\"Muborak tumani\",\"oz\":\"Муборак тумани\",\"ru\":\"Мубарекский район\",\"en\":\"Muborak District\"}', 4),
(51, '{\"uz\":\"Nishon tumani\",\"oz\":\"Нишон тумани\",\"ru\":\"Нишанский район\",\"en\":\"Nishon District\"}', 4),
(52, '{\"uz\":\"Chiroqchi tumani\",\"oz\":\"Чироқчи тумани\",\"ru\":\"Чиракчинский район\",\"en\":\"Chirakchi District\"}', 4),
(53, '{\"uz\":\"Shahrisabz tumani\",\"oz\":\"Шаҳрисабз тумани\",\"ru\":\"Шахрисабзский район\",\"en\":\"Shakhrisabz District\"}', 4),
(54, '{\"uz\":\"Yakkabog‘ tumani\",\"oz\":\"Яккабоғ тумани\",\"ru\":\"Яккабагский район\",\"en\":\"Yakkabog District\"}', 4),
(55, '{\"uz\":\"Qarshi shahar\",\"oz\":\"Қарши шаҳар\",\"ru\":\"Город Карши\",\"en\":\"Qarshi city\"}', 4),
(56, '{\"uz\":\"Konimex tumani\",\"oz\":\"Конимех тумани\",\"ru\":\"Канимехский район\",\"en\":\"Kanimekh District\"}', 5),
(57, '{\"uz\":\"Karmana tumani\",\"oz\":\"Кармана тумани\",\"ru\":\"Карманинский район\",\"en\":\"Karmana District\"}', 5),
(58, '{\"uz\":\"Qiziltepa tumani\",\"oz\":\"Қизилтепа тумани\",\"ru\":\"Кызылтепинский район\",\"en\":\"Kyzyltepa District\"}', 5),
(59, '{\"uz\":\"Navbahor tumani\",\"oz\":\"Навбаҳор тумани\",\"ru\":\"Навбахорский район\",\"en\":\"Navbakhor District\"}', 5),
(60, '{\"uz\":\"Nurota tumani\",\"oz\":\"Нурота тумани\",\"ru\":\"Нуратинский район\",\"en\":\"Nurata District\"}', 5),
(61, '{\"uz\":\"Tomdi tumani\",\"oz\":\"Томди тумани\",\"ru\":\"Тамдынский район\",\"en\":\"Tamdy District\"}', 5),
(62, '{\"uz\":\"Uchquduq tumani\",\"oz\":\"Учқудуқ тумани\",\"ru\":\"Учкудукский район\",\"en\":\"Uchkuduk District\"}', 5),
(63, '{\"uz\":\"Xatirchi tumani\",\"oz\":\"Хатирчи тумани\",\"ru\":\"Хатырчинский район\",\"en\":\"Khatyrchi Distric\"}', 5),
(64, '{\"uz\":\"Zarafshon shahar\",\"oz\":\"Зарафшон шаҳар\",\"ru\":\"Город Зарафшан\",\"en\":\"Zarafshon Distric\"}', 5),
(65, '{\"uz\":\"Navoiy shahar\",\"oz\":\"Навоий шаҳар\",\"ru\":\"Город Навои\",\"en\":\"Navoiy city\"}', 5),
(66, '{\"uz\":\"Kosonsoy tumani\",\"oz\":\"Косонсой тумани\",\"ru\":\"Касансайский район\",\"en\":\"Kasansay District\"}', 6),
(67, '{\"uz\":\"Mingbuloq tumani\",\"oz\":\"Мингбулоқ тумани\",\"ru\":\"Мингбулакский район\",\"en\":\"Mingbulak District\"}', 6),
(68, '{\"uz\":\"Namangan tumani\",\"oz\":\"Наманган тумани\",\"ru\":\"Наманганский район\",\"en\":\"Namangan District\"}', 6),
(69, '{\"uz\":\"Norin tumani\",\"oz\":\"Норин тумани\",\"ru\":\"Нарынский район\",\"en\":\"Naryn District\"}', 6),
(70, '{\"uz\":\"Pop tumani\",\"oz\":\"Поп тумани\",\"ru\":\"Папский район\",\"en\":\"Pap District\"}', 6),
(71, '{\"uz\":\"To‘raqo‘rg‘on tumani\",\"oz\":\"Тўрақўрғон тумани\",\"ru\":\"Туракурганский район\",\"en\":\"Turakurgan District\"}', 6),
(72, '{\"uz\":\"Uychi tumani\",\"oz\":\"Уйчи тумани\",\"ru\":\"Уйчинский район\",\"en\":\"Uychi District\"}', 6),
(73, '{\"uz\":\"Uchqo‘rg‘on tumani\",\"oz\":\"Учқўрғон тумани\",\"ru\":\"Учкурганский район\",\"en\":\"Uchkurgan District\"}', 6),
(74, '{\"uz\":\"Chortoq tumani\",\"oz\":\"Чортоқ тумани\",\"ru\":\"Чартакский район\",\"en\":\"Chartak District\"}', 6),
(75, '{\"uz\":\"Chust tumani\",\"oz\":\"Чуст тумани\",\"ru\":\"Чустский район\",\"en\":\"Chust District\"}', 6),
(76, '{\"uz\":\"Yangiqo‘rg‘on tumani\",\"oz\":\"Янгиқўрғон тумани\",\"ru\":\"Янгикурганский район\",\"en\":\"Yangikurgan District\"}', 6),
(77, '{\"uz\":\"Namangan shahar\",\"oz\":\"Наманган шаҳар\",\"ru\":\"Город Наманган\",\"en\":\"Namangan city\"}', 6),
(78, '{\"uz\":\"Oqdaryo tumani\",\"oz\":\"Оқдарё тумани\",\"ru\":\"Акдарьинский район\",\"en\":\"Oqdarya District\"}', 7),
(79, '{\"uz\":\"Bulung‘ur tumani\",\"oz\":\"Булунғур тумани\",\"ru\":\"Булунгурский район\",\"en\":\"Bulungur District\"}', 7),
(80, '{\"uz\":\"Jomboy tumani\",\"oz\":\"Жомбой тумани\",\"ru\":\"Джамбайский район\",\"en\":\"Jomboy District\"}', 7),
(81, '{\"uz\":\"Ishtixon tumani\",\"oz\":\"Иштихон тумани\",\"ru\":\"Иштыханский район\",\"en\":\"Ishtikhon District\"}', 7),
(82, '{\"uz\":\"Kattaqo‘rg‘on tumani\",\"oz\":\"Каттақўрғон тумани\",\"ru\":\"Каттакурганский район\",\"en\":\"Kattakurgan District\"}', 7),
(83, '{\"uz\":\"Qo‘shrabot tumani\",\"oz\":\"Қўшработ тумани\",\"ru\":\"Кошрабадский район\",\"en\":\"Koshrabot District\"}', 7),
(84, '{\"uz\":\"Narpay tumani\",\"oz\":\"Нарпай тумани\",\"ru\":\"Нарпайский район\",\"en\":\"Narpay District\"}', 7),
(85, '{\"uz\":\"Nurobod tumani\",\"oz\":\"Нуробод тумани\",\"ru\":\"Нурабадский район\",\"en\":\"Nurobod District\"}', 7),
(86, '{\"uz\":\"Payariq tumani\",\"oz\":\"Паяриқ тумани\",\"ru\":\"Пайарыкский район\",\"en\":\"Payariq District\"}', 7),
(87, '{\"uz\":\"Pastdarg‘om tumani\",\"oz\":\"Пастдарғом тумани\",\"ru\":\"Пастдаргомский район\",\"en\":\"Pastdargom District\"}', 7),
(88, '{\"uz\":\"Paxtachi tumani\",\"oz\":\"Пахтачи тумани\",\"ru\":\"Пахтачийский район\",\"en\":\"Pakhtachi District\"}', 7),
(89, '{\"uz\":\"Samarqand tumani\",\"oz\":\"Самарқанд тумани\",\"ru\":\"Самаркандский район\",\"en\":\"Samarqand District\"}', 7),
(90, '{\"uz\":\"Tayloq tumani\",\"oz\":\"Тайлоқ тумани\",\"ru\":\"Тайлакский район\",\"en\":\"Toyloq District\"}', 7),
(91, '{\"uz\":\"Urgut tumani\",\"oz\":\"Ургут тумани\",\"ru\":\"Ургутский район\",\"en\":\"Urgut District\"}', 7),
(92, '{\"uz\":\"Kattaqo‘rg‘on shahar\",\"oz\":\"Каттақўрғон шаҳар\",\"ru\":\"Город Каттакурган\",\"en\":\"Kattakurgan city\"}', 7),
(93, '{\"uz\":\"Samarqand shahar\",\"oz\":\"Самарқанд шаҳар\",\"ru\":\"Город Самарканд\",\"en\":\"Samarqand city\"}', 7),
(94, '{\"uz\":\"Oltinsoy tumani\",\"oz\":\"Олтинсой тумани\",\"ru\":\"Алтынсайский район\",\"en\":\"Altinsoy District\"}', 8),
(95, '{\"uz\":\"Angor tumani\",\"oz\":\"Ангор тумани\",\"ru\":\"Ангорский район\",\"en\":\"Angor District\"}', 8),
(96, '{\"uz\":\"Boysun tumani\",\"oz\":\"Бойсун тумани\",\"ru\":\"Байсунский район\",\"en\":\"Boysun District\"}', 8),
(97, '{\"uz\":\"Denov tumani\",\"oz\":\"Денов тумани\",\"ru\":\"Денауский район\",\"en\":\"Denov District\"}', 8),
(98, '{\"uz\":\"Jarqo‘rg‘on tumani\",\"oz\":\"Жарқўрғон тумани\",\"ru\":\"Джаркурганский район\",\"en\":\"Jarkurghon District\"}', 8),
(99, '{\"uz\":\"Qiziriq tumani\",\"oz\":\"Қизириқ тумани\",\"ru\":\"Кизирикский район\",\"en\":\"Kizirik District\"}', 8),
(100, '{\"uz\":\"Qumqo‘rg‘on tumani\",\"oz\":\"Қумқўрғон тумани\",\"ru\":\"Кумкурганский район\",\"en\":\"Kumkurghon District\"}', 8),
(101, '{\"uz\":\"Muzrabot tumani\",\"oz\":\"Музработ тумани\",\"ru\":\"Музрабадский район\",\"en\":\"Muzrabot District\"}', 8),
(102, '{\"uz\":\"Sariosiyo tumani\",\"oz\":\"Сариосиё тумани\",\"ru\":\"Сариасийский район\",\"en\":\"Sariosiyo District\"}', 8),
(103, '{\"uz\":\"Termiz tumani\",\"oz\":\"Термиз тумани\",\"ru\":\"Термезский район\",\"en\":\"Termiz District\"}', 8),
(104, '{\"uz\":\"Uzun tumani\",\"oz\":\"Узун тумани\",\"ru\":\"Узунский район\",\"en\":\"Uzun District\"}', 8),
(105, '{\"uz\":\"Sherobod tumani\",\"oz\":\"Шеробод тумани\",\"ru\":\"Шерабадский район\",\"en\":\"Sherobod District\"}', 8),
(106, '{\"uz\":\"Sho‘rchi tumani\",\"oz\":\"Шўрчи тумани\",\"ru\":\"Шурчинский район\",\"en\":\"Shurchi District\"}', 8),
(107, '{\"uz\":\"Termiz shahar\",\"oz\":\"Термиз шаҳар\",\"ru\":\"Город Термез\",\"en\":\"Termiz District\"}', 8),
(108, '{\"uz\":\"Oqoltin tumani\",\"oz\":\"Оқолтин тумани\",\"ru\":\"Акалтынский район\",\"en\":\"Akaltyn District\"}', 9),
(109, '{\"uz\":\"Boyovut tumani\",\"oz\":\"Боёвут тумани\",\"ru\":\"Баяутский район\",\"en\":\"Bayaut District\"}', 9),
(110, '{\"uz\":\"Guliston tumani\",\"oz\":\"Гулистон тумани\",\"ru\":\"Гулистанский район\",\"en\":\"Gulistan District\"}', 9),
(111, '{\"uz\":\"Mirzaobod tumani\",\"oz\":\"Мирзаобод тумани\",\"ru\":\"Мирзаабадский район\",\"en\":\"Mirzaabad District\"}', 9),
(112, '{\"uz\":\"Sayxunobod tumani\",\"oz\":\"Сайхунобод тумани\",\"ru\":\"Сайхунабадский район\",\"en\":\"Saikhunabad District\"}', 9),
(113, '{\"uz\":\"Sardoba tumani\",\"oz\":\"Сардоба тумани\",\"ru\":\"Сардобский район\",\"en\":\"Sardoba District\"}', 9),
(114, '{\"uz\":\"Sirdaryo tumani\",\"oz\":\"Сирдарё тумани\",\"ru\":\"Сырдарьинский район\",\"en\":\"Sirdaryo District\"}', 9),
(115, '{\"uz\":\"Xovos tumani\",\"oz\":\"Ховос тумани\",\"ru\":\"Хавастский район\",\"en\":\"Khavast District\"}', 9),
(116, '{\"uz\":\"Guliston shahar\",\"oz\":\"Гулистон шаҳар\",\"ru\":\"Город Гулистан\",\"en\":\"Guliston city\"}', 9),
(117, '{\"uz\":\"Shirin shahar\",\"oz\":\"Ширин шаҳар\",\"ru\":\"Город Ширин\",\"en\":\"Shirin city\"}', 9),
(118, '{\"uz\":\"Yangiyer shahar\",\"oz\":\"Янгиер шаҳар\",\"ru\":\"Город Янгиер\",\"en\":\"Yangiyer city\"}', 9),
(119, '{\"uz\":\"Oqqo‘rg‘on tumani\",\"oz\":\"Оққўрғон тумани\",\"ru\":\"Аккурганский район\",\"en\":\"Oqqo‘rg‘on city\"}', 10),
(120, '{\"uz\":\"Ohangaron tumani\",\"oz\":\"Оҳангарон тумани\",\"ru\":\"Ахангаранский район\",\"en\":\"Ohangaron city\"}', 10),
(121, '{\"uz\":\"Bekobod tumani\",\"oz\":\"Бекобод тумани\",\"ru\":\"Бекабадский район\",\"en\":\"Bekabad District\"}', 10),
(122, '{\"uz\":\"Bo‘stonliq tumani\",\"oz\":\"Бўстонлиқ тумани\",\"ru\":\"Бостанлыкский район\",\"en\":\"Bostanliq District\"}', 10),
(123, '{\"uz\":\"Bo‘ka tumani\",\"oz\":\"Бўка тумани\",\"ru\":\"Букинский район\",\"en\":\"Buka District\"}', 10),
(124, '{\"uz\":\"Zangiota tumani\",\"oz\":\"Зангиота тумани\",\"ru\":\"Зангиатинский район\",\"en\":\"Zangiata District\"}', 10),
(125, '{\"uz\":\"Qibray tumani\",\"oz\":\"Қибрай тумани\",\"ru\":\"Кибрайский район\",\"en\":\"Qibray District\"}', 10),
(126, '{\"uz\":\"Quyichirchiq tumani\",\"oz\":\"Қуйичирчиқ тумани\",\"ru\":\"Куйичирчикский район\",\"en\":\"Quyi Chirchiq District\"}', 10),
(127, '{\"uz\":\"Parkent tumani\",\"oz\":\"Паркент тумани\",\"ru\":\"Паркентский район\",\"en\":\"Parkent District\"}', 10),
(128, '{\"uz\":\"Piskent tumani\",\"oz\":\"Пискент тумани\",\"ru\":\"Пскентский район\",\"en\":\"Piskent District\"}', 10),
(129, '{\"uz\":\"O‘rtachirchiq tumani\",\"oz\":\"Ўртачирчиқ тумани\",\"ru\":\"Уртачирчикский район\",\"en\":\"Orta Chirchiq District\"}', 10),
(130, '{\"uz\":\"Chinoz tumani\",\"oz\":\"Чиноз тумани\",\"ru\":\"Чиназский район\",\"en\":\"Chinaz District\"}', 10),
(131, '{\"uz\":\"Yuqorichirchiq tumani\",\"oz\":\"Юқоричирчиқ тумани\",\"ru\":\"Юкоричирчикский район\",\"en\":\"Yukori Chirchiq District\"}', 10),
(132, '{\"uz\":\"Yangiyo‘l tumani\",\"oz\":\"Янгийўл тумани\",\"ru\":\"Янгиюльский район\",\"en\":\"Yangiyol District\"}', 10),
(133, '{\"uz\":\"Olmaliq shahar\",\"oz\":\"Олмалиқ шаҳар\",\"ru\":\"Город Алмалык\",\"en\":\"Olmaliq city\"}', 10),
(134, '{\"uz\":\"Angren shahar\",\"oz\":\"Ангрен шаҳар\",\"ru\":\"Город Ангрен\",\"en\":\"Angren city\"}', 10),
(135, '{\"uz\":\"Bekobod shahar\",\"oz\":\"Бекобод шаҳар\",\"ru\":\"Город Бекабад\",\"en\":\"Bekobod city\"}', 10),
(136, '{\"uz\":\"Chirchiq shahar\",\"oz\":\"Чирчиқ шаҳар\",\"ru\":\"Город Чирчик\",\"en\":\"Chirchiq city\"}', 10),
(137, '{\"uz\":\"Oltiariq tumani\",\"oz\":\"Олтиариқ тумани\",\"ru\":\"Алтыарыкский район\",\"en\":\"Altyariq District\"}', 11),
(138, '{\"uz\":\"Bog‘dod tumani\",\"oz\":\"Боғдод тумани\",\"ru\":\"Багдадский район\",\"en\":\"Baghdad District\"}', 11),
(139, '{\"uz\":\"Beshariq tumani\",\"oz\":\"Бешариқ тумани\",\"ru\":\"Бешарыкский район\",\"en\":\"Beshariq District\"}', 11),
(140, '{\"uz\":\"Buvayda tumani\",\"oz\":\"Бувайда тумани\",\"ru\":\"Бувайдинский район\",\"en\":\"Buvayda District\"}', 11),
(141, '{\"uz\":\"Dang‘ara tumani\",\"oz\":\"Данғара тумани\",\"ru\":\"Дангаринский район\",\"en\":\"Dangara District\"}', 11),
(142, '{\"uz\":\"Quva tumani\",\"oz\":\"Қува тумани\",\"ru\":\"Кувинский район\",\"en\":\"Quva District\"}', 11),
(143, '{\"uz\":\"Qo‘shtepa tumani\",\"oz\":\"Қўштепа тумани\",\"ru\":\"Куштепинский район\",\"en\":\"Qoshtepa District\"}', 11),
(144, '{\"uz\":\"Rishton tumani\",\"oz\":\"Риштон тумани\",\"ru\":\"Риштанский район\",\"en\":\"Rishton District\"}', 11),
(145, '{\"uz\":\"So‘x tumani\",\"oz\":\"Сўх тумани\",\"ru\":\"Сохский район\",\"en\":\"Sokh District\"}', 11),
(146, '{\"uz\":\"Toshloq tumani\",\"oz\":\"Тошлоқ тумани\",\"ru\":\"Ташлакский район\",\"en\":\"Tashlaq District\"}', 11),
(147, '{\"uz\":\"O‘zbekiston tumani\",\"oz\":\"Ўзбекистон тумани\",\"ru\":\"Узбекистанский район\",\"en\":\"Uzbekistan District\"}', 11),
(148, '{\"uz\":\"Uchko‘priq tumani\",\"oz\":\"Учкўприқ тумани\",\"ru\":\"Учкуприкский район\",\"en\":\"Uchkuprik District\"}', 11),
(149, '{\"uz\":\"Farg‘ona tumani\",\"oz\":\"Фарғона тумани\",\"ru\":\"Ферганский район\",\"en\":\"Fergana District\"}', 11),
(150, '{\"uz\":\"Furqat tumani\",\"oz\":\"Фурқат тумани\",\"ru\":\"Фуркатский район\",\"en\":\"Furqat District\"}', 11),
(151, '{\"uz\":\"Yozyovon tumani\",\"oz\":\"Ёзёвон тумани\",\"ru\":\"Язъяванский район\",\"en\":\"Yozyovon District\"}', 11),
(152, '{\"uz\":\"Qo‘qon shahar\",\"oz\":\"Қўқон шаҳар\",\"ru\":\"Город Коканд\",\"en\":\"Kokan city\"}', 11),
(153, '{\"uz\":\"Quvasoy tumani\",\"oz\":\"Қувасой тумани\",\"ru\":\"Город Кувасай\",\"en\":\"Kuvasoy city\"}', 11),
(154, '{\"uz\":\"Marg‘ilon shahar\",\"oz\":\"Марғилон шаҳар\",\"ru\":\"Город Маргилан\",\"en\":\"Margilon city\"}', 11),
(155, '{\"uz\":\"Farg‘ona shahar\",\"oz\":\"Фарғона шаҳар\",\"ru\":\"Город Фергана\",\"en\":\"Fergana city\"}', 11),
(156, '{\"uz\":\"Bog‘ot tumani\",\"oz\":\"Боғот тумани\",\"ru\":\"Багатский район\",\"en\":\"Bogot District\"}', 12),
(157, '{\"uz\":\"Gurlan tumani\",\"oz\":\"Гурлан тумани\",\"ru\":\"Гурленский район\",\"en\":\"Gurlen District\"}', 12),
(158, '{\"uz\":\"Qo‘shko‘pir tumani\",\"oz\":\"Қўшкўпир тумани\",\"ru\":\"Кошкупырский район\",\"en\":\"Qo‘shko‘pir District\"}', 12),
(159, '{\"uz\":\"Urganch tumani\",\"oz\":\"Урганч тумани\",\"ru\":\"Ургенчский район\",\"en\":\"Urganch District\"}', 12),
(160, '{\"uz\":\"Xazorasp tumani\",\"oz\":\"Хазорасп тумани\",\"ru\":\"Хазараспский район\",\"en\":\"Hazorasp District\"}', 12),
(161, '{\"uz\":\"Xonqa tumani\",\"oz\":\"Хонқа тумани\",\"ru\":\"Ханкинский район\",\"en\":\"Xonqa District\"}', 12),
(162, '{\"uz\":\"Xiva tumani\",\"oz\":\"Хива тумани\",\"ru\":\"Хивинский район\",\"en\":\"Khiva District\"}', 12),
(163, '{\"uz\":\"Shovot tumani\",\"oz\":\"Шовот тумани\",\"ru\":\"Шаватский район\",\"en\":\"Shovot District\"}', 12),
(164, '{\"uz\":\"Yangibozor tuman\",\"oz\":\"Янгибозор туман\",\"ru\":\"Янгибазарский район\",\"en\":\"Yangibozor District\"}', 12),
(165, '{\"uz\":\"Yangiariq tumani\",\"oz\":\"Янгиариқ тумани\",\"ru\":\"Янгиарыкский район\",\"en\":\"Yangiariq District\"}', 12),
(166, '{\"uz\":\"Urganch shahar\",\"oz\":\"Урганч шаҳар\",\"ru\":\"Город Ургенч\",\"en\":\"Urganch District\"}', 12),
(167, '{\"uz\":\"Amudaryo tumani\",\"oz\":\"Амударё тумани\",\"ru\":\"Амударьинский район\",\"en\":\"Amudaryo District\"}', 13),
(168, '{\"uz\":\"Beruniy tumani\",\"oz\":\"Беруний тумани\",\"ru\":\"Берунийский район\",\"en\":\"Beruniy District\"}', 13),
(169, '{\"uz\":\"Qorao‘zak tumani\",\"oz\":\"Қораўзак тумани\",\"ru\":\"Караузякский район\",\"en\":\"Qorao‘zak District\"}', 13),
(170, '{\"uz\":\"Kegeyli tumani\",\"oz\":\"Кегейли тумани\",\"ru\":\"Кегейлийский район\",\"en\":\"Kegeyli District\"}', 13),
(171, '{\"uz\":\"Qo‘ng‘irot tumani\",\"oz\":\"Қўнғирот тумани\",\"ru\":\"Кунградский район\",\"en\":\"Qo‘ng‘irot District\"}', 13),
(172, '{\"uz\":\"Qonliko‘l tumani\",\"oz\":\"Қонликўл тумани\",\"ru\":\"Канлыкульский район\",\"en\":\"Qonliko‘l District\"}', 13),
(173, '{\"uz\":\"Mo‘ynoq tumani\",\"oz\":\"Мўйноқ тумани\",\"ru\":\"Муйнакский район\",\"en\":\"Mo‘ynoq District\"}', 13),
(174, '{\"uz\":\"Nukus tumani\",\"oz\":\"Нукус тумании\",\"ru\":\"Нукусский район\",\"en\":\"Nukus District\"}', 13),
(175, '{\"uz\":\"Taxtako‘pir tumani\",\"oz\":\"Тахтакўпир тумани\",\"ru\":\"Тахиаташский район\",\"en\":\"Taxtako‘pir District\"}', 13),
(176, '{\"uz\":\"To‘rtko‘l tumani\",\"oz\":\"Тўрткўл тумани\",\"ru\":\"Турткульский район\",\"en\":\"To‘rtko‘l District\"}', 13),
(177, '{\"uz\":\"Xo‘jayli tumani\",\"oz\":\"Хўжайли тумани\",\"ru\":\"Ходжейлийский район\",\"en\":\"Xo‘jayli District\"}', 13),
(178, '{\"uz\":\"Chimboy tumani\",\"oz\":\"Чимбой тумани\",\"ru\":\"Чимбайский район\",\"en\":\"Chimboy District\"}', 13),
(179, '{\"uz\":\"Shamanay tumani\",\"oz\":\"Шаманай тумани\",\"ru\":\"Шуманайский район\",\"en\":\"Shumanay District\"}', 13),
(180, '{\"uz\":\"Ellikqala tumani\",\"oz\":\"Елликқалъа тумани\",\"ru\":\"Элликкалинский район\",\"en\":\"Ellikqala District\"}', 13),
(181, '{\"uz\":\"Nukus shahar\",\"oz\":\"Нукус шаҳар\",\"ru\":\"Город Нукус\",\"en\":\"Nukus District\"}', 13),
(189, '{\"uz\":\"Olmazor tumani\",\"oz\":\"Олмазор тумани\",\"ru\":\"Алмазарский район\",\"en\":\"Almazar District\"}', 14),
(190, '{\"uz\":\"Bektemir tumani\",\"oz\":\"Бектемир тумани\",\"ru\":\"Бектемирский район\",\"en\":\"Bektemir District\"}', 14),
(191, '{\"uz\":\"Mirobod tumani\",\"oz\":\"Миробод тумани\",\"ru\":\"Мирабадский район\",\"en\":\"Mirabad District\"}', 14),
(192, '{\"uz\":\"Mirzo Ulug‘bek tumani\",\"oz\":\"Мирзо Улуғбек тумани\",\"ru\":\"Мирзо-Улугбекский район\",\"en\":\"Mirzo Ulugbek District\"}', 14),
(193, '{\"uz\":\"Sirg‘ali tumani\",\"oz\":\"Сирғали тумани\",\"ru\":\"Сергелийский район\",\"en\":\"Sergeli District\"}', 14),
(194, '{\"uz\":\"Uchtepa tumani\",\"oz\":\"Учтепа тумани\",\"ru\":\"Учтепинский район\",\"en\":\"Uchtepa District\"}', 14),
(195, '{\"uz\":\"Yashnobod tumani\",\"oz\":\"Яшнобод тумани\",\"ru\":\"Яшнабадский район\",\"en\":\"Yashnabad District\"}', 14),
(196, '{\"uz\":\"Chilonzor tumani\",\"oz\":\"Чилонзор тумани\",\"ru\":\"Чиланзарский район\",\"en\":\"Chilanzar District\"}', 14),
(197, '{\"uz\":\"Shayxontoxur tumani\",\"oz\":\"Шайхонтохур тумани\",\"ru\":\"Шайхантахурский район\",\"en\":\"Shayhantahur District\"}', 14),
(198, '{\"uz\":\"Yunusobod tumani\",\"oz\":\"Юнусобод тумани\",\"ru\":\"Юнусабадский район\",\"en\":\"Yunusabad District\"}', 14),
(199, '{\"uz\":\"Yakkasaroy tumani\",\"oz\":\"Яккасарой тумани\",\"ru\":\"Яккасарайский район\",\"en\":\"Yakkasaray District\"}', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `register_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` smallint(6) DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `register_id`, `post_id`, `name`, `website`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 15, 'Salom', 'Web dasturchi', 'Salom dasturchilar', 1, '2020-04-06 13:25:41', '2020-04-06 13:25:41'),
(2, 1, 15, 'Salom', 'Web dasturchi', 'Salom', 1, '2020-04-06 13:29:21', '2020-04-06 13:29:21'),
(3, 1, 15, 'Salom', 'Yii 2 dasturchisi', 'Salom', 1, '2020-04-06 13:30:08', '2020-04-06 13:30:08'),
(4, 1, 15, 'Salom', 'Yii 2 dasturchisi', 'Salom', 1, '2020-04-06 13:30:09', '2020-04-06 13:30:09'),
(5, 1, 15, 'Salom', 'Web dasturchi', 'fbrefsdfv', 1, '2020-04-07 04:06:45', '2020-04-07 04:06:45'),
(6, 1, 8, 'Salom', 'Web dasturchi', 'Salom', 1, '2020-04-13 06:06:20', '2020-04-13 06:06:20'),
(7, 1, 12, 'Salom', 'Web dasturchi', 'njhtyrewq2e3tuikl', 1, '2020-05-22 05:40:29', '2020-05-22 05:40:29'),
(8, 1, 12, 'Salom', 'Salom', 'Salom', 1, '2020-07-26 12:58:35', '2020-07-26 12:58:35');

-- --------------------------------------------------------

--
-- Структура таблицы `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` smallint(6) DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `information`
--

INSERT INTO `information` (`id`, `title`, `content`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"uz\":\"Bog\'lanish uchun ma\'lumot\",\"oz\":\"Боғланиш учун маълумот\",\"ru\":\"Контактная информация\",\"en\":\"Contact Information\"}', '{\"uz\":\"<p>Lorem ipsum dolor amet o&#39;tiradi, moslashtiradigan maslahatlarni qabul qiladi, mehnat qilish va mehnat qilish uchun juda ko&#39;p vaqt sarflaydi. Eng kam miqdordagi imtiyozlardan foydalanib, ulamko mehnatini bekor qilish uchun etarli natijalarga erishasiz.<\\/p>\\r\\n\",\"oz\":\"<p>Лорем ипсум долор амет ўтиради, мослаштирадиган маслаҳатларни қабул қилади, меҳнат қилиш ва меҳнат қилиш учун жуда кўп вақт сарфлайди. Энг кам миқдордаги имтиёзлардан фойдаланиб, уламко меҳнатини бекор қилиш учун этарли натижаларга эришасиз.<\\/p>\\r\\n\",\"ru\":\"<p>Lorem ipsum dolor amet сидит, принимает адаптивные советы, много времени работает и работает. Используя наименьшее количество преимуществ, вы достигнете достаточных результатов, чтобы отменить работу принтера.<\\/p>\\r\\n\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<\\/span><\\/p>\\r\\n\"}', ' Webmag@email.com', '213-520-7376', '{\"uz\":\"3770 Oliver ko\'chasi\",\"oz\":\"3770 Оливер кўчаси\",\"ru\":\"3770 Оливер-стрит\",\"en\":\"3770 Oliver Street\"}', 1, '2020-02-22 08:03:52', '2020-04-20 08:31:46');

-- --------------------------------------------------------

--
-- Структура таблицы `main_logo`
--

CREATE TABLE `main_logo` (
  `id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` smallint(6) DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `main_logo`
--

INSERT INTO `main_logo` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/upload/main-logoss/image/15853064505e7ddb525812c9.69737747.png', 1, '2020-03-27 10:54:10', '2020-03-27 10:54:10'),
(2, '', 0, '2020-04-11 10:02:54', '2020-04-11 10:02:54');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1582354028),
('m200222_062212_category_table', 1582354091);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_most_read` varchar(255) DEFAULT NULL,
  `view` int(10) NOT NULL,
  `status` smallint(6) DEFAULT '0',
  `featured_posts` smallint(6) DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `user_id`, `category_id`, `title`, `description`, `content`, `image`, `image_most_read`, `view`, `status`, `featured_posts`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848513145e76e9727ec7a1.46733116.jpg', 'uploads/upload/postss/image/15848513145e76e97280cce9.31576019.jpg', 1, 1, 0, '2020-03-22 04:20:43', '2020-03-26 18:23:15'),
(2, 1, 4, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848512045e76e90405a6a4.30310846.jpg', 'uploads/upload/postss/image/15848512045e76e90406e981.71304441.jpg', 11, 1, 0, '2020-03-22 04:26:44', '2020-03-26 04:29:27'),
(3, 1, 3, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Ask HN: Does Anybody Still Use JQuery?\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848513965e76e9c4668bf4.45871242.jpg', 'uploads/upload/postss/image/15848513965e76e9c467e517.96144838.jpg', 14, 1, 0, '2020-03-22 04:29:56', '2020-03-26 04:29:24'),
(4, 1, 3, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848514825e76ea1a9a8715.95415103.jpg', 'uploads/upload/postss/image/15848514825e76ea1a9cc924.10616510.jpg', 11, 1, 0, '2020-03-22 04:31:22', '2020-03-26 04:29:20'),
(5, 1, 4, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Tell-A-Tool: Guide To Web Design And Development Tools\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848515915e76ea875f0fc5.30696253.jpg', 'uploads/upload/postss/image/15848515915e76ea87606da9.52942626.jpg', 5, 1, 0, '2020-03-22 04:33:11', '2020-03-26 04:29:17'),
(6, 1, 2, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"CSS Float: A Tutorial\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848516855e76eae5ee0014.21379445.jpg', 'uploads/upload/postss/image/15848516855e76eae5efa9c7.80784250.jpg', 8, 1, 0, '2020-03-22 04:34:45', '2020-03-26 04:29:09'),
(7, 1, 1, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Ask HN: Does Anybody Still Use JQuery?\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848518865e76ebae1bdcc0.03754584.jpg', 'uploads/upload/postss/image/15848518865e76ebae1d5631.26843048.jpg', 3, 1, 0, '2020-03-22 04:38:06', '2020-03-26 04:29:06'),
(8, 1, 4, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Tell-A-Tool: Guide To Web Design And Development Tools\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848519675e76ebff3c7537.37097868.jpg', 'uploads/upload/postss/image/15848519675e76ebff3e8254.87434722.jpg', 30, 1, 0, '2020-03-22 04:39:27', '2020-04-05 10:06:11'),
(9, 1, 2, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"CSS Float: A Tutorial\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848520515e76ec532bb472.85177622.jpg', 'uploads/upload/postss/image/15848520515e76ec532d8cc2.54126739.jpg', 35, 1, 0, '2020-03-22 04:40:51', '2020-03-26 04:29:00'),
(10, 1, 3, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Why Node.js Is The Coolest Kid On The Backend Development Block!\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"\"}', 'uploads/upload/postss/image/15848521445e76ecb08f4986.08669255.jpg', 'uploads/upload/postss/image/15848521445e76ecb091bc03.03055147.jpg', 7, 1, 0, '2020-03-22 04:42:24', '2020-03-26 04:28:56'),
(11, 1, 1, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Ask HN: Does Anybody Still Use JQuery?\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848522455e76ed15a15896.18065441.jpg', 'uploads/upload/postss/image/15848522455e76ed15a37f76.63979156.jpg', 6, 1, 1, '2020-03-22 04:44:05', '2020-03-26 04:28:53'),
(12, 1, 3, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848524145e76edbe2cc8d9.69761352.jpg', 'uploads/upload/postss/image/15848523525e76ed8027acd7.02601836.jpg', 100, 1, 1, '2020-03-22 04:45:52', '2020-03-26 04:28:44'),
(13, 1, 4, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848527055e76eee148a6e2.29957993.jpg', 'uploads/upload/postss/image/15848527055e76eee14aaa06.15776429.jpg', 9, 1, 1, '2020-03-22 04:51:45', '2020-03-26 04:28:40'),
(14, 1, 1, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Ask HN: Does Anybody Still Use JQuery?\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848618025e77126a3ed9c7.05745589.jpg', 'uploads/upload/postss/image/15848618025e77126a414cf1.03365130.jpg', 85, 1, 1, '2020-03-22 04:53:11', '2020-03-26 04:28:38'),
(15, 1, 3, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"Lorem Ipsum: when, and when not to use it\"}', '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.<\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"color:rgb(61, 69, 92); font-family:nunito,sans-serif; font-size:16px\\\">The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.<\\/span><\\/p>\\r\\n\"}', 'uploads/upload/postss/image/15848618845e7712bcaf8e32.78747616.jpg', 'uploads/upload/postss/image/15848618845e7712bcb1a9d9.44597233.jpg', 551, 1, 1, '2020-03-22 07:24:44', '2020-04-13 10:52:29');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int(10) NOT NULL,
  `register_id` int(10) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `first_name` varchar(32) NOT NULL,
  `second_name` varchar(32) NOT NULL,
  `middle_name` varchar(32) NOT NULL,
  `birthday` int(10) NOT NULL,
  `gender` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `register_id`, `avatar`, `first_name`, `second_name`, `middle_name`, `birthday`, `gender`) VALUES
(1, 1, '', 'Bobur', 'Usmonkulov', 'Raxmatulla o\'gli', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `publicity`
--

CREATE TABLE `publicity` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `status` smallint(6) DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publicity`
--

INSERT INTO `publicity` (`id`, `title`, `image`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"uz\":\"Reklamma UZ\",\"ru\":\"Reklamma RU\",\"en\":\"Reklamma EN\"}', 'uploads/upload/publicityss/image/15830659845e5bab80de7dc1.06926452.gif', 'http://127.0.0.1/openserver/phpmyadmin/tbl_operations.php?db=subdevloper&table=publicity&token=bb0907308cd50bd7f5ef1f27803dcb73', 1, '2020-03-01 12:33:04', '2020-03-13 18:52:59'),
(2, '{\"uz\":\"Reklamma\",\"ru\":\"\",\"en\":\"\"}', '', 'http://blog.loc/ru', 1, '2020-03-01 12:33:58', '2020-03-13 18:52:56');

-- --------------------------------------------------------

--
-- Структура таблицы `publicity_image`
--

CREATE TABLE `publicity_image` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `status` smallint(6) DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publicity_image`
--

INSERT INTO `publicity_image` (`id`, `title`, `image`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"uz\":\"Reklama\",\"oz\":\"\",\"ru\":\"\",\"en\":\"\"}', 'uploads/upload/publicity-imagess/image/15853142345e7df9badf8f43.55285102.jpg', 'http://blog.loc-master/uz', 1, '2020-03-27 13:03:54', '2020-03-27 15:03:54'),
(2, '{\"uz\":\"\",\"oz\":\"\",\"ru\":\"\",\"en\":\"\"}', '', 'aqsgrthgrerew', 1, '2020-04-19 16:36:07', '2020-04-19 16:36:07');

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, '{\"uz\":\"Andijon viloyati\",\"oz\":\"Андижон вилояти\",\"ru\":\"Андижанская область\",\"en\":\"Andijan region\"}'),
(2, '{\"uz\":\"Buxoro viloyati\",\"oz\":\"Бухоро вилояти\",\"ru\":\"Бухарская область\",\"en\":\"Bukhara region\"}'),
(3, '{\"uz\":\"Jizzax viloyati\",\"oz\":\"Жиззах вилояти\",\"ru\":\"Джизакская область\",\"en\":\"Djizzak region\"}'),
(4, '{\"uz\":\"Qashqadaryo viloyati\",\"oz\":\"Қашқадарё вилояти\",\"ru\":\"Кашкадарьинская область\",\"en\":\"Kashkadarya region\"}'),
(5, '{\"uz\":\"Navoiy viloyati\",\"oz\":\"Навоий вилояти\",\"ru\":\"Навоийская область\",\"en\":\"Navoi region\"}'),
(6, '{\"uz\":\"Namangan viloyati\",\"oz\":\"Наманган вилояти\",\"ru\":\"Наманганская область\",\"en\":\"Namangan region\"}'),
(7, '{\"uz\":\"Samarqand viloyati\",\"oz\":\"Самарқанд вилояти\",\"ru\":\"Самаркандская область\",\"en\":\"Samarkand region\"}'),
(8, '{\"uz\":\"Surxondaryo viloyati\",\"oz\":\"Сурхондарё вилояти\",\"ru\":\"Сурхандарьинская область\",\"en\":\"Surkhandarya region\"}'),
(9, '{\"uz\":\"Sirdaryo viloyati\",\"oz\":\"Сирдарё вилояти\",\"ru\":\"Сырдарьинская область\",\"en\":\"Syrdarya region\"}'),
(10, '{\"uz\":\"Toshkent viloyati\",\"oz\":\"Тошкент вилояти\",\"ru\":\"Ташкентская область\",\"en\":\"Toshkent region\"}'),
(11, '{\"uz\":\"Farg’ona viloyati\",\"oz\":\"Фарғона вилояти\",\"ru\":\"Ферганская область\",\"en\":\"Fergana region\"}'),
(12, '{\"uz\":\"Xorazm viloyati\",\"oz\":\"Хоразм вилояти\",\"ru\":\"Хорезмская область\",\"en\":\"Tashkent region\"}'),
(13, '{\"uz\":\"Qoraqalpog’iston Respublikasi\",\"oz\":\"Қорақалпоғистон Республикаси\",\"ru\":\"Республика Каракалпакстан\",\"en\":\"Republic of Karakalpakistan\"}'),
(14, '{\"uz\":\"Toshkent shahar\",\"oz\":\"Тошкент шаҳа\",\"ru\":\"Город Ташкент\",\"en\":\"Toshkent city\"}');

-- --------------------------------------------------------

--
-- Структура таблицы `register`
--

CREATE TABLE `register` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` smallint(10) DEFAULT '1',
  `auth_key` varchar(32) NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `secret_key` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `phone`, `password_hash`, `status`, `auth_key`, `created_at`, `updated_at`, `secret_key`, `image`) VALUES
(1, 'bobur', 'usmonkulov94@bk.ru', '+998906550543', '$2y$13$2wPZK5bhqQFF//PDw5kG6.9a5zSUbGKGroVceNaSFHXVsqDd0qYQq', 10, 'zCNyp-JhzQD-eW2g9agGwxUxQNvuEPZL', 1587378372, 1588000441, 'YF2IqdddatBFHAovi3qz0ESP3VlgY9Ht_1588000441', '');

-- --------------------------------------------------------

--
-- Структура таблицы `send_message`
--

CREATE TABLE `send_message` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `verifyCode` varchar(255) NOT NULL,
  `status` smallint(6) DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `send_message`
--

INSERT INTO `send_message` (`id`, `email`, `subject`, `message`, `verifyCode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'usmonkulov5@gamil.com', 'Salom', 'O\'zbekiston butuk davlat', 'ielirot', 0, '2020-02-22 08:10:13', '2020-03-13 15:55:41'),
(2, 'usmonkulov5@gamil.com', 'Salom', 'saqs', 'yingxas', 1, '2020-03-11 13:52:39', '2020-04-20 08:09:53'),
(3, 'usmonkulov5@gamil.com', 'Salom', 'asa', 'qewapx', 1, '2020-03-11 13:55:21', '2020-04-20 08:09:50'),
(4, 'usmonkulov5@gamil.com', 'Salom', 'efdsdw', 'yocosfo', 1, '2020-04-06 04:03:07', '2020-04-06 04:03:07'),
(5, 'usmonkulov5@gamil.com', 'Salom', 'fefddv', 'oiseno', 1, '2020-05-07 03:10:35', '2020-05-07 03:10:35');

-- --------------------------------------------------------

--
-- Структура таблицы `social_networks`
--

CREATE TABLE `social_networks` (
  `id` int(10) NOT NULL,
  `url` text NOT NULL,
  `class` enum('facebook','instagram','google-plus','telegram') NOT NULL,
  `status` smallint(6) DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `social_networks`
--

INSERT INTO `social_networks` (`id`, `url`, `class`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://t.me/bobur_usmonkulov', 'telegram', 1, '2020-03-05 11:44:10', '2020-03-13 12:31:41'),
(2, ' https://www.facebook.com/bobur.usmonkulov.3', 'facebook', 1, '2020-03-05 14:26:19', '2020-03-05 14:26:19'),
(3, 'https://usmonkulov5@gmail.com', 'google-plus', 1, '2020-03-05 14:30:56', '2020-03-05 15:05:55'),
(4, ' https://www.instagram.com/invites/contact/?i=5y0397fl9dql&utm_content=9ymqtyw', 'instagram', 1, '2020-03-05 14:42:52', '2020-03-05 14:42:52');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `image`, `email`, `password_hash`, `status`, `auth_key`, `password_reset_token`, `account_activation_token`, `created_at`, `updated_at`) VALUES
(1, 'doston', '', 'doston1533@gmail.com', '$2y$13$rrpKBcEnPf0R3iQMl4nEyOetvI0jselUKn4bjPnR1uYzrFad90IBq', 10, 'ikC7jEdzPVPAPrGSvXnbcpqAHh2yvuBx', NULL, NULL, 1566550774, 1587278077),
(2, 'adminka', 'uploads/upload/userss/image/15957686395f1d7f3fe2ded5.90888522.jpg', 'usmonkulov5@gmail.com', '$2y$13$2wPZK5bhqQFF//PDw5kG6.9a5zSUbGKGroVceNaSFHXVsqDd0qYQq', 10, 'AYNj_K4Ef_HxsCbZfuCylh69h2iXOSVC', NULL, NULL, 1587126588, 1595768639),
(3, 'lobar', '', 'usmonkulov@gmail.com', '$2y$13$DrZlOUVreL3ADL4Xo32OWuvPE7OWQ/kSzUjfwPR4RwSOgeayAOtMi', 10, 'oegdR0JnvTkG8Dt5ByKg0Ab4_121BQnd', NULL, NULL, 1587192077, 1587275806);

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `status` smallint(6) NOT NULL,
  `view` int(10) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `video`
--

INSERT INTO `video` (`id`, `title`, `url`, `status`, `view`, `created_at`, `updated_at`) VALUES
(1, '{\"uz\":\"CSS #21 DARS Amaliy mashg\'ulot Landing Page 4 qism\",\"ru\":\"CSS # 21 DARS Практика посадки Страница 4\",\"en\":\"CSS # 21 DARS Practice Landing Page 4\"}', '<iframe  src=\"https://www.youtube-nocookie.com/embed/mBDUmwWYvkw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 9, '2020-03-02 10:35:56', '2020-03-13 09:34:09'),
(2, '{\"uz\":\"CSS #20 DARS Amaliy mashg\'ulot Landing Page 3 qism\",\"ru\":\"CSS # 20 DARS Практика посадки Страница 3\",\"en\":\"CSS # 20 DARS Practice Landing Page 3\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/UMSwwL4LAKc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 2, '2020-03-02 16:39:04', '2020-03-13 09:33:15'),
(3, '{\"uz\":\"CSS #19 DARS Amaliy mashg\'ulot Landing Page 2 qism\",\"ru\":\"CSS # 19 DARS Практическая посадка Страница 2\",\"en\":\"CSS # 19 DARS Practice Landing Page 2\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/egTgCli-seo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 1, '2020-03-03 04:34:35', '2020-03-13 09:32:34'),
(4, '{\"uz\":\"CSS #18 DARS. Amaliy mashg\'ulot. Landing Page 1-qism\",\"ru\":\"CSS # 18 DARS. Практическое обучение. Landing Page 1\",\"en\":\"CSS # 18 DARS. Practical training. Landing Page 1\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/PXv41fVCO1Q\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 1, '2020-03-03 04:37:14', '2020-03-13 09:31:52'),
(5, '{\"uz\":\"CSS #18 DARS. Amaliy mashg\'ulot. Landing Page 1-qism\",\"ru\":\"CSS # 18 DARS. Практическое обучение. Landing Page 1\",\"en\":\"CSS # 18 DARS. Practical training. Landing Page 1\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/PXv41fVCO1Q\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 1, '2020-03-03 04:58:25', '2020-03-13 09:31:02'),
(6, '{\"uz\":\"CSS #17-Dars.Registration form\",\"ru\":\"CSS # 17-Урок. Регистрационная форма\",\"en\":\"CSS # 17-Lesson.Registration Form\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/6tYHtCCbnx0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 9, '2020-03-03 04:59:26', '2020-03-13 09:30:10'),
(7, '{\"uz\":\"CSS #16-Dars .Amaliy mashg\'ulot Login form\",\"ru\":\"Урок CSS # 16. Предыдущая форма входа в систему\",\"en\":\"CSS # 16 Lesson .Previous Login Login form\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/3yXVUXUorAw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 0, '2020-03-03 05:03:14', '2020-03-13 09:29:14'),
(8, '{\"uz\":\"CSS #15 DARS MEDIA SOROVLAR\",\"ru\":\"CSS # 15 LESSON MEDIA Опросы\",\"en\":\"CSS # 15 LESSON MEDIA Polls\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/5RZERQxb5y4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 0, '2020-03-03 05:04:10', '2020-03-13 09:28:10'),
(9, '{\"uz\":\"CSS #14-Dars. Menu Amaliyot 2-qism\",\"ru\":\"Урок № CSS # 14. Операции с меню, часть 2\",\"en\":\"Lesson # CSS # 14. Menu Operations Part 2\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/OlIDLmHLm8I\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 0, '2020-03-03 05:05:05', '2020-03-13 09:27:18'),
(10, '{\"uz\":\"CSS #13-Dars. Pseudo class\",\"ru\":\"CSS # 13-Дарс. Псевдо класс\",\"en\":\"CSS # 13. Pseudo class\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/40JY-NmGExU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 4, '2020-03-03 05:05:55', '2020-03-13 09:26:19'),
(11, '{\"uz\":\"CSS #11-Dars. Menu Amaliyot\",\"ru\":\"CSS # 11. Операции с меню\",\"en\":\"CSS # 11. Menu Operations\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/TsrYylab2LM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 1, '2020-03-03 05:06:55', '2020-03-13 09:24:41'),
(12, '{\"uz\":\"CSS #10 Dars. Flexbox\",\"ru\":\"CSS # 10 Урок. Flexbox\",\"en\":\"CSS # 10 Lesson. Flexbox\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/UeEVleKqdKw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 7, '2020-03-03 05:07:54', '2020-03-13 09:23:25'),
(13, '{\"uz\":\"CSS #9 Dars. Position xususiyati va uning qiymatlari.\",\"ru\":\"CSS # 9 Урок. Положение свойства и его значения.\",\"en\":\"CSS # 9 Lesson. Position property and its values.\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/FAEHj7M7Hf4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 9, '2020-03-03 05:08:44', '2020-03-13 09:22:33'),
(14, '{\"uz\":\"CSS #8-Dars. CSS da display xususiyati\",\"ru\":\"CSS # 8. Отображать в CSS\",\"en\":\"CSS # 8. Display in CSS\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/RCb8JOcIF3g\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 0, '2020-03-03 05:09:35', '2020-03-13 09:21:22'),
(15, '{\"uz\":\"CSS #7-Dars. Css da float bilan ishlash.\",\"ru\":\"CSS # 7. Работа с поплавком в Css.\",\"en\":\"CSS # 7. Working with float in Css.\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/32-Wk7l2QU8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 14, '2020-03-03 05:10:35', '2020-03-13 09:20:21'),
(16, '{\"uz\":\"CSS #6-Dars. Css text xususiyatlari va qiymatlari.\",\"ru\":\"CSS # 6. Текстовые свойства и значения CSS.\",\"en\":\"CSS # 6. Css text properties and values.\"}', '<iframe  width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/T7FI0kRgZ8w\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 12, '2020-03-03 05:13:00', '2020-03-13 09:19:07'),
(17, '{\"uz\":\"CSS #5-Dars. Css da Font (Harf va text) xususyatlari bilan ishlash.\",\"ru\":\"CSS # 5. Работа со свойствами шрифта (шрифта и текста) в Css\",\"en\":\"CSS # 5. Working with Font (Font and Text) Properties in Css\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/T7FI0kRgZ8w\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 18, '2020-03-03 05:14:06', '2020-03-13 09:18:19'),
(18, '{\"uz\":\"CSS #4-Dars. Border va background xususiyatlari va ularning qiymatlari.\",\"ru\":\"CSS # 4. Свойства границы и фона и их значения.\",\"en\":\"CSS # 4. Border and background properties and their values.\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/JWbQZWT9Z1M\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 12, '2020-03-03 05:15:03', '2020-03-13 09:17:33'),
(19, '{\"uz\":\"CSS #3-Dars. Css da margin va padding xususiyarlari va ularning qiymatlari.\",\"ru\":\"CSS # 3. Свойства полей и отступов в Css и их значения.\",\"en\":\"CSS # 3. The margin and padding properties in Css and their values.\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/pBfQdxIUurU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 39, '2020-03-03 05:17:17', '2020-03-13 09:16:24'),
(20, '{\"uz\":\"CSS #2 - Dars. CSS eng sodda xususiyatlar\",\"ru\":\"CSS # 2 - Урок. CSS самая простая особенность\",\"en\":\"CSS # 2 - Lesson. CSS is the simplest feature\"}', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/ip-shje6B1s\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 30, '2020-03-03 05:18:52', '2020-03-13 09:15:18'),
(21, '{\"uz\":\"CSS #1 DARS KIRISH\",\"ru\":\"Урок CSS # 1 Введение\",\"en\":\"CSS # 1 LESSON Introduction\"}', '<iframe name=\"iframe_a\" width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/mJ9-TpnQfRw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 38, '2020-03-03 05:19:47', '2020-04-20 08:48:09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book_image`
--
ALTER TABLE `book_image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book_order`
--
ALTER TABLE `book_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Индексы таблицы `book_order_items`
--
ALTER TABLE `book_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_order_id` (`book_order_id`),
  ADD KEY `book_product_id` (`book_product_id`);

--
-- Индексы таблицы `book_product`
--
ALTER TABLE `book_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_category_id` (`book_category_id`),
  ADD KEY `book_author_id` (`book_author_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `register_id` (`register_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `main_logo`
--
ALTER TABLE `main_logo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`register_id`);

--
-- Индексы таблицы `publicity`
--
ALTER TABLE `publicity`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `publicity_image`
--
ALTER TABLE `publicity_image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `send_message`
--
ALTER TABLE `send_message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_networks`
--
ALTER TABLE `social_networks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD UNIQUE KEY `account_activation_token` (`account_activation_token`);

--
-- Индексы таблицы `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `book_author`
--
ALTER TABLE `book_author`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `book_image`
--
ALTER TABLE `book_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `book_order`
--
ALTER TABLE `book_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `book_order_items`
--
ALTER TABLE `book_order_items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `book_product`
--
ALTER TABLE `book_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `main_logo`
--
ALTER TABLE `main_logo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `publicity`
--
ALTER TABLE `publicity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `publicity_image`
--
ALTER TABLE `publicity_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `send_message`
--
ALTER TABLE `send_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `book_order`
--
ALTER TABLE `book_order`
  ADD CONSTRAINT `book_order_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `book_order_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Ограничения внешнего ключа таблицы `book_order_items`
--
ALTER TABLE `book_order_items`
  ADD CONSTRAINT `book_order_items_ibfk_1` FOREIGN KEY (`book_order_id`) REFERENCES `book_order` (`id`),
  ADD CONSTRAINT `book_order_items_ibfk_2` FOREIGN KEY (`book_product_id`) REFERENCES `book_product` (`id`);

--
-- Ограничения внешнего ключа таблицы `book_product`
--
ALTER TABLE `book_product`
  ADD CONSTRAINT `book_product_ibfk_1` FOREIGN KEY (`book_category_id`) REFERENCES `book_category` (`id`),
  ADD CONSTRAINT `book_product_ibfk_2` FOREIGN KEY (`book_author_id`) REFERENCES `book_author` (`id`);

--
-- Ограничения внешнего ключа таблицы `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`register_id`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`register_id`) REFERENCES `register` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
