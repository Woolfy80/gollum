CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `status` enum('new','open','closed') NOT NULL DEFAULT 'new',
  `tags` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='posts';

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `content` text,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `commnet_id_uindex` (`id`),
  KEY `blog_comment_parent_id_fk` (`parent_id`),
  CONSTRAINT `blog_comment_parent_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `blog_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;