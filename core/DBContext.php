<?php

namespace core;

use PDO;
use PDOException;

class DBContext
{
    protected $connection;

    public function __construct($host, $dbname, $login, $password)
    {
        $this->connection = new PDO("mysql: host=$host;dbname=$dbname", $login, $password);
    }

    public function lastInsertId($name = null)
    {
        return $this->connection->lastInsertId($name);
    }

    public function table($tableName)
    {
        $query = new QueryBuilder($this->connection, $tableName);
        return $query;
    }

    public function backUp()
    {
        try {
            // Генеруємо шлях до файлу резервної копії.
            $backupPath = "F:/programs/coding/OSPanel/OSPanel/domains/passport/static/bu/" . 'passportFull' . "_" . date("Ymd_His") . ".bak";

            // Формуємо SQL-запит для резервного копіювання бази даних.
            $backupCommand = 'mysqldump --host ' . DATABASE_HOST . ' --user ' . DATABASE_LOGIN . ' --password ' . DATABASE_PASSWORD . ' ' . DATABASE_BASENAME . ' --result-file=' . $backupPath;

            //$this->connection->exec($backupCommand);
            
            
            $this->connection->exec($backupCommand);
            
            echo $backupCommand;
            echo "<br>Резервна копія успішно створена.";
        } catch (PDOException $e) {
            // Виводимо повідомлення про помилку, якщо вона сталася.
            echo "Помилка при створенні резервної копії: " . $e->getMessage();
        }
    }
}
