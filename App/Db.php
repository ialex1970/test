<?php
namespace App;

//use App\Exceptions\Db;

class Db
{
    use Singleton;
    //use PDO;
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
            $this->_dbh = new \PDO('mysql:host=127.0.0.1;dbname=lesson', 'root', '123', $options);
        } catch (\PDOException $e) {
            throw  new \App\Exceptions\Db($e->getMessage());
        }

    }

    /**
     * @param $sql
     * @param array $params
     * @return bool
     */
    public function execute($sql, $params = [])
    {

        $sth = $this->_dbh->prepare($sql);
        $res = $sth->execute($params);             //Возвращает boolean
        if(!$res) {
            $ex = new \App\Exceptions\Db('Исключение');
            throw $ex;
        }
        return $res;
    }

    /**
     * @param $sql
     * @param $class
     * @return array
     */
    public function query($sql, $class, $params=[])
    {
        $sth = $this->_dbh->prepare($sql);
        $res = $sth->execute($params);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}
