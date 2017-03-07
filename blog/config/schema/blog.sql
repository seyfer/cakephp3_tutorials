CREATE DATABASE cake_blog;

CREATE USER 'cake_blog'@'localhost'
  IDENTIFIED BY 'AngelF00dC4k3~';

# ---- use cake_blog;

GRANT ALL PRIVILEGES ON *.* TO 'cake_blog'@'localhost'
WITH GRANT OPTION;

FLUSH PRIVILEGES;

/* First, create our articles table: */
CREATE TABLE articles (
  id       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title    VARCHAR(50),
  body     TEXT,
  created  DATETIME     DEFAULT NULL,
  modified DATETIME     DEFAULT NULL
);

/* Then insert some articles for testing: */
INSERT INTO articles (title, body, created)
VALUES ('The title', 'This is the article body.', NOW());
INSERT INTO articles (title, body, created)
VALUES ('A title once again', 'And the article body follows.', NOW());
INSERT INTO articles (title, body, created)
VALUES ('Title strikes back', 'This is really exciting! Not.', NOW());

CREATE TABLE users (
  id       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(255),
  role     VARCHAR(20),
  created  DATETIME     DEFAULT NULL,
  modified DATETIME     DEFAULT NULL
);

ALTER TABLE articles
  ADD COLUMN user_id INT(11);