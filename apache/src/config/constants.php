<?php
    class LANGUAGE {
        public static $RU = "ru";
        public static $EN = "en";
    }

    class THEME {
        public static $LIGHT = "light";
        public static $DARK = "dark";
    }
    
    abstract class DICT {
        public $STUDENTSTESTINGSERVICE;
        public $PROFILE;
        public $USER;
        public $TESTS;
        public $TITLE;
        public $DISCIPLINE;
        public $AUTHOR;
        public $LOGOUT;
        public $TESTINGSTUDENTS;
        public $SETTINGS;
        public $UPDATE;
        public $THEME;
        public $LIGHT;
        public $DARK;
        public $LANGUAGE;
        public $RUSSIAN;
        public $ENGLISH;
        public $NAME;
        public $SEND_THIS_FILE;
        public $UPLOAD_FILE;
        public $SEND_FILE;
        public $UPLOADING_FILES;
        public $DOWNLOAD_FILE;
        public $PDF;
        public $DIAGRAMS;
        public $GRAPHICS;

    }

    class RUS_DICT extends DICT {
        public $TESTS = "Тесты";
        public $TITLE = "Название";
        public $DISCIPLINE = "Дисциплина";
        public $AUTHOR = "Автор";

        public $LOGOUT = "Выйти";
        public $USER = "Пользователь";
        public $STUDENTSTESTINGSERVICE = "Сервис тестирования студентов";
        public $TESTINGSTUDENTS = "Тестирование";
        public $PROFILE =  "Профиль";
        public $SETTINGS = "Настройки";
        public $UPDATE = "Обновить";

        public $THEME = "Тема";
        public $NAME = "Имя";
        public $LIGHT = "Светлая";
        public $DARK = "Темная";

        public $LANGUAGE = "Язык";
        public $RUSSIAN = "Русский";
        public $ENGLISH = "Английский";

        public $SEND_THIS_FILE = "Отправить этот файл";
        public $UPLOAD_FILE = "Загрузить файл";
        public $SEND_FILE = "Отправить файл";
        public $UPLOADING_FILES = "Загруженные файлы";
        public $DOWNLOAD_FILE = "Скачать";
        public $PDF = "Расширение файла должно быть .pdf";
        public $DIAGRAMS = "Диаграммы";
        public $GRAPHICS = "Графики";
    }

    class ENG_DICT extends DICT
    {
        public $TESTS = "Tests";
        public $TITLE = "Title";
        public $DISCIPLINE = "Discipline";
        public $AUTHOR = "Author";
        
        public $LOGOUT = "Logout";
        public $USER = "User";
        public $STUDENTSTESTINGSERVICE = "Students Testing Service";
        public $TESTINGSTUDENTS = "Testing students";
        public $PROFILE = "Profile";
        public $SETTINGS = "Settings";
        public $UPDATE = "Update";

        public $THEME = "Theme";
        public $NAME = "Name";
        public $LIGHT = "Light";
        public $DARK = "Dark";

        public $LANGUAGE = "Language";
        public $RUSSIAN = "Russian";
        public $ENGLISH = "English";

        public $SEND_THIS_FILE = "Send this file";
        public $UPLOAD_FILE = "Upload file";
        public $SEND_FILE = "Send file";
        public $UPLOADING_FILES = "Uploaded files";
        public $DOWNLOAD_FILE = "Download";
        public $PDF = "Расширение файла должно быть .pdf";
        public $DIAGRAMS = "Diagrams";
        public $GRAPHICS = "Graphics";
    }

        $dict = [
            "ru" => new RUS_DICT,
            "en" => new ENG_DICT,
        ];

?>