-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.31 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para dwproject
CREATE DATABASE IF NOT EXISTS `dwproject` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dwproject`;

-- Copiando estrutura para tabela dwproject.bowl
CREATE TABLE IF NOT EXISTS `bowl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `carrinho_id` int DEFAULT NULL,
  `pedido_id` int DEFAULT NULL,
  `preco` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`carrinho_id`),
  KEY `id_pedido` (`pedido_id`) USING BTREE,
  CONSTRAINT `fk_ingrediente_carrinho_id` FOREIGN KEY (`carrinho_id`) REFERENCES `carrinho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ingrediente_pedido_id` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.bowl: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dwproject.carrinho
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NOT NULL,
  `preco` decimal(10,0) NOT NULL DEFAULT (0),
  `calorias` decimal(10,0) NOT NULL DEFAULT (0),
  `carboidratos` decimal(10,0) NOT NULL DEFAULT (0),
  `acucares` decimal(10,0) NOT NULL DEFAULT (0),
  `proteinas` decimal(10,0) NOT NULL DEFAULT (0),
  `sodios` decimal(10,0) NOT NULL DEFAULT (0),
  `gorduras` decimal(10,0) NOT NULL DEFAULT (0),
  `gorduras_saturadas` decimal(10,0) NOT NULL DEFAULT (0),
  `fibras` decimal(10,0) NOT NULL DEFAULT (0),
  `gluten` tinyint NOT NULL DEFAULT (0),
  `lactose` tinyint NOT NULL DEFAULT (0),
  `vegan` tinyint NOT NULL DEFAULT (0),
  PRIMARY KEY (`id`),
  KEY `id_idx` (`cliente_id`),
  CONSTRAINT `fk_carrinho_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.carrinho: ~1 rows (aproximadamente)
INSERT INTO `carrinho` (`id`, `cliente_id`, `preco`, `calorias`, `carboidratos`, `acucares`, `proteinas`, `sodios`, `gorduras`, `gorduras_saturadas`, `fibras`, `gluten`, `lactose`, `vegan`) VALUES
	(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- Copiando estrutura para tabela dwproject.categoriaingrediente
CREATE TABLE IF NOT EXISTS `categoriaingrediente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.categoriaingrediente: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dwproject.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nif` varchar(10) NOT NULL,
  `telemovel` varchar(20) NOT NULL,
  `morada` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`user_id`) USING BTREE,
  CONSTRAINT `fk_cliente_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.cliente: ~1 rows (aproximadamente)
INSERT INTO `cliente` (`id`, `user_id`, `nome`, `nif`, `telemovel`, `morada`) VALUES
	(1, 1, 'Nome Cliente', '123456789', '999999999', 'Av. Sá Carneiro, 1');

-- Copiando estrutura para tabela dwproject.ingrediente
CREATE TABLE IF NOT EXISTS `ingrediente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria_id` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `image_path` varchar(400) NOT NULL,
  `preco_g` double NOT NULL DEFAULT (0),
  `calorias_g` double NOT NULL DEFAULT (0),
  `carboidrato_g` double NOT NULL DEFAULT (0),
  `acucar_g` double NOT NULL DEFAULT (0),
  `proteina_g` double NOT NULL DEFAULT (0),
  `sodio_g` double NOT NULL DEFAULT (0),
  `gordura_g` double NOT NULL DEFAULT (0),
  `gordura_saturada_g` double NOT NULL DEFAULT (0),
  `fibras_g` double NOT NULL DEFAULT (0),
  `gluten` tinyint NOT NULL,
  `lactose` tinyint NOT NULL,
  `vegan` tinyint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id_idx` (`categoria_id`),
  CONSTRAINT `fk_ingrediente_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoriaingrediente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.ingrediente: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dwproject.ingrediente_bowl
CREATE TABLE IF NOT EXISTS `ingrediente_bowl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ing_ref_id` int NOT NULL,
  `bowl_id` int NOT NULL,
  `quantidade` double NOT NULL DEFAULT (0),
  PRIMARY KEY (`id`),
  KEY `fk_Ingrediente_Refeicao_has_Prato_Prato1_idx` (`bowl_id`) /*!80000 INVISIBLE */,
  KEY `fk_ing_ref_bowl` (`ing_ref_id`),
  CONSTRAINT `fk_bowl_id` FOREIGN KEY (`bowl_id`) REFERENCES `bowl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ing_id` FOREIGN KEY (`ing_ref_id`) REFERENCES `ingrediente_refeicao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.ingrediente_bowl: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dwproject.ingrediente_refeicao
CREATE TABLE IF NOT EXISTS `ingrediente_refeicao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `refeicao_id` int NOT NULL,
  `ingrediente_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Refeicao_has_Ingrediente_Ingrediente1_idx` (`ingrediente_id`),
  KEY `fk_Refeicao_has_Ingrediente_Refeicao1_idx` (`refeicao_id`),
  CONSTRAINT `fk_ingrediente_id` FOREIGN KEY (`ingrediente_id`) REFERENCES `ingrediente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_refeicao_id` FOREIGN KEY (`refeicao_id`) REFERENCES `refeicao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.ingrediente_refeicao: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dwproject.mensagem
CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `restaurante_id` int NOT NULL,
  `nome_cliente` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `msg` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_restaurante_idx` (`restaurante_id`),
  CONSTRAINT `fk_msg_restaurante` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.mensagem: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dwproject.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.migration: 2 rows
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1703357235),
	('m150214_044831_init_user', 1703357240);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Copiando estrutura para tabela dwproject.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NOT NULL,
  `restaurante_id` int NOT NULL,
  `carrinho_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`cliente_id`),
  KEY `id_idx1` (`restaurante_id`),
  KEY `id_idx2` (`carrinho_id`),
  CONSTRAINT `fk_pedido_carrinho` FOREIGN KEY (`carrinho_id`) REFERENCES `carrinho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pedido_rest` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.pedido: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dwproject.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_user_id` (`user_id`),
  CONSTRAINT `profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Copiando dados para a tabela dwproject.profile: ~1 rows (aproximadamente)
INSERT INTO `profile` (`id`, `user_id`, `created_at`, `updated_at`, `full_name`, `timezone`) VALUES
	(1, 1, '2023-12-23 18:47:20', '2024-01-09 12:54:49', 'Admin', 'Europe/Lisbon');

-- Copiando estrutura para tabela dwproject.refeicao
CREATE TABLE IF NOT EXISTS `refeicao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `restaurante_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`restaurante_id`),
  CONSTRAINT `fk_ref_restaurante_id` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.refeicao: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dwproject.restaurante
CREATE TABLE IF NOT EXISTS `restaurante` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela dwproject.restaurante: ~1 rows (aproximadamente)
INSERT INTO `restaurante` (`id`, `nome`) VALUES
	(1, 'Bowl.');

-- Copiando estrutura para tabela dwproject.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_admin` smallint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Copiando dados para a tabela dwproject.role: ~3 rows (aproximadamente)
INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `can_admin`) VALUES
	(1, 'Admin', '2023-12-23 18:47:20', NULL, 1),
	(2, 'Client', '2023-12-23 18:47:20', NULL, 0),
	(3, 'Guest', '2023-12-23 18:47:20', NULL, 0);

-- Copiando estrutura para tabela dwproject.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `status` smallint NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `logged_in_ip` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `created_ip` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `banned_reason` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`email`),
  UNIQUE KEY `user_username` (`username`),
  KEY `user_role_id` (`role_id`),
  CONSTRAINT `user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Copiando dados para a tabela dwproject.user: ~1 rows (aproximadamente)
INSERT INTO `user` (`id`, `role_id`, `status`, `email`, `username`, `password`, `auth_key`, `access_token`, `logged_in_ip`, `logged_in_at`, `created_ip`, `created_at`, `updated_at`, `banned_at`, `banned_reason`) VALUES
	(1, 1, 1, 'neo@neo.com', 'neo', '$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O', 'ZxNPf3YTcCdy2sLI78ZZ27ZNregBoLfT', 'ycCcWy9osxhoUnxg4v7V89nZSRIYvAf3', '::1', '2024-01-14 20:48:04', NULL, '2023-12-23 18:47:20', NULL, NULL, NULL);

-- Copiando estrutura para tabela dwproject.user_auth
CREATE TABLE IF NOT EXISTS `user_auth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `provider` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `provider_attributes` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_auth_provider_id` (`provider_id`),
  KEY `user_auth_user_id` (`user_id`),
  CONSTRAINT `user_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Copiando dados para a tabela dwproject.user_auth: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela dwproject.user_token
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `type` smallint NOT NULL,
  `token` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_token_token` (`token`),
  KEY `user_token_user_id` (`user_id`),
  CONSTRAINT `user_token_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Copiando dados para a tabela dwproject.user_token: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
