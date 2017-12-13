<?php


namespace Itb;


class DatabaseSqlite
{
    const DB_NAME = 'itb';
    const DB_PATH = __DIR__ . '/../data';

    // the private connection property
    private $connection;

    /*
     * create and store SQLIte / MySQL db connection ...
     */
    public function __construct()
    {
        try{
            $this->connection = $this->createSQliteConnection();
        } catch(\Exception $e){
            print $e;
        }
    }

    /*
     * create a new SQLIte db connection / file
     */
    private function createSQliteConnection()
    {
        $dsn = 'sqlite:' . self::DB_PATH . '/' . self::DB_NAME . '.sqlite3';

        // Create (connect to) SQLite database in file
        return new \PDO($dsn);
    }


    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

}