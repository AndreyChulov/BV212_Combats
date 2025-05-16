-- Удаление таблицы, если скрипт запускается на рабочей БД --
DROP TABLE IF EXISTS Credentials;

-- [Пере]создание таблицы --
CREATE TABLE Credentials (
                             Id int AUTO_INCREMENT,
                             Login varchar(10),
                             Hash varchar(500),
                             PRIMARY KEY (Id)
);

-- Создание базовых учетных записей начальных пользователей --
INSERT INTO Credentials(Login, Hash)
VALUES ("su", "7ee1345597f3bb1d50054c299cca0f57ee1345597f3bb1d50054c299cca0"), -- Пароль "su" --
       ("root", "4b8daf4b8ea9d39568719e1e320076b4b8daf4b8ea9d39568719e1e32007"), -- Пароль "root" --
       ("test", "5a671c66aefea124cc08b76ea6d30b05a671c66aefea124cc08b76ea6d30"), -- Пароль "test" --
       ("p1", "850ae5126b39a75859039aa84c3a57a850ae5126b39a75859039aa84c3a5"), -- Пароль "p1" --
       ("p2", "099c7c12dde5f81f4d3ce261da36379099c7c12dde5f81f4d3ce261da363") -- Пароль "p2" --
;