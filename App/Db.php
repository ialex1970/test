<?php
namespace App;


class Db
{
    use Singleton;
    //use PDO;
    protected $dbh;

    /**
     * Db constructor.
     */
    protected function __construct()
    {
        $options = array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        try {
            $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=lesson', 'root', '123', $options);
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
        $sth = $this->dbh->prepare($sql);
        //$res = $sth->execute($params);
        return $sth->execute($params);
    }

    /**
     * @param $sql
     * @param $class
     * @return array
     */
    public function query($sql, $class)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();

        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}
