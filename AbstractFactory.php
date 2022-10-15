<?php

class ConnectDataBase
{
    protected DBConnection $connection;
    protected DBRecord $record;
    protected DBQueryBuilder $queryBuilder;

    public function __construct(IDataBaseFactory $dataBaseFactory)
    {
        $this->connection = $dataBaseFactory->createConnection();
        $this->record = $dataBaseFactory->createRecord();
        $this->queryBuilder = $dataBaseFactory->createQueryBuilder();
    }

//    Для проверки работы фабрики
//    /**
//     * @return DBConnection
//     */
//    public function getConnection(): DBConnection
//    {
//        return $this->connection;
//    }

}

interface DBConnection {}
interface DBRecord {}
interface DBQueryBuilder {}

class MySQLConnection implements DBConnection {}
class MySQLRecord implements DBRecord {}
class MySQLQueryBuilder implements DBQueryBuilder {}

class PostgresQLConnection implements DBConnection {}
class PostgresQLRecord implements DBRecord {}
class PostgresQLQueryBuilder implements DBQueryBuilder {}

class OracleConnection implements DBConnection {}
class OracleRecord implements DBRecord {}
class OracleQueryBuilder implements DBQueryBuilder {}

interface IDataBaseFactory
{
    public function createConnection(): DBConnection;
    public function createRecord(): DBRecord;
    public function createQueryBuilder(): DBQueryBuilder;
}

class MySQLFactory implements IDataBaseFactory
{

    public function createConnection(): DBConnection
    {
//        echo "Подключена MySQL"; //Для проверки работы фабрики
        return new MySQLConnection();
    }

    public function createRecord(): DBRecord
    {
        return new MySQLRecord();
    }

    public function createQueryBuilder(): DBQueryBuilder
    {
        return new MySQLQueryBuilder();
    }
}

class PostgresQLFactory implements IDataBaseFactory
{
    public function createConnection(): DBConnection
    {
//        echo "Подключена PostgresQL"; //Для проверки работы фабрики
        return new PostgresQLConnection();
    }

    public function createRecord(): DBRecord
    {
        return new PostgresQLRecord();
    }

    public function createQueryBuilder(): DBQueryBuilder
    {
        return new PostgresQLQueryBuilder();
    }
}

class OracleFactory implements IDataBaseFactory
{
    public function createConnection(): DBConnection
    {
        return new OracleConnection();
    }

    public function createRecord(): DBRecord
    {
        return new OracleRecord();
    }

    public function createQueryBuilder(): DBQueryBuilder
    {
        return new OracleQueryBuilder();
    }
}



$database = new ConnectDataBase(new PostgresQLFactory());
//$database->getConnection(); //Для проверки работы фабрики