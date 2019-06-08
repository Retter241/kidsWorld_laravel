-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 02 2019 г., 18:59
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sforum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'от 1 до 2 лет', 'ot-1-do-2-let', '2019-05-25 13:39:07', NULL),
(2, 'от 2 до 3 лет', 'ot-2-do-3-let', '2019-05-25 13:39:07', NULL),
(3, 'от 3 до 4 лет', 'ot-3-do-4-let', '2019-05-25 13:39:07', NULL),
(4, 'от 4 до 5 лет', 'ot-4-do-5-let', '2019-05-25 13:39:07', NULL),
(5, 'от 5 до 6 лет', 'ot-5-do-6-let', '2019-05-25 13:39:07', NULL),
(6, 'Здоровье', 'zdorove', '2019-05-25 13:39:07', NULL),
(7, 'Воспитание', 'vospitanie', '2019-05-25 13:39:07', NULL),
(8, 'Учеба', 'ucheba', '2019-05-25 13:39:07', '2019-05-25 13:43:34'),
(9, 'Творчество', 'tvorchestvo', '2019-05-25 13:39:07', NULL),
(10, 'Спорт', 'sport', '2019-05-25 13:39:07', '2019-05-25 13:43:20');

-- --------------------------------------------------------

--
-- Структура таблицы `category_post`
--

CREATE TABLE `category_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`) VALUES
(2, 1, 1),
(3, 1, 2),
(4, 6, 2),
(7, 1, 3),
(8, 9, 3),
(9, 10, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `body`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(35, 1, 'Комментарий к первой теме', 10, 'App\\Topic', '2019-05-30 16:47:58', '2019-05-30 16:47:58'),
(36, 1, 'Коммент к 1 теме', 11, 'App\\Topic', '2019-05-30 16:54:29', '2019-05-30 16:54:29'),
(37, 1, 'Коммент к 3 теме', 12, 'App\\Topic', '2019-05-30 16:56:07', '2019-05-30 16:56:07'),
(38, 1, 'Коммент к 1 посту', 1, 'App\\Post', '2019-05-30 17:41:47', '2019-05-30 17:41:47'),
(39, 1, 'Комментарий для kids world post', 2, 'App\\Post', '2019-05-30 18:04:30', '2019-05-30 18:04:30'),
(40, 1, 'Комментарий -3', 3, 'App\\Post', '2019-05-30 18:07:00', '2019-05-30 18:07:00'),
(41, 2, 'комментарий юзера 1', 13, 'App\\Topic', '2019-06-02 11:19:52', '2019-06-02 11:19:52'),
(42, 2, 'комментарий юзера 2', 13, 'App\\Topic', '2019-06-02 11:20:01', '2019-06-02 11:20:01'),
(43, 2, 'комментарий юзера 2', 13, 'App\\Topic', '2019-06-02 11:20:01', '2019-06-02 11:20:01'),
(44, 2, 'комментарий юзера 2', 13, 'App\\Topic', '2019-06-02 11:20:01', '2019-06-02 11:20:01'),
(45, 2, 'Юзер к посту 1 й коммент', 1, 'App\\Post', '2019-06-02 12:04:04', '2019-06-02 12:04:04'),
(47, 2, 'чсчясясчссячсчясячсчсячсчс', 14, 'App\\Topic', '2019-06-02 12:11:01', '2019-06-02 12:11:01'),
(48, 2, 'еукекееуеукеуеуке', 14, 'App\\Topic', '2019-06-02 12:11:47', '2019-06-02 12:11:47'),
(53, 1, 'bvnvbnbvnvnv', 14, 'App\\Topic', '2019-06-02 12:55:42', '2019-06-02 12:55:42');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(445, '2014_10_12_000000_create_users_table', 1),
(446, '2014_10_12_100000_create_password_resets_table', 1),
(447, '2019_05_24_212853_create_posts_table', 1),
(448, '2019_05_24_214732_create_categories_table', 1),
(449, '2019_05_24_220339_create_category_post_table', 1),
(450, '2019_05_24_221426_create_topics_table', 1),
(451, '2019_05_24_221947_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text,
  `content` text,
  `alias` varchar(150) NOT NULL,
  `img` varchar(191) DEFAULT NULL,
  `author_id` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `desc`, `content`, `alias`, `img`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 'Про детей от 1 до 2 лет', 'Описание про детей от 1 до 2 лет', '<p>Контент&nbsp;&nbsp;про детей от 1 до 2 лет&nbsp;Контент&nbsp;&nbsp;про детей от 1 до 2 лет&nbsp;Контент&nbsp;&nbsp;про детей от 1 до 2 лет&nbsp;Контент&nbsp;&nbsp;про детей от 1 до 2 лет&nbsp;Контент&nbsp;&nbsp;про детей от 1 до 2 лет&nbsp;Контент&nbsp;&nbsp;про детей от 1 до 2 лет&nbsp;</p>', 'pro-detej-ot-1-do-2-let', '187771_2.jpg', '1', '2019-05-30 17:29:23', '2019-05-30 17:38:29'),
(2, 'KID\'SWORLD', 'Этот интернет-журнал станет лучшим другом для Вас и ваших детей.', '<p>Этот интернет-журнал станет лучшим другом для Вас и ваших детей. Здесь Вы сможете найти интересующую Вас информацию об обучении, воспитании и развитии вашего ребёнка! У каждого родителя в процессе воспитания и развития ребёнка возникает масса вопросов, на которые непросто найти однозначный ответ.</p>', 'kid\'sworld', '14546g7.jpg', '1', '2019-05-30 18:01:52', '2019-05-30 18:01:52'),
(3, 'КАКУЮ ИНФОРМАЦИЮ МОЖНО НАЙТИ НА ДАННОМ САЙТЕ?', 'КАКУЮ ИНФОРМАЦИЮ МОЖНО НАЙТИ НА ДАННОМ САЙТЕ', '<p>Данный сайт обобщит практическую информацию, которую родителям приходится время от времени искать и применять в жизни. Данный сайт про воспитание и развитие детей. На нем представлена информации о здоровье детей, подготовке их к школе, о развитии у ребенка разнообразных творческих и умственных навыков: рисование, чтение, логическое и математическое мышление, тренировка памяти.</p>', 'kakuju-informaciju-mozhno-najti-na-dannom-sajte', '162231_2_study.jpg', '1', '2019-05-30 18:05:57', '2019-05-30 18:05:57');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(191) DEFAULT NULL,
  `author_id` varchar(191) NOT NULL,
  `alias` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `title`, `img`, `author_id`, `alias`, `created_at`, `updated_at`) VALUES
(10, 'Вторая тема на форуме', NULL, '1', 'vtoraja-tema-na-forume', '2019-05-30 16:45:49', '2019-05-30 16:45:49'),
(11, 'Первая тема на форуме', NULL, '1', 'pervaja-tema-na-forume', '2019-05-30 16:46:42', '2019-05-30 16:46:42'),
(12, 'Третья тема на форуме', NULL, '1', 'tretja-tema-na-forume', '2019-05-30 16:47:00', '2019-05-30 16:47:00'),
(13, '4 тема форума', NULL, '1', '4-tema-foruma', '2019-06-02 11:16:02', '2019-06-02 11:16:02'),
(14, 'тема юзера н 1-44', NULL, '2', 'tema-juzera-n-1-', '2019-06-02 12:09:22', '2019-06-02 12:13:46'),
(15, 'ТЕМА ЮЗЕРА Н 2-2', NULL, '2', 'tema-juzera-n-2', '2019-06-02 12:09:30', '2019-06-02 12:17:27');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.ru', NULL, '$2y$10$yTEeU3pTUdGT7mVrE7XmzuMFOfxi0ILTYC8BYkRgcMexMNnxAQIsq', NULL, '2019-05-25 10:39:07', NULL),
(2, 'user1', 'user1@mail.ru', NULL, '$2y$10$qTiMt0pQdk63bhoSSbw6Ie.KYe3tqjXWAZtLjhWyqDNPVNtg6bms2', NULL, '2019-05-25 10:39:07', '2019-06-02 12:10:18');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_alias_unique` (`alias`);

--
-- Индексы таблицы `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_post_category_id_foreign` (`category_id`),
  ADD KEY `category_post_post_id_foreign` (`post_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_id_unique` (`id`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topics_id_unique` (`id`),
  ADD UNIQUE KEY `topics_alias_unique` (`alias`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
