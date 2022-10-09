-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 08:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikacja`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `content`, `created_at`) VALUES
(1, 1, 'Jakub_Olszewski', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut faucibus metus, sit amet posuere sapien. Duis tempus semper enim nec cursus. Curabitur rutrum mauris eget neque euismod bibendum. Nunc eu dui sit amet nibh ultrices rutrum at sit amet nulla. Morbi a turpis velit. Aenean porta, enim nec efficitur pretium, tortor enim rhoncus felis, vitae sodales elit neque non sem. Nunc eget augue dictum, fringilla dolor sodales, volutpat urna. Sed at mauris ac nunc lobortis pulvinar sit amet ut tortor. Aenean egestas ipsum ex, at sollicitudin diam commodo vel. Phasellus euismod, nisi sit amet ultricies posuere, metus risus mollis augue, quis venenatis nunc lectus in enim. Nulla risus nunc, porttitor non sodales eu, interdum non nulla. Morbi vel lacus sed turpis semper consequat.', '2022-09-30 18:22:01'),
(2, 1, 'Jan_Kowalski', 'Proin sed massa risus. Aenean vel ante sed nisl interdum congue non et metus. Nunc augue odio, rhoncus vel nulla vitae, blandit auctor mi. Nunc arcu mi, tempus non purus sit amet, tempus faucibus purus. Aenean gravida nulla sed purus suscipit, non hendrerit ex imperdiet. ', '2022-09-30 18:22:42'),
(3, 1, 'nowak', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed non feugiat est. Suspendisse dignissim tristique arcu. Curabitur eleifend mi eget neque rutrum scelerisque. Sed sit amet tristique purus, nec eleifend ligula. Duis mollis tortor mattis semper cursus. Fusce tincidunt velit augue, id imperdiet est placerat pellentesque. Vivamus vulputate nunc vitae leo scelerisque, eget imperdiet elit congue. Phasellus lorem velit, interdum sit amet elementum ut, pellentesque et metus. Morbi metus dolor, venenatis dapibus ex non, interdum commodo tortor. Curabitur porttitor vel risus vitae facilisis. Morbi dolor lacus, viverra quis lorem vel, venenatis dapibus metus. Duis auctor vestibulum lectus, ut sodales leo accumsan vel. Sed a pulvinar dui, sed semper ligula.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut vitae nibh suscipit, semper turpis nec, tempus magna. Nullam ipsum nunc, luctus ac varius tincidunt, accumsan ac justo. Etiam sodales magna velit, eu euismod eros viverra id. Sed leo velit, tempor eu velit eu, rhoncus euismod arcu. Fusce imperdiet dignissim neque. Maecenas dapibus, mi id euismod ultricies, tortor quam consectetur ex, vel efficitur neque neque vitae nisl. Donec malesuada, elit quis rhoncus aliquam, dolor felis aliquam ex, eu faucibus lectus quam non dolor. Donec nec dui nisl. In vel interdum ligula, in facilisis dolor. Donec lorem felis, volutpat at scelerisque nec, congue quis enim. Praesent vel aliquet nisi. Praesent vehicula massa ac pretium pellentesque. Aliquam erat volutpat. Nunc lacinia lorem sed cursus varius. Aenean eget scelerisque turpis.', '2022-09-30 18:54:51'),
(4, 2, 'imhere', 'Proin condimentum neque vitae tristique elementum. Aenean varius cursus turpis id ullamcorper. In vitae efficitur sapien, sit amet sollicitudin risus. Vestibulum finibus nibh efficitur, posuere felis eget, scelerisque nulla. Etiam quis molestie turpis. Nunc pulvinar cursus porta. Mauris quis neque bibendum, tincidunt turpis sed, volutpat nisl. Donec dapibus risus elit. Etiam sit amet nisi feugiat, molestie tellus at, laoreet nibh. Aliquam lobortis tortor quis lacinia condimentum.', '2022-09-30 18:55:21'),
(5, 2, 'bet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum finibus aliquam. Cras placerat eros vitae fringilla aliquet. Aenean fringilla, dolor nec efficitur consequat, nisl dui iaculis ante, et sodales purus nisl id tellus. Donec facilisis congue sapien vitae imperdiet. Phasellus sit amet eros varius, tempus mauris vel, eleifend massa. Fusce non congue ante. Ut sed consectetur risus. Quisque iaculis accumsan interdum. Pellentesque lacus tellus, venenatis quis nisi id, placerat iaculis nisi. Fusce nulla tellus, mollis eu rutrum at, tincidunt id turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque ut odio eu augue viverra viverra.\r\n\r\nMorbi lobortis placerat iaculis. Nam sit amet velit vel nisl vehicula tempus. Duis pellentesque ligula in semper hendrerit. Aenean justo felis, aliquam at blandit porttitor, congue in lorem. Nunc non ante fermentum, ultricies purus eget, convallis mi. Sed egestas vehicula enim, in hendrerit neque hendrerit vel. Etiam eu massa id mi efficitur vulputate. Nullam tempor interdum felis. Cras pellentesque metus lacinia vestibulum commodo. Maecenas ac dolor risus. Fusce fringilla vitae nulla eget hendrerit. Praesent quis auctor tortor.\r\n\r\nNam vel erat in velit semper malesuada at in quam. Vestibulum non ante at neque tristique vulputate vitae in tortor. Duis id velit malesuada, tempor felis vel, porttitor orci. Curabitur mi magna, dapibus id porta eu, ornare pharetra lorem. Aliquam a vehicula tortor. Vivamus feugiat libero mauris, sit amet dapibus mauris consequat quis. In rutrum urna eget elit dictum tincidunt.\r\n\r\nSuspendisse interdum accumsan nunc, id cursus mauris hendrerit at. Donec non lectus et lorem consectetur faucibus. Suspendisse convallis vehicula arcu vitae semper. Nam faucibus facilisis turpis, eu porttitor metus cursus ac. In sed scelerisque metus. Nullam id leo non ex rhoncus sagittis eu sed tortor. Nullam sodales odio a quam pretium finibus.\r\n\r\nVivamus sit amet felis dui. Quisque in tristique ipsum, id pellentesque libero. Praesent et feugiat nisl. Ut hendrerit quam mauris, non euismod nunc tincidunt vel. Nulla sed quam at mi molestie lacinia. Fusce quis ultricies ipsum. Vivamus auctor, metus vel faucibus condimentum, nisi arcu molestie purus, quis tincidunt orci enim eget nunc. Nullam consequat tortor eu mauris hendrerit, eget facilisis lacus porta.', '2022-09-30 18:55:46'),
(6, 13, 'jakubeq', 'Sed maximus nec ipsum a commodo. Maecenas lobortis tortor a ex imperdiet suscipit. Nulla in semper nisi. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque tristique quam eu cursus ornare. Donec luctus feugiat ante sed consequat. Donec pharetra sapien sit amet elementum ullamcorper.', '2022-10-09 18:45:50'),
(7, 13, 'jakubeq', 'Mauris vel tellus pharetra, ullamcorper nisi non, accumsan purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam pulvinar porttitor arcu, non aliquam nisi vestibulum in. Duis tincidunt, turpis eget eleifend varius, libero metus mattis elit, in mattis est sapien vitae elit. Phasellus pellentesque mollis vehicula. Donec hendrerit congue ligula, non iaculis leo lacinia vitae. Sed vitae lacinia turpis.', '2022-10-09 18:45:56'),
(8, 8, 'jakubeq', 'Integer sodales interdum pretium. Nulla pellentesque lorem non facilisis accumsan. Maecenas sagittis tortor quis erat rhoncus, eu elementum augue sodales. Phasellus aliquet ac est dapibus consequat. Nullam at sapien vel est ultricies dignissim at eget justo. Quisque varius tincidunt ligula, eget sollicitudin elit venenatis a. Sed ornare leo vitae ipsum varius porttitor. Donec dapibus viverra magna, sit amet porttitor mauris posuere vitae. Sed ac velit felis. Aliquam erat volutpat. Pellentesque malesuada venenatis lorem at dictum.', '2022-10-09 18:46:15'),
(9, 8, 'jakubeq', 'Integer sodales interdum pretium. Nulla pellentesque lorem non facilisis accumsan. Maecenas sagittis tortor quis erat rhoncus, eu elementum augue sodales. Phasellus aliquet ac est dapibus consequat. Nullam at sapien vel est ultricies dignissim at eget justo. Quisque varius tincidunt ligula, eget sollicitudin elit venenatis a. Sed ornare leo vitae ipsum varius porttitor. Donec dapibus viverra magna, sit amet porttitor mauris posuere vitae. Sed ac velit felis. Aliquam erat volutpat. Pellentesque malesuada venenatis lorem at dictum.', '2022-10-09 18:46:17'),
(10, 8, 'jakubeq', 'Integer sodales interdum pretium. Nulla pellentesque lorem non facilisis accumsan. Maecenas sagittis tortor quis erat rhoncus, eu elementum augue sodales. Phasellus aliquet ac est dapibus consequat. Nullam at sapien vel est ultricies dignissim at eget justo. Quisque varius tincidunt ligula, eget sollicitudin elit venenatis a. Sed ornare leo vitae ipsum varius porttitor. Donec dapibus viverra magna, sit amet porttitor mauris posuere vitae. Sed ac velit felis. Aliquam erat volutpat. Pellentesque malesuada venenatis lorem at dictum.', '2022-10-09 18:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(32) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `views` int(11) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `views`, `last_updated`, `created_at`) VALUES
(1, 'Mati', 'Quisque aliquam maximus tempor. Maecenas nec dolor non augue ullamcorper porttitor.', 'Sed mollis lacinia ullamcorper. Maecenas semper, justo vitae dapibus lobortis, nulla ante tempor neque, vitae mollis tellus elit id nisi. Cras vel rutrum nibh. Donec urna elit, congue nec odio non, ultrices pellentesque sem. Mauris ac pretium mi. In sed bibendum odio, a venenatis mi. Proin luctus egestas arcu cursus hendrerit. Curabitur rutrum vel leo vel finibus. Donec sagittis convallis libero, volutpat egestas lacus accumsan non. Duis sed dui ut urna varius ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum efficitur vehicula arcu, in imperdiet justo fringilla vel. Integer ut felis condimentum, mattis felis vel, aliquet est. Aliquam at sapien vitae purus vulputate feugiat sit amet nec nunc. Nunc feugiat est eget elit suscipit consequat. Nam tempor interdum dapibus.\n\nInteger tempor, odio in fermentum accumsan, orci ex congue nulla, ut suscipit nibh libero molestie eros. Phasellus ipsum erat, commodo sed arcu nec, maximus interdum sapien. Nam ac elementum risus. Maecenas egestas congue nibh, eu efficitur massa blandit ac. Aliquam sodales porttitor nisi eu dapibus. Praesent venenatis sem et diam bibendum iaculis. Proin non nulla at justo molestie facilisis in nec augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse consequat nunc ut accumsan aliquam. Etiam eget consequat velit. Maecenas sagittis vel ipsum at maximus. Pellentesque dolor neque, interdum eu turpis sed, hendrerit dictum felis. Nullam lacinia lacus elit, vitae porttitor sapien lacinia quis.', 10, '2022-09-28 18:34:54', '2022-09-28 18:34:54'),
(2, 'adrian', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed volutpat vulputate viverra.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed volutpat vulputate viverra. Duis pulvinar mattis justo, ac pellentesque velit ornare sed. Curabitur id urna eget ligula cursus vestibulum. Pellentesque in enim nunc. Duis efficitur justo nec tristique auctor. Sed vestibulum quam eget fringilla porta. Sed id eros augue. Sed facilisis vitae ipsum vitae fringilla. Nunc eget ullamcorper nulla. Praesent non ex interdum, interdum magna at, tempor ligula.\r\n\r\nMorbi semper augue nec lacinia interdum. Fusce et diam non leo euismod auctor. Vestibulum tellus lorem, blandit et urna non, efficitur fringilla lectus. Vivamus luctus dui vestibulum tortor auctor rhoncus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse aliquam tincidunt arcu, quis pretium tortor. Pellentesque posuere ut nisi non sodales. Duis dapibus eget leo sed fringilla. In tempus tortor a dolor tempor, eu molestie felis varius. Nullam pharetra, erat quis eleifend porttitor, massa tortor vulputate sapien, eu varius purus lectus nec felis.', 37, '2022-09-30 18:53:44', '2022-09-30 18:53:44'),
(3, 'admin', 'Aenean vel diam sed orci maximus fringilla nec a ante.', 'Pellentesque iaculis ultricies nibh vel tincidunt. Morbi hendrerit pulvinar lobortis. Nullam purus lorem, pretium non neque non, varius blandit neque. Cras ornare eu tortor eget varius. Proin nec ante urna. Integer turpis nulla, ullamcorper sed sem quis, pellentesque blandit massa. Sed accumsan sem dapibus, convallis est eget, eleifend orci. Morbi id lacinia neque. Phasellus molestie nibh non maximus scelerisque. Cras interdum eros eget congue pharetra. Proin maximus molestie pretium. Nam eu dapibus elit. Mauris vitae consectetur leo, nec sodales tellus. Mauris at mollis metus.', 4, '2022-10-09 18:16:00', '2022-10-09 18:16:00'),
(4, 'admin', 'Mauris libero nisl, dignissim vel dui non, malesuada gravida leo.', 'Mauris libero nisl, dignissim vel dui non, malesuada gravida leo. Ut sollicitudin, lorem in sodales fringilla, massa dui rhoncus nisl, ac bibendum mauris mauris tincidunt leo. Pellentesque tempor dui a rutrum malesuada. Maecenas ullamcorper consequat tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque eget porttitor urna, eu blandit nulla. Donec nec enim vel quam finibus gravida. Ut ac tellus accumsan, hendrerit magna sit amet, congue elit. Nulla facilisi. Sed nec aliquam lacus. Suspendisse ultrices, metus vulputate congue scelerisque, felis magna ullamcorper sapien, et feugiat diam risus nec nisl. Proin scelerisque non sem sed scelerisque. Morbi aliquet semper arcu, vitae ultrices purus fermentum vel.', 1, '2022-10-09 18:16:13', '2022-10-09 18:16:13'),
(5, 'admin', 'Nam aliquam ullamcorper dui vitae pellentesque.', 'Nam aliquam ullamcorper dui vitae pellentesque. Donec ligula arcu, pharetra non ultricies at, pellentesque a nibh. Aliquam ornare volutpat fermentum. Proin ligula purus, porta vitae facilisis et, tempus in ante. Sed aliquet in enim ac posuere. Suspendisse aliquet odio dignissim enim cursus cursus. Nam dapibus id nunc at pharetra.', 2, '2022-10-09 18:16:28', '2022-10-09 18:16:28'),
(6, 'admin', 'Donec sodales leo sed ipsum ullamcorper, a faucibus velit varius. ', 'Morbi posuere risus nibh, non cursus justo tempus quis. Ut ullamcorper egestas ornare. Vestibulum libero arcu, porttitor ac tincidunt at, gravida sed arcu. Vivamus congue ornare faucibus. Integer in metus ut erat sollicitudin finibus in ut turpis. Phasellus eget nulla vitae lacus accumsan imperdiet et lacinia purus. Phasellus in tortor id nunc eleifend porttitor. In hac habitasse platea dictumst. Mauris risus neque, aliquet at congue vel, accumsan ut nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Maecenas eget ipsum et nisi scelerisque aliquam sit amet eu dolor. Proin id justo ultricies, vehicula dui et, efficitur augue.', 0, '2022-10-09 18:17:09', '2022-10-09 18:17:09'),
(7, 'kowalskyy', 'Vivamus facilisis purus diam, sit amet tempus tellus mattis vitae. Nunc mollis tellus id nunc laoreet dictum.', 'Vivamus facilisis purus diam, sit amet tempus tellus mattis vitae. Nunc mollis tellus id nunc laoreet dictum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam a metus sollicitudin nibh porta egestas vel in erat. Donec et imperdiet urna. Aliquam sed auctor nulla. Morbi congue nisl lectus, a posuere lorem consectetur quis. Etiam ac malesuada tortor. Morbi id augue vitae magna blandit consectetur nec sit amet ex. In dictum tincidunt leo, quis mattis nibh tristique in.', 1, '2022-10-09 18:18:29', '2022-10-09 18:18:29'),
(8, 'kowalskyy', 'Orci varius natoque penatibus et magnis dis parturient montes', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum euismod orci sit amet lectus porta, in sagittis nibh varius. Morbi euismod mi vitae nulla hendrerit vehicula. Quisque justo lectus, facilisis et vestibulum id, placerat vitae purus. Maecenas ultrices laoreet congue. Aenean turpis sapien, faucibus commodo luctus nec, dapibus sed nisi. Aenean sagittis ac ante id pulvinar. Nulla at rutrum ex. Phasellus nisi risus, viverra at risus non, convallis accumsan mauris. Integer dapibus mattis ligula vel rutrum. Etiam erat leo, pulvinar sed ornare sit amet, sodales vel metus. Suspendisse lobortis consequat dui a ornare. Sed vitae leo eget augue egestas malesuada eget fringilla dolor. Nunc quis turpis nec ante rutrum dictum id vel metus. Maecenas dapibus purus elit, id porta dui ornare eu.', 6, '2022-10-09 18:18:42', '2022-10-09 18:18:42'),
(9, 'kowalskyy', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. ', ' Mauris auctor nibh id lacus mattis luctus. Sed enim nunc, posuere vel massa ac, mattis dignissim sapien. Cras dui metus, dictum et justo sed, lobortis aliquam quam. In consequat tellus ante, ac mollis tortor vestibulum ut. Fusce efficitur magna vel mauris malesuada congue. Suspendisse pulvinar, ligula ac dignissim facilisis, ex felis rutrum arcu, vel eleifend elit mi id nibh. Vivamus vel elit nec risus porta pellentesque vitae in leo. Nullam ut augue quam. Sed nibh nunc, vehicula ut placerat et, bibendum in enim. Duis vestibulum nibh libero. Morbi in eros erat. Aenean in ultrices massa. In hac habitasse platea dictumst.\r\n&lt;p&gt;abc&lt;/p&gt;', 5, '2022-10-09 18:19:10', '2022-10-09 18:19:10'),
(10, 'kowalskyy', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. ', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer quis luctus odio. Proin et ligula interdum, egestas elit non, sollicitudin arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur non fermentum nunc. Maecenas eu justo interdum, porttitor sem vel, elementum nibh. Ut aliquam varius arcu, nec tempus nunc. Praesent et quam sed ex venenatis porta. Vestibulum varius auctor augue et pharetra. Nunc in elit justo. Duis vitae metus urna. Mauris iaculis ipsum sit amet libero sollicitudin elementum. Phasellus congue erat ac quam faucibus semper sit amet in felis. Etiam fringilla vulputate finibus.', 2, '2022-10-09 18:19:43', '2022-10-09 18:19:43'),
(11, 'kowalskyy', 'Vivamus dolor turpis, eleifend eu tincidunt quis, tempus quis turpis. ', 'Phasellus eleifend tristique euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse ac fermentum velit. Curabitur dictum feugiat dolor eu facilisis. In vitae magna rutrum, porta sapien at, blandit orci. In hac habitasse platea dictumst. Proin dignissim ligula sit amet magna aliquam, vitae porta nisi accumsan. Proin tempor eros ipsum, vel tincidunt neque tempor quis. Vestibulum fermentum sagittis viverra. Duis sollicitudin, nisi ac commodo ultrices, elit sem mollis sapien, et tempus nulla ex non leo.', 4, '2022-10-09 18:19:58', '2022-10-09 18:19:58'),
(12, 'kowalskyy', 'Quisque ac libero a mauris mollis placerat eu eget tellus. ', 'Quisque ac libero a mauris mollis placerat eu eget tellus. Duis suscipit neque at justo dictum varius. Donec eleifend sapien orci, eget ornare nisi imperdiet non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin non volutpat erat. Cras imperdiet nisl vel consectetur hendrerit. Sed sollicitudin quis odio ut congue. Quisque accumsan aliquam sapien sagittis finibus. Vivamus luctus fermentum vehicula. Sed congue nulla diam, sed auctor elit dictum id. Mauris non interdum turpis, non malesuada magna. Ut molestie scelerisque libero, nec pellentesque felis consequat quis. Aenean sed eros aliquam metus venenatis dictum ut quis erat. Nunc ac laoreet urna. Nam a massa faucibus, placerat nibh id, tristique nulla. Nam suscipit ex tellus, quis porta orci dictum et.', 6, '2022-10-09 18:21:48', '2022-10-09 18:21:48'),
(13, 'kowalskyy', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In cursus pretium tortor sit amet accumsan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultrices eros vitae maximus commodo. Fusce tortor urna, placerat id hendrerit id, sodales non orci. Donec ornare nisi at elit eleifend, nec tempus eros iaculis. Suspendisse venenatis purus eget risus cursus venenatis. Curabitur facilisis sollicitudin odio, et suscipit neque viverra et.', 14, '2022-10-09 18:23:19', '2022-10-09 18:23:19'),
(14, 'kowalskyy', 'Integer maximus ligula nec consectetur iaculis. Suspendisse nec interdum est, a venenatis velit. ', 'Integer maximus ligula nec consectetur iaculis. Suspendisse nec interdum est, a venenatis velit. Nulla semper felis varius, tincidunt ex nec, venenatis eros. Nam imperdiet cursus mauris, vel ornare lectus pretium ut. In non ante in lacus fermentum gravida. Morbi luctus neque ante, et consectetur sapien consectetur ac. Fusce ut nibh enim. Etiam sit amet justo at augue suscipit ullamcorper. Etiam sed augue ipsum. Fusce mollis risus ut risus iaculis, vitae vestibulum orci mollis. Praesent dignissim auctor turpis sit amet fermentum. Quisque venenatis ligula iaculis nibh dignissim ornare.', 6, '2022-10-09 18:25:08', '2022-10-09 18:25:08'),
(15, 'jakubeq', 'Praesent rutrum, tellus id malesuada dignissim', 'Praesent rutrum, tellus id malesuada dignissim, est nisi lacinia lectus, et sodales arcu massa et ligula. Fusce non quam id erat porta varius. Fusce nibh augue, faucibus id est sit amet, venenatis facilisis felis. Suspendisse potenti. Duis egestas odio nec libero egestas, vel accumsan justo egestas. Sed et libero pellentesque lacus gravida efficitur. Vivamus posuere nunc elit, eget tempor dolor dignissim in. Proin semper mauris sed sagittis lobortis. Nullam ut augue ut enim tempus vehicula scelerisque eu mi. Ut vitae tincidunt neque. Vestibulum et lectus dui. Suspendisse at sapien hendrerit arcu cursus mattis eu vel quam.', 7, '2022-10-09 18:27:41', '2022-10-09 18:27:41'),
(16, 'jakubeq', 'Praesent sapien ipsum, egestas quis pulvinar vitae, vestibulum et ligula.', 'Praesent sapien ipsum, egestas quis pulvinar vitae, vestibulum et ligula. Donec blandit sed sem non rutrum. Ut dolor lacus, congue ac nibh a, tincidunt maximus arcu. Nam venenatis ullamcorper lacus. Nulla ullamcorper interdum dolor vitae ullamcorper. Nunc ut sollicitudin odio. Duis hendrerit quis quam nec ultricies. Sed sodales, lacus at placerat egestas, massa velit facilisis velit, at mattis eros tortor quis tortor. Nullam velit lorem, ullamcorper eget condimentum sit amet, laoreet vel nisi. Aliquam elementum mi et sapien vestibulum, non luctus sapien pellentesque. Pellentesque blandit tellus sed velit semper tristique. Duis at metus ex.', 4, '2022-10-09 18:27:55', '2022-10-09 18:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `auth_key` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nickname`, `password`, `auth_key`, `created_at`) VALUES
(1, 'blog.admin@gmail.com', 'admin', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff', 'fXPyTBGYO7sxbp3EtrCMXyziCwSwZ3MziWhbMnLcFglmdsd19kgu4XnHPVPXAPoOVYwYcmUUwwqNXugDxH0BFbBkrVqkeuysFjC3zcEA9kl5dCOExCHpOlqsVAVQSPcI', '2022-10-09 18:15:13'),
(2, 'kowalskyy@gmail.com', 'kowalskyy', '0b7bc8dd2da9feaef9b419783d9ca7c7af029519', '25Nnk9xcn31xC9KfboxP2bGvFiHEarUznznViFsf6W1lTgzXzUYjlvpOQ4tY2akhfDF52DRi3DfHrPOqmbBF8Ycn5lAo6sppXa7JN7eM8Shorc9HKzs7j0kFR8WZ9nuL', '2022-10-09 18:17:55'),
(3, 'jakubeq@gmail.com', 'jakubeq', 'fc169cb577d5a17e6e58726f83d498839df821c8', 'mZJNwUaZJVRF9GXLLqp0wvwmJyeEykY3CFDcEFHpfQQaF1VJ6V5rf7bQ3AX3H3BzEVakYGorId8xaZ1L0JIXXDXBH8Zz8XujGuSAh7FWvZx6PplRCqJOTevOfITthYuj', '2022-10-09 18:27:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
