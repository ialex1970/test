<?php

namespace App;

use App\Db;

abstract class Model
{
    const TABLE = '';
    public $id;

    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function findById($id)
    {
        //static::$id = $id;
        $db = Db::instance();
        //echo 'SELECT * FROM ' . static::TABLE . ' WHERE id='.$this->id; die;
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id='.$id,
            static::class
        )[0];
    }


    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }
        $columns = [];
        $values = [];
        foreach ($this as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            $columns[] = $key;
            $values[':' .$key] = $value;
        }
        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(',', $columns) . ')
      VALUES (' . implode(',', array_keys($values)) . ')';

        $db = Db::instance();
        $db->execute($sql, $values);
    }

    /* public function update($id)
     {
       $obj = static::findById($id);
       //var_dump($obj); die;
       $columns = [];
       foreach($this as $key => $value) {
         $columns[] = $key;
       }
       print_r($columns);
     }*/
}
