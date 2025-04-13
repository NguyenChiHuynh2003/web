-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 13, 2025 lúc 03:18 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phpweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('web_cache_b1d5781111d84f7b3fe45a0852e59758cd7a87e5', 'i:1;', 1743940336),
('web_cache_b1d5781111d84f7b3fe45a0852e59758cd7a87e5:timer', 'i:1743940336;', 1743940336),
('web_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1743941938),
('web_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1743941938;', 1743941938),
('web_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:2:{i:0;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:4:\"read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:1;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:3:\"all\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:6;i:1;i:7;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:8;s:1:\"b\";s:4:\"user\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:6;s:1:\"b\";s:11:\"super-admin\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:7;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1744461860),
('web_cache_superadmin@gmail.coms|127.0.0.1', 'i:2;', 1744386920),
('web_cache_superadmin@gmail.coms|127.0.0.1:timer', 'i:1744386920;', 1744386920);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_29_104544_create_customers_table', 1),
(5, '2025_03_30_073525_add_column_user', 1),
(6, '2025_03_30_090055_create_permission_tables', 1),
(7, '2025_03_30_090217_add_is_admin_to_users_table', 1),
(8, '2025_03_30_162624_add_deleted_at_to_users_table', 2),
(9, '2025_04_04_101443_create_posts_table', 3),
(10, '2025_04_05_064527_create_posts_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(6, 'App\\Models\\User', 10),
(6, 'App\\Models\\User', 14),
(6, 'App\\Models\\User', 16),
(6, 'App\\Models\\User', 17),
(7, 'App\\Models\\User', 11),
(8, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 'read', 'web', '2025-04-03 10:27:24', '2025-04-03 10:27:24'),
(10, 'all', 'web', '2025-04-03 10:27:29', '2025-04-03 10:27:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'sự trả thù của bầy cừu', 'su-tra-thu-cua-bay-cuu', '<p>abc</p>', NULL, '2025-04-04 23:47:35', '2025-04-04 23:47:35'),
(2, 'test lần 1', 'test-lan-1', '<p><strong style=\"text-decoration: underline;\"><em>bài viết thử lần 1</em></strong></p>', NULL, '2025-04-05 04:36:34', '2025-04-05 04:36:34'),
(3, 'abcbcbc', 'abcbcbc', '<h2>dadgajfafg<a href=\"http://127.0.0.1:8000/admin\"><span style=\"text-decoration: underline;\">ajgfada</span></a></h2>', NULL, '2025-04-05 06:25:47', '2025-04-05 06:25:47'),
(4, 'Ông Trump yêu cầu Mỹ dừng đúc xu 1 cent', 'ong-trump-yeu-cau-my-dung-duc-xu-1-cent', '<p>Ngày 9/2, Tổng thống Mỹ Donald Trump cho biết ông đã chỉ đạo Bộ trưởng Tài chính Scott Bessent dừng đúc xu 1 cent (penny) vì chi phí quá cao.</p><p>\"Suốt thời gian dài, Mỹ đã đúc xu 1 cent với giá hơn 2 cent. Việc này quá lãng phí. Tôi đã chỉ đạo Bộ trưởng Tài chính dừng việc sản xuất xu mới. Hãy loại bỏ sự lãng phí ra khỏi ngân sách của chúng ta, dủ chỉ là 1 cent\", ông viết trên trang cá nhân.</p><p>Đồng penny đã bị chú ý từ nhiều năm qua. Tháng trước, quá trình loại bỏ đồng này tăng tốc sau khi Ban Hiệu suất Chính phủ (DOGE) do tỷ phú Elon Musk đứng đầu công bố chi phí sản xuất đồng penny là hơn 3 cent, tiêu tốn hơn 179 triệu USD trong tài khóa 2023. \"Sở Đúc tiền Mỹ đã sản xuất 4,5 tỷ đồng penny trong tài khóa 2023\", bài đăng của DOGE viết.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:431,&quot;url&quot;:&quot;https://i1-kinhdoanh.vnecdn.net/2025/02/10/one-cent-1739175499-3746-1739175695.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=fgCt-gxFVIssPbWN8d4Hkg&quot;,&quot;width&quot;:680}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://i1-kinhdoanh.vnecdn.net/2025/02/10/one-cent-1739175499-3746-1739175695.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=fgCt-gxFVIssPbWN8d4Hkg\" width=\"680\" height=\"431\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p>Các đồng xu 1 cent của Mỹ. Ảnh: <em>Everyday Cheapskate</em></p><p>Trong báo cáo thường niên, Sở Đúc tiền Mỹ cho biết trong tài khóa 2024, chi phí đúc và phân phối một đồng penny là 3,7 cent. Số liệu này tăng hơn 20% so với năm trước đó. Một phần nguyên nhân là giá nguyên liệu, gồm kẽm và đồng, tăng lên.</p><p>Năm ngoái, một bài đăng trên <em>New York Times</em> cũng kêu gọi bỏ đồng penny. \"Sự cần thiết phải loại bỏ đồng xu này là quá rõ ràng với những người nắm quyền\", bài báo viết. Năm 2013, một bài bình luận trên website Viện nghiên cứu Brooking thậm chí kêu gọi Mỹ đừng đúc cả xu 1 cent lẫn 5 cent.</p><p>Đồng penny được chính phủ Mỹ phát hành lần đầu năm 1793. Từ năm 1909, mặt chính của đồng xu này in chân dung Tổng thống Abraham Lincoln.</p><p>Những người ủng hộ đồng penny cho rằng đồng này giúp giữ giá cả tiêu dùng ở mức thấp, đồng thời là nguồn thu cho các tổ chức từ thiện. Ngược lại, những người phản đối chỉ thấy xu 1 cent phiền phức. Họ thường bỏ lại trong ngăn kéo, lợn đất hay gạt tàn.</p>', NULL, '2025-04-05 06:28:47', '2025-04-05 06:28:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quocgia`
--

CREATE TABLE `quocgia` (
  `IDQG` int(11) NOT NULL,
  `TENQG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quocgia`
--

INSERT INTO `quocgia` (`IDQG`, `TENQG`) VALUES
(1, 'Anh'),
(2, 'Cộng Hòa Séc'),
(3, 'Đan Mạch'),
(4, 'Khu vực Euro'),
(5, 'Hungary'),
(6, 'Na Uy'),
(7, 'Nga'),
(8, 'Thụy Điển'),
(9, 'Thụy Sĩ'),
(10, 'Áo'),
(11, 'Hy Lạp'),
(12, 'Ý'),
(13, 'Slovania'),
(14, 'Ba Lan'),
(15, 'Romania'),
(16, 'Belarus'),
(17, 'Bỉ'),
(18, 'Pháp'),
(19, 'Đức'),
(20, 'Bồ Đào Nha'),
(21, 'Hà Lan'),
(22, 'Phần Lan'),
(23, 'IreLand'),
(24, 'Slovakia'),
(25, 'Latvia'),
(26, 'Litva'),
(27, 'Cộng Hòa Síp'),
(28, 'Estonia'),
(29, 'Luxembourg'),
(30, 'Malta'),
(31, 'Croatia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(6, 'super-admin', 'web', '2025-04-03 10:27:46', '2025-04-03 10:27:46'),
(7, 'admin', 'web', '2025-04-03 10:27:57', '2025-04-03 10:27:57'),
(8, 'user', 'web', '2025-04-03 10:28:09', '2025-04-03 10:28:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 8),
(10, 6),
(10, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1Smb8MkT11qsMeMHt8qkY8aRJJtBI5XImfKQoVHc', 10, '192.168.1.3', 'Mozilla/5.0 (Linux; Android 12; V2111 Build/SP1A.210812.003; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/134.0.6998.135 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTXcyenI2a0hva00wTTJIcndRWXlMMGEzQjFnU0dKV2wxcTlrOFdQVyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTkyLjE2OC4xLjEwMDo4MDAwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwO30=', 1744457952),
('3Ey22wuD3CEWcpti9juEgItWFSjr9laOKP0tfO34', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaEhtYVVOMUVtWFpnRzk5SXVjd0NCUjA5Rk9uRlZvN1d5RmU5S1hRUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDt9', 1744389140),
('7rkYQCPr72HjMrwsmuJ4Aj1TxxnVdB0kttfC8xL6', 10, '192.168.1.3', 'Mozilla/5.0 (Linux; Android 12; V2111 Build/SP1A.210812.003; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/134.0.6998.135 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTHI0YUZxQ0xvSDJuRzNnbFdkekVKM1VlQVo5eUdOR3NyclVwVEZCNiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTkyLjE2OC4xLjEwMDo4MDAwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwO30=', 1744459378),
('APeYESXpxNsUCtxtwohKN9YZV5D7idZA6usIO3ll', 10, '192.168.1.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYkhBS3AzMGg4S1YwSU1PamI4UlI1VkV6SUMwMjhyM0hGWHRaajFLcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xOTIuMTY4LjEuMTAwOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7fQ==', 1744465524),
('CaGpNh810z2LSubEJfkypYRgawk4ju13RY9q4oUt', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieWg4RlN5enh4RkxWeGs5emJPUVRVczRaUWVNcEJTajd1dkVEMjczZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDt9', 1744443088),
('D0Gb7zH8HZ848j498mSTbW9LjK13VrHA3J9x6noY', 5, '192.168.1.3', 'Mozilla/5.0 (Linux; Android 12; V2111 Build/SP1A.210812.003; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/134.0.6998.135 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiazF0d2J6VUcxdUZPcEY5azVWb0RZV290OU5qV24weWpMNngwV2FkQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xOTIuMTY4LjEuMTAwOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1744460441),
('uIIWAp5gVlSs2OEe080B9xpD3itaILnB2hCoPpPN', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibU4xUzlJV0xUSldZaXBKSU51cHJycmpJQjFoSjVvNEJpSTJvMzRlbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJEU3b2U5bEhTa1lxVnpid28zUmsuRGVNSlFicTZwLmtQaWFXMDNSSGx5ZDM1ajFjOTZGYnp5Ijt9', 1744377918),
('XLPzhdQReV33dT4Da7KnltmNtm6tvkfPxfT05Ls9', 10, '192.168.1.9', 'Mozilla/5.0 (Linux; Android 12; V2111 Build/SP1A.210812.003; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/134.0.6998.135 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib0NYYmYySEpTOVkyZW1CTjZ5SlVxcDdoczB6RHh5bm85S1pNZHRhcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xOTIuMTY4LjEuMTAwOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7fQ==', 1744514605),
('ypX1orA5KtXSU5P3eQonhbmtqpdL8xMLxBe6qOUz', 10, '192.168.1.100', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWnlLamtuUWhra28xa0FJU3M4NEk2YnJrakZHRDViOHVOSzREd2ZuZiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTkyLjE2OC4xLjEwMDo4MDAwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwO30=', 1744457196),
('Z9SFZXZKWla03rqMOPxXqhKyWdpsLnnNWEuI3iZR', 10, '192.168.1.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiajR6djNreW9BYnpGNW5CdlNLRkEySWNwVnJ5Y1lVYWxoOVdjOElQNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xOTIuMTY4LjEuMTAwOjgwMDAvYWNjb3VudCI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDt9', 1744544005),
('zpSQFS1LJJxnB7TLRoPuG043sMloRYDq4cjJVRzJ', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVnVwT0FobTZFYUR6dUZ2QzF3SHJ5WkFhajRMWHliUkFXcDhzNTVzTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzU6Imh0dHA6Ly9kOGJkLTI0MDItODAwLTYzYjUtZGNiMS1iOWE1LWJlZTEtZmM5MC1jM2VkLm5ncm9rLWZyZWUuYXBwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwO30=', 1744376826);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text DEFAULT NULL,
  `SDT` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `is_admin`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`, `SDT`, `deleted_at`) VALUES
(1, 'Test User', 0, 'test@example.com', '2025-03-30 06:54:07', '$2y$12$IgLHPYnGTWIizfQtXQrB1OAgLxLgCbwC8hwOyBvGsRcQkkagU29lK', 'c227eEENiT', '2025-03-30 06:54:07', '2025-04-03 10:40:02', NULL, NULL, '2025-04-03 10:40:02'),
(2, 'Admin', 1, 'admin123@example.com', '2025-03-30 06:59:40', '$2y$12$7Q2xYSEYW4J6Z1eMsmho..wgrO.J4tkxQxjSMldvsTwN6lnr2xl4u', NULL, '2025-03-30 06:59:42', '2025-03-30 10:11:15', NULL, NULL, '2025-03-30 10:11:15'),
(5, 'admin', 1, 'admin@gmail.com', NULL, '$2y$12$BAK.0rt1IpiY09E0OXplw.OuNqUf1wKL551WEt4bCyiTHv017JTNa', '4JGB6VG9bVfI6gMqz3KTlvfhwFutHuFBt9h0SGhd0HXLVA3dJPRufGLYc3cn', '2025-03-30 07:04:45', '2025-04-01 10:25:04', 'customers/01JQKNX0GFFEADXV04CF89JCBP.jpg', '0967254824', NULL),
(6, 'huynh', 1, 'huynh@gmail.com', NULL, '$2y$12$g.sfTvDis9CJYN.cvgBnWOICeZEZnaJk1lwaIUn4nAwkhvu5KCSfG', NULL, '2025-03-30 09:44:39', '2025-04-03 10:40:16', NULL, '0967254824', '2025-04-03 10:40:16'),
(9, 'huynh', 0, 'admin456@gmail.com', NULL, '$2y$12$hmxzuEc0Rn4asG0Q6nPhGun9ljlK66nL6tR/tWAY1XzbJe5fERHLS', NULL, '2025-04-01 04:28:05', '2025-04-06 04:49:41', NULL, NULL, '2025-04-06 04:49:41'),
(10, 'Super Admin', 0, 'superadmin@gmail.com', NULL, '$2y$12$E7oe9lHSkYqVzbwo3Rk.DeMJQbq6p.kPiaW03RHlyd35j1c96Fbzy', NULL, '2025-04-03 10:34:38', '2025-04-13 04:33:24', 'avatars/k90SpHObNkboNf6uk4ZacJiVwyi7oqqyC9fm8DKQ.png', NULL, NULL),
(11, 'admincap1', 1, 'admincap1@gmail.com', NULL, '$2y$12$OD0BAh6NJW7qHni5nMr5zOLRzdLze19qcKi3kLixViv93Qd.5sl4m', NULL, '2025-04-03 10:35:39', '2025-04-03 10:39:52', NULL, NULL, '2025-04-03 10:39:52'),
(12, 'huynh', 0, 'user@gmail.com', NULL, '$2y$12$6OTz/Ny9bnRr/oNUf.oMXul1Mh4U1OA0hVHTKEJATAOcrluU7IaxC', NULL, '2025-04-03 10:40:50', '2025-04-03 10:40:50', NULL, NULL, NULL),
(14, 'huynh', 0, 'huynh123@gmail.com', NULL, '$2y$12$MFQtW2ilXl22v.tgV2rfIuNvYzcs8hEFSxtA2C6pRw3nXRqs1E8DO', 'hzXuAeXD8zjw1XXJxh9yHotKvkLsBMkVrj0k4JjAIOC3ScXT8NcF344Vwxwi', '2025-04-03 10:42:40', '2025-04-06 04:49:56', NULL, NULL, '2025-04-06 04:49:56'),
(15, 'huynh', 0, 'huynh1234@gmail.com', NULL, '$2y$12$jf0pvqMJxhqkncEijc9vgeIBHehv4TTplU2EErSEVG9pLLkHX2lqS', NULL, '2025-04-04 00:37:38', '2025-04-06 04:49:48', NULL, NULL, '2025-04-06 04:49:48'),
(16, 'huynhsupersaiya', 1, 'superadmin123@gmail.com', NULL, '$2y$12$9tjyPtEJ0EENaScBecBz9.VyfxPXjsjN.e4V7L3JHQb9hq3CyaJn6', NULL, '2025-04-06 04:51:20', '2025-04-06 05:02:03', '01JR5F1R80YNP7XP011ESKYMGW.jpg', NULL, NULL),
(17, 'vegerta', 0, 'adminvegeta@gmail.com', NULL, '$2y$12$uD5tCQ8/UL5v0/KLSry7POD1GPDoqfX5s3igv4sG9gov6L1/afeam', NULL, '2025-04-06 04:57:11', '2025-04-06 05:01:42', NULL, '0967254824', '2025-04-06 05:01:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xu`
--

CREATE TABLE `xu` (
  `IDXU` int(11) NOT NULL,
  `TENXU` varchar(50) NOT NULL,
  `IDQG` int(11) NOT NULL,
  `HINHANH` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xu`
--

INSERT INTO `xu` (`IDXU`, `TENXU`, `IDQG`, `HINHANH`) VALUES
(1, '1 penney', 1, 'C:HocLapTrinhLUANVANVIPVIPIMG1.jpg'),
(2, '2 pence', 1, 'C:HocLapTrinhLUANVANVIPVIPIMG2.jpg'),
(3, '5 pence', 1, 'C:HocLapTrinhLUANVANVIPVIPIMG3.jpg'),
(4, '10 pence', 1, 'C:HocLapTrinhLUANVANVIPVIPIMG4.jpg'),
(5, '20 pence', 1, 'C:HocLapTrinhLUANVANVIPVIPIMG5.jpg'),
(6, '50 pence', 1, 'C:HocLapTrinhLUANVANVIPVIPIMG6.jpg'),
(7, '1 pound', 1, 'C:HocLapTrinhLUANVANVIPVIPIMG7.jpg'),
(8, '2 pound', 1, 'C:HocLapTrinhLUANVANVIPVIPIMG8.jpg'),
(9, '10 czech', 2, 'C:HocLapTrinhLUANVANVIPVIPIMG9.jpg'),
(10, '20 czech', 2, 'C:HocLapTrinhLUANVANVIPVIPIMG10.jpg'),
(11, '50 czech', 2, 'C:HocLapTrinhLUANVANVIPVIPIMG11.jpg'),
(12, '1 Koruna czech', 2, 'C:HocLapTrinhLUANVANVIPVIPIMG12.jpg'),
(13, '2 Koruna czech', 2, 'C:HocLapTrinhLUANVANVIPVIPIMG13.jpg'),
(14, '5 Koruna czech', 2, 'C:HocLapTrinhLUANVANVIPVIPIMG14.jpg'),
(15, '10 Krouna czech', 2, 'C:HocLapTrinhLUANVANVIPVIPIMG15.jpg'),
(16, '20 Krouna czech', 2, 'C:HocLapTrinhLUANVANVIPVIPIMG16.jpg'),
(17, '50 Krouna czech', 2, 'C:HocLapTrinhLUANVANVIPVIPIMG17.jpg'),
(18, '25 ore', 3, 'C:HocLapTrinhLUANVANVIPVIPIMG18.jpg'),
(19, '50 ore', 3, 'C:HocLapTrinhLUANVANVIPVIPIMG19.jpg'),
(20, '1 Krone', 3, 'C:HocLapTrinhLUANVANVIPVIPIMG20.jpg'),
(21, '2 Krone', 3, 'C:HocLapTrinhLUANVANVIPVIPIMG21.jpg'),
(22, '5 Krone', 3, 'C:HocLapTrinhLUANVANVIPVIPIMG22.jpg'),
(23, '10 Krone', 3, 'C:HocLapTrinhLUANVANVIPVIPIMG23.jpg'),
(24, '20 Krone', 3, 'C:HocLapTrinhLUANVANVIPVIPIMG24.jpg'),
(25, '1 cent', 4, 'C:HocLapTrinhLUANVANVIPVIPIMG25.jpg'),
(26, '2 cent', 4, 'C:HocLapTrinhLUANVANVIPVIPIMG26.jpg'),
(27, '5 cent', 4, 'C:HocLapTrinhLUANVANVIPVIPIMG27.jpg'),
(28, '10 cent', 4, 'C:HocLapTrinhLUANVANVIPVIPIMG28.jpg'),
(29, '20 cent', 4, 'C:HocLapTrinhLUANVANVIPVIPIMG29.jpg'),
(30, '50 cent', 4, 'C:HocLapTrinhLUANVANVIPVIPIMG30.jpg'),
(31, '1 euro', 4, 'C:HocLapTrinhLUANVANVIPVIPIMG31.jpg'),
(32, '2 euro', 4, 'C:HocLapTrinhLUANVANVIPVIPIMG32.jpg'),
(33, '1 forint', 5, 'C:HocLapTrinhLUANVANVIPVIPIMG33.jpg'),
(34, '2 forint', 5, 'C:HocLapTrinhLUANVANVIPVIPIMG34.jpg'),
(35, '5 forint', 5, 'C:HocLapTrinhLUANVANVIPVIPIMG35.jpg'),
(36, '10 forint', 5, 'C:HocLapTrinhLUANVANVIPVIPIMG36.jpg'),
(37, '20 forint', 5, 'C:HocLapTrinhLUANVANVIPVIPIMG37.jpg'),
(38, '50 forint', 5, 'C:HocLapTrinhLUANVANVIPVIPIMG38.jpg'),
(39, '100 forint', 5, 'C:HocLapTrinhLUANVANVIPVIPIMG39.jpg'),
(40, '200 forint', 5, 'C:HocLapTrinhLUANVANVIPVIPIMG40.jpg'),
(41, '50 ore', 6, 'C:HocLapTrinhLUANVANVIPVIPIMG41.jpg'),
(42, '1 Krone', 6, 'C:HocLapTrinhLUANVANVIPVIPIMG42.jpg'),
(43, '5 Krone', 6, 'C:HocLapTrinhLUANVANVIPVIPIMG43.jpg'),
(44, '10 Krone', 6, 'C:HocLapTrinhLUANVANVIPVIPIMG44.jpg'),
(45, '20 Krone', 6, 'C:HocLapTrinhLUANVANVIPVIPIMG45.jpg'),
(46, '1 Kopek', 7, 'C:HocLapTrinhLUANVANVIPVIPIMG46.jpg'),
(47, '5 Kopek', 7, 'C:HocLapTrinhLUANVANVIPVIPIMG47.jpg'),
(48, '10 Kopek', 7, 'C:HocLapTrinhLUANVANVIPVIPIMG48.jpg'),
(49, '50 Kopke', 7, 'C:HocLapTrinhLUANVANVIPVIPIMG49.jpg'),
(50, '1 Ruble', 7, 'C:HocLapTrinhLUANVANVIPVIPIMG50.jpg'),
(51, '2 Ruble', 7, 'C:HocLapTrinhLUANVANVIPVIPIMG51.jpg'),
(52, '5 Ruble', 7, 'C:HocLapTrinhLUANVANVIPVIPIMG52.jpg'),
(53, '10 Ruble', 7, 'C:HocLapTrinhLUANVANVIPVIPIMG53.jpg'),
(54, '10 ore', 8, 'C:HocLapTrinhLUANVANVIPVIPIMG54.jpg'),
(55, '50 ore', 8, 'C:HocLapTrinhLUANVANVIPVIPIMG55.jpg'),
(56, '1 Krona', 8, 'C:HocLapTrinhLUANVANVIPVIPIMG56.jpg'),
(57, '2 Krona', 8, 'C:HocLapTrinhLUANVANVIPVIPIMG57.jpg'),
(58, '5 Krona', 8, 'C:HocLapTrinhLUANVANVIPVIPIMG58.jpg'),
(59, '10 Krona', 8, 'C:HocLapTrinhLUANVANVIPVIPIMG59.jpg'),
(60, '1 Rappen', 9, 'C:HocLapTrinhLUANVANVIPVIPIMG60.jpg'),
(61, '5 Rappen', 9, 'C:HocLapTrinhLUANVANVIPVIPIMG61.jpg'),
(62, '10 Rappen', 9, 'C:HocLapTrinhLUANVANVIPVIPIMG62.jpg'),
(63, '20 Rappen', 9, 'C:HocLapTrinhLUANVANVIPVIPIMG63.jpg'),
(64, '1/2 franc', 9, 'C:HocLapTrinhLUANVANVIPVIPIMG64.jpg'),
(65, '1 franc', 9, 'C:HocLapTrinhLUANVANVIPVIPIMG65.jpg'),
(66, '2 franc', 9, 'C:HocLapTrinhLUANVANVIPVIPIMG66.jpg'),
(67, '5 franc', 9, 'C:HocLapTrinhLUANVANVIPVIPIMG67.jpg'),
(68, '1 cent', 10, 'C:HocLapTrinhLUANVANVIPVIPIMG68.jpg'),
(69, '2 cent', 10, 'C:HocLapTrinhLUANVANVIPVIPIMG69.jpg'),
(70, '5 cent', 10, 'C:HocLapTrinhLUANVANVIPVIPIMG70.jpg'),
(71, '10 cent', 10, 'C:HocLapTrinhLUANVANVIPVIPIMG71.jpg'),
(72, '20 cent', 10, 'C:HocLapTrinhLUANVANVIPVIPIMG72.jpg'),
(73, '50 cent', 10, 'C:HocLapTrinhLUANVANVIPVIPIMG73.jpg'),
(74, '1 euro', 10, 'C:HocLapTrinhLUANVANVIPVIPIMG74.jpg'),
(75, '2 euro', 10, 'C:HocLapTrinhLUANVANVIPVIPIMG75.jpg'),
(76, '1 cent', 11, 'C:HocLapTrinhLUANVANVIPVIPIMG76.jpg'),
(77, '2 cent', 11, 'C:HocLapTrinhLUANVANVIPVIPIMG77.jpg'),
(78, '5 cent', 11, 'C:HocLapTrinhLUANVANVIPVIPIMG78.jpg'),
(79, '10 cent', 11, 'C:HocLapTrinhLUANVANVIPVIPIMG79.jpg'),
(80, '20 cent', 11, 'C:HocLapTrinhLUANVANVIPVIPIMG80.jpg'),
(81, '50 cent', 11, 'C:HocLapTrinhLUANVANVIPVIPIMG81.jpg'),
(82, '1 euro', 11, 'C:HocLapTrinhLUANVANVIPVIPIMG82.jpg'),
(83, '2 euro', 11, 'C:HocLapTrinhLUANVANVIPVIPIMG83.jpg'),
(84, '1 cent', 12, 'C:HocLapTrinhLUANVANVIPVIPIMG84.jpg'),
(85, '2 cent', 12, 'C:HocLapTrinhLUANVANVIPVIPIMG85.jpg'),
(86, '5 cent', 12, 'C:HocLapTrinhLUANVANVIPVIPIMG86.jpg'),
(87, '10 cent', 12, 'C:HocLapTrinhLUANVANVIPVIPIMG87.jpg'),
(88, '20 cent', 12, 'C:HocLapTrinhLUANVANVIPVIPIMG88.jpg'),
(89, '50 cent', 12, 'C:HocLapTrinhLUANVANVIPVIPIMG89.jpg'),
(90, '1 euro', 12, 'C:HocLapTrinhLUANVANVIPVIPIMG90.jpg'),
(91, '2 euro', 12, 'C:HocLapTrinhLUANVANVIPVIPIMG91.jpg'),
(92, '1 cent', 13, 'C:HocLapTrinhLUANVANVIPVIPIMG92.jpg'),
(93, '2 cent', 13, 'C:HocLapTrinhLUANVANVIPVIPIMG93.jpg'),
(94, '5 cent', 13, 'C:HocLapTrinhLUANVANVIPVIPIMG94.jpg'),
(95, '10 cent', 13, 'C:HocLapTrinhLUANVANVIPVIPIMG95.jpg'),
(96, '20 cent', 13, 'C:HocLapTrinhLUANVANVIPVIPIMG96.jpg'),
(97, '50 cent', 13, 'C:HocLapTrinhLUANVANVIPVIPIMG97.jpg'),
(98, '1 euro', 13, 'C:HocLapTrinhLUANVANVIPVIPIMG98.jpg'),
(99, '2 euro', 13, 'C:HocLapTrinhLUANVANVIPVIPIMG99.jpg'),
(100, '1gr', 14, 'C:HocLapTrinhLUANVANVIPVIPIMG100.jpg'),
(101, '2gr', 14, 'C:HocLapTrinhLUANVANVIPVIPIMG101.jpg'),
(102, '5gr', 14, 'C:HocLapTrinhLUANVANVIPVIPIMG102.jpg'),
(103, '10gr', 14, 'C:HocLapTrinhLUANVANVIPVIPIMG103.jpg'),
(104, '20gr', 14, 'C:HocLapTrinhLUANVANVIPVIPIMG104.jpg'),
(105, '50gr', 14, 'C:HocLapTrinhLUANVANVIPVIPIMG105.jpg'),
(106, '1 groszy', 14, 'C:HocLapTrinhLUANVANVIPVIPIMG106.jpg'),
(107, '2 groszy', 14, 'C:HocLapTrinhLUANVANVIPVIPIMG107.jpg'),
(108, '5 groszy', 14, 'C:HocLapTrinhLUANVANVIPVIPIMG108.jpg'),
(109, '1 bani', 15, 'C:HocLapTrinhLUANVANVIPVIPIMG109.jpg'),
(110, '5 bani', 15, 'C:HocLapTrinhLUANVANVIPVIPIMG110.jpg'),
(111, '10 bani', 15, 'C:HocLapTrinhLUANVANVIPVIPIMG111.jpg'),
(112, '50 bani', 15, 'C:HocLapTrinhLUANVANVIPVIPIMG112.jpg'),
(113, '1 kapeyka', 16, 'C:HocLapTrinhLUANVANVIPVIPIMG113.jpg'),
(114, '2 kapeyka', 16, 'C:HocLapTrinhLUANVANVIPVIPIMG114.jpg'),
(115, '5 kapeyka', 16, 'C:HocLapTrinhLUANVANVIPVIPIMG115.jpg'),
(116, '10 kapeyka', 16, 'C:HocLapTrinhLUANVANVIPVIPIMG116.jpg'),
(117, '20 kapeyka', 16, 'C:HocLapTrinhLUANVANVIPVIPIMG117.jpg'),
(118, '50 kapeyka', 16, 'C:HocLapTrinhLUANVANVIPVIPIMG118.jpg'),
(119, '1 franc', 17, 'C:HocLapTrinhLUANVANVIPVIPIMG119.jpg'),
(120, '5 franc', 17, 'C:HocLapTrinhLUANVANVIPVIPIMG120.jpg'),
(121, '20 franc', 17, 'C:HocLapTrinhLUANVANVIPVIPIMG121.jpg'),
(122, '50 franc', 17, 'C:HocLapTrinhLUANVANVIPVIPIMG122.jpg'),
(123, '1 franc', 18, 'C:HocLapTrinhLUANVANVIPVIPIMG123.jpg'),
(124, '2 franc', 18, 'C:HocLapTrinhLUANVANVIPVIPIMG124.jpg'),
(125, '5 franc', 18, 'C:HocLapTrinhLUANVANVIPVIPIMG125.jpg'),
(126, '10 franc', 18, 'C:HocLapTrinhLUANVANVIPVIPIMG126.jpg'),
(127, '20 franc', 18, 'C:HocLapTrinhLUANVANVIPVIPIMG127.jpg'),
(128, '1 pfennig', 19, 'C:HocLapTrinhLUANVANVIPVIPIMG128.jpg'),
(129, '2 pfennig', 19, 'C:HocLapTrinhLUANVANVIPVIPIMG129.jpg'),
(130, '5 pfennig', 19, 'C:HocLapTrinhLUANVANVIPVIPIMG130.jpg'),
(131, '10 pfennig', 19, 'C:HocLapTrinhLUANVANVIPVIPIMG131.jpg'),
(132, '20 pfennig', 19, 'C:HocLapTrinhLUANVANVIPVIPIMG132.jpg'),
(133, '50 pfennig', 19, 'C:HocLapTrinhLUANVANVIPVIPIMG133.jpg'),
(134, '1 centavos', 20, 'C:HocLapTrinhLUANVANVIPVIPIMG134.jpg'),
(135, '2 centavos', 20, 'C:HocLapTrinhLUANVANVIPVIPIMG135.jpg'),
(136, '5 centavos', 20, 'C:HocLapTrinhLUANVANVIPVIPIMG136.jpg'),
(137, '10 centavos', 20, 'C:HocLapTrinhLUANVANVIPVIPIMG137.jpg'),
(138, '20 centavos', 20, 'C:HocLapTrinhLUANVANVIPVIPIMG138.jpg'),
(139, '50 centavos', 20, 'C:HocLapTrinhLUANVANVIPVIPIMG139.jpg'),
(140, '1 cent', 21, 'C:HocLapTrinhLUANVANVIPVIPIMG140.jpg'),
(141, '5 cent', 21, 'C:HocLapTrinhLUANVANVIPVIPIMG141.jpg'),
(142, '10 cent', 21, 'C:HocLapTrinhLUANVANVIPVIPIMG142.jpg'),
(143, '25 cent', 21, 'C:HocLapTrinhLUANVANVIPVIPIMG143.jpg'),
(144, '50 cent', 21, 'C:HocLapTrinhLUANVANVIPVIPIMG144.jpg'),
(145, '1 guilder', 21, 'C:HocLapTrinhLUANVANVIPVIPIMG145.jpg'),
(146, '2 1/2 guilder', 21, 'C:HocLapTrinhLUANVANVIPVIPIMG146.jpg'),
(147, '5 guilder', 21, 'C:HocLapTrinhLUANVANVIPVIPIMG147.jpg'),
(148, '10 guilder', 21, 'C:HocLapTrinhLUANVANVIPVIPIMG148.jpg'),
(149, '1 penni', 22, 'C:HocLapTrinhLUANVANVIPVIPIMG149.jpg'),
(150, '5 pennia', 22, 'C:HocLapTrinhLUANVANVIPVIPIMG150.jpg'),
(151, '10 pennia', 22, 'C:HocLapTrinhLUANVANVIPVIPIMG151.jpg'),
(152, '20 pennia', 22, 'C:HocLapTrinhLUANVANVIPVIPIMG152.jpg'),
(153, '50 pennia', 22, 'C:HocLapTrinhLUANVANVIPVIPIMG153.jpg'),
(154, '1 pence', 23, 'C:HocLapTrinhLUANVANVIPVIPIMG154.jpg'),
(155, '2 pence', 23, 'C:HocLapTrinhLUANVANVIPVIPIMG155.jpg'),
(156, '5 pence', 23, 'C:HocLapTrinhLUANVANVIPVIPIMG156.jpg'),
(157, '10 pence', 23, 'C:HocLapTrinhLUANVANVIPVIPIMG157.jpg'),
(158, '20 pence', 23, 'C:HocLapTrinhLUANVANVIPVIPIMG158.jpg'),
(159, '50 pence', 23, 'C:HocLapTrinhLUANVANVIPVIPIMG159.jpg'),
(160, '1 sk', 24, 'C:HocLapTrinhLUANVANVIPVIPIMG160.jpg'),
(161, '2 sk', 24, 'C:HocLapTrinhLUANVANVIPVIPIMG161.jpg'),
(162, '5 sk', 24, 'C:HocLapTrinhLUANVANVIPVIPIMG162.jpg'),
(163, '10 sk', 24, 'C:HocLapTrinhLUANVANVIPVIPIMG163.jpg'),
(164, '1 santims', 25, 'C:HocLapTrinhLUANVANVIPVIPIMG164.jpg'),
(165, '1 santims', 25, 'C:HocLapTrinhLUANVANVIPVIPIMG165.jpg'),
(166, '5 santims', 25, 'C:HocLapTrinhLUANVANVIPVIPIMG166.jpg'),
(167, '10 santims', 25, 'C:HocLapTrinhLUANVANVIPVIPIMG167.jpg'),
(168, '20 santims', 25, 'C:HocLapTrinhLUANVANVIPVIPIMG168.jpg'),
(169, '50 santims', 25, 'C:HocLapTrinhLUANVANVIPVIPIMG169.jpg'),
(170, '1 lats', 25, 'C:HocLapTrinhLUANVANVIPVIPIMG170.jpg'),
(171, '2 lats', 25, 'C:HocLapTrinhLUANVANVIPVIPIMG171.jpg'),
(172, '1 centas', 26, 'C:HocLapTrinhLUANVANVIPVIPIMG172.jpg'),
(173, '2 centas', 26, 'C:HocLapTrinhLUANVANVIPVIPIMG173.jpg'),
(174, '5 centas', 26, 'C:HocLapTrinhLUANVANVIPVIPIMG174.jpg'),
(175, '10 centas', 26, 'C:HocLapTrinhLUANVANVIPVIPIMG175.jpg'),
(176, '20 centas', 26, 'C:HocLapTrinhLUANVANVIPVIPIMG176.jpg'),
(177, '50 centas', 26, 'C:HocLapTrinhLUANVANVIPVIPIMG177.jpg'),
(178, '1 litas', 26, 'C:HocLapTrinhLUANVANVIPVIPIMG178.jpg'),
(179, '2 litas', 26, 'C:HocLapTrinhLUANVANVIPVIPIMG179.jpg'),
(180, '5 litas', 26, 'C:HocLapTrinhLUANVANVIPVIPIMG180.jpg'),
(181, '1 cent', 27, 'C:HocLapTrinhLUANVANVIPVIPIMG181.jpg'),
(182, '2 cent', 27, 'C:HocLapTrinhLUANVANVIPVIPIMG182.jpg'),
(183, '5 cent', 27, 'C:HocLapTrinhLUANVANVIPVIPIMG183.jpg'),
(184, '10 cent', 27, 'C:HocLapTrinhLUANVANVIPVIPIMG184.jpg'),
(185, '20 cent', 27, 'C:HocLapTrinhLUANVANVIPVIPIMG185.jpg'),
(186, '50 cent', 27, 'C:HocLapTrinhLUANVANVIPVIPIMG186.jpg'),
(187, '1 senti', 28, 'C:HocLapTrinhLUANVANVIPVIPIMG187.jpg'),
(188, '2 senti', 28, 'C:HocLapTrinhLUANVANVIPVIPIMG188.jpg'),
(189, '5 senti', 28, 'C:HocLapTrinhLUANVANVIPVIPIMG189.jpg'),
(190, '10 senti', 28, 'C:HocLapTrinhLUANVANVIPVIPIMG190.jpg'),
(191, '20 senti', 28, 'C:HocLapTrinhLUANVANVIPVIPIMG191.jpg'),
(192, '50 senti', 28, 'C:HocLapTrinhLUANVANVIPVIPIMG192.jpg'),
(193, '1 kroon', 28, 'C:HocLapTrinhLUANVANVIPVIPIMG193.jpg'),
(194, '5 krooni', 28, 'C:HocLapTrinhLUANVANVIPVIPIMG194.jpg'),
(195, '1 franc', 29, 'C:HocLapTrinhLUANVANVIPVIPIMG195.jpg'),
(196, '5 franc', 29, 'C:HocLapTrinhLUANVANVIPVIPIMG196.jpg'),
(197, '10 franc', 29, 'C:HocLapTrinhLUANVANVIPVIPIMG197.jpg'),
(198, '20 franc', 29, 'C:HocLapTrinhLUANVANVIPVIPIMG198.jpg'),
(199, '50 franc', 29, 'C:HocLapTrinhLUANVANVIPVIPIMG199.jpg'),
(200, '100 franc', 29, 'C:HocLapTrinhLUANVANVIPVIPIMG200.jpg'),
(201, '1 cent', 30, 'C:HocLapTrinhLUANVANVIPVIPIMG201.jpg'),
(202, '2 cent', 30, 'C:HocLapTrinhLUANVANVIPVIPIMG202.jpg'),
(203, '5 cent', 30, 'C:HocLapTrinhLUANVANVIPVIPIMG203.jpg'),
(204, '10 cent', 30, 'C:HocLapTrinhLUANVANVIPVIPIMG204.jpg'),
(205, '25 cent', 30, 'C:HocLapTrinhLUANVANVIPVIPIMG205.jpg'),
(206, '50 cent', 30, 'C:HocLapTrinhLUANVANVIPVIPIMG206.jpg'),
(207, '1 lir', 30, 'C:HocLapTrinhLUANVANVIPVIPIMG207.jpg'),
(208, '1 lipa', 31, 'C:HocLapTrinhLUANVANVIPVIPIMG208.jpg'),
(209, '2 lipa', 31, 'C:HocLapTrinhLUANVANVIPVIPIMG209.jpg'),
(210, '5 lipa', 31, 'C:HocLapTrinhLUANVANVIPVIPIMG210.jpg'),
(211, '10 lipa', 31, 'C:HocLapTrinhLUANVANVIPVIPIMG211.jpg'),
(212, '20 lipa', 31, 'C:HocLapTrinhLUANVANVIPVIPIMG212.jpg'),
(213, '50 lipa', 31, 'C:HocLapTrinhLUANVANVIPVIPIMG213.jpg'),
(214, '1 kuna', 31, 'C:HocLapTrinhLUANVANVIPVIPIMG214.jpg'),
(215, '2 kuna', 31, 'C:HocLapTrinhLUANVANVIPVIPIMG215.jpg'),
(216, '5 kuna', 31, 'C:HocLapTrinhLUANVANVIPVIPIMG216.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `quocgia`
--
ALTER TABLE `quocgia`
  ADD PRIMARY KEY (`IDQG`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `xu`
--
ALTER TABLE `xu`
  ADD PRIMARY KEY (`IDXU`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quocgia`
--
ALTER TABLE `quocgia`
  MODIFY `IDQG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
