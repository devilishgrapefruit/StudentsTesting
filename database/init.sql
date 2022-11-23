CREATE DATABASE IF NOT EXISTS testsDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON testsDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE testsDB;
-- DROP TABLE users, students;
CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(30) NOT NULL,
    password VARCHAR(40) NOT NULL,
    role VARCHAR(20) NOT NULL,
    email VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)
    );

CREATE TABLE IF NOT EXISTS students (
    student_id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    login VARCHAR(30) NOT NULL,
    password VARCHAR(40) NOT NULL,
    email VARCHAR(40) NOT NULL,
    name VARCHAR(40) NOT NULL,
    surname VARCHAR(40) NOT NULL,
    course INT(8) NOT NULL,
    student_group VARCHAR(20) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id),
    PRIMARY KEY (student_id)
    );


CREATE TABLE IF NOT EXISTS tests (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(40) NOT NULL,
    discipline VARCHAR(60) NOT NULL,
    author INT(11) NOT NULL,
    FOREIGN KEY (author) REFERENCES users (id),
    PRIMARY KEY (id)
    );

CREATE TABLE IF NOT EXISTS questions (
    question_id INT(20) NOT NULL AUTO_INCREMENT,
    test_id INT(11) NOT NULL,
    question VARCHAR(80) NOT NULL,
    right_answer VARCHAR(20) NOT NULL,
    FOREIGN KEY (test_id) REFERENCES tests (id),
    PRIMARY KEY (question_id)
    );

CREATE TABLE IF NOT EXISTS answers (
    answer_id INT(40) NOT NULL AUTO_INCREMENT,
    question_id INT(20) NOT NULL,
    test_id INT(11) NOT NULL,
    variants VARCHAR(100) NOT NULL,
    FOREIGN KEY (test_id) REFERENCES tests (id),
    FOREIGN KEY (question_id) REFERENCES questions (question_id),
    PRIMARY KEY (answer_id)
    );

INSERT INTO users (login, password, role, email)
VALUES 
    ('user', '{SHA}Et6pb+wgWTVmq3VpLJlJWWgzrck=', 'USER', 'user@gmail.com'),
    ('lera', 'lera', 'ADMIN', 'patinalera@gmail.com'),
    ('admin', '{SHA}QL0AFWMIX8NRZTKeof9cXsvbvu8=', 'ADMIN', 'patinalera@gmail.com');


INSERT INTO tests (title, discipline, author)
VALUES 
    ('Основы права', 'Правоведение', 1),
    ('Комплексные числа', 'Математические анализ', 1);
