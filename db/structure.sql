DROP TABLE if EXISTS t_comment;
DROP TABLE if EXISTS t_article;

CREATE TABLE t_article (
  art_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  art_title VARCHAR(100) NOT NULL,
  art_content VARCHAR(2000) NOT NULL
) ENGINE =innodb CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE t_comment (
  com_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  com_author VARCHAR(100) NOT NULL,
  com_content VARCHAR(500) NOT NULL,
  art_id INTEGER NOT NULL,
  CONSTRAINT fk_com_art FOREIGN KEY(art_id) REFERENCES t_article(art_id)
) ENGINE=innodb CHARACTER SET utf8 COLLATE utf8_unicode_ci;