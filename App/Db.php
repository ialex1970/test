<?php

namespace App;

class Db
{
    use Singleton;
    private $_dbh;

    /**
     * Db constructor.
     */
    protected function __construct()
    {
        $options = array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        try {
            $this->_dbh = new \PDO('mysql:host=127.0.0.1;dbname=guest_book', 'root', 'root', $options);
        } catch (\PDOException $e) {
            throw  new \App\Exceptions\Db('Что-то не так с базой' . ' ' . $e->getMessage());
        }
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool
     * @throws Exceptions\Db
     */
    public function execute($sql, $params = [])
    {

        $sth = $this->_dbh->prepare($sql);
        $res = $sth->execute($params);             //Возвращает boolean
        if (!$res) {
            $ex = new \App\Exceptions\Db('Ошибка при работе с БД');
            throw $ex;
        }
        return $res;
    }

    /**
     * @param $sql
     * @param $class
     * @return array
     */
    public function query($sql, $class, $params = [])
    {
        $sth = $this->_dbh->prepare($sql);

        $res = $sth->execute($params);
        if ($res !== false) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}
