CREATE TABLE blog.user
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  hash CHAR(32) NOT NULL
);
CREATE UNIQUE INDEX user_id_uindex ON blog.user (id);
CREATE UNIQUE INDEX user_email_uindex ON blog.user (email);
ALTER TABLE blog.user COMMENT = 'admins and black list functions';

CREATE TABLE blog.post
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  content TEXT,
  status ENUM("new", "open", "closed") DEFAULT "new" NOT NULL,
  tags TEXT DEFAULT NULL
);
CREATE UNIQUE INDEX post_id_uindex ON blog.post (id);
ALTER TABLE blog.post COMMENT = 'posts';

CREATE TABLE blog.comment
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  parent_id INT(11) NOT NULL,
  content TEXT DEFAULT NULL,
  email VARCHAR(255) NOT NULL
);
CREATE UNIQUE INDEX commnet_id_uindex ON blog.comment (id);
