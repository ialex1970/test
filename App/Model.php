<?php
namespace App;

use App\Db;
use App\Exceptions\NotFound;

abstract class Model
{
    const TABLE = '';
    public $id;
    public $message;

    /**
     * @return array
     */
    public static function findAll($col = null, $dir = null)
    {
        $db = Db::instance();
        if ($col && $dir) {
            return $db->query(
                'SELECT * FROM ' . static::TABLE . ' ORDER BY ' . $col . ' ' . $dir,
                static::class
            );
        } else {
            return $db->query(
                'SELECT * FROM ' . static::TABLE . ' ORDER BY published_at DESC',
                static::class
            );
        }
    }

/**
 * @param int $id
 * @return bool
 */
public
static function findById(int $id)
{
    $db = Db::instance();
    $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id';
    $res = $db->query($sql, static::class, [':id' => $id]);
    if ($res == false) {
        header('Location: http://guest.dev/page404.html');
    }

    return $res[0];
}

/**
 * @param string $name
 * @return mixed
 * @throws NotFound
 */
public
static function findByName(string $name)
{
    $db = Db::instance();
    $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE name = :name';
    $res = $db->query($sql, static::class, [':name' => $name]);
    if ($res == false) {
        throw new NotFound('Not found');
    }

    return $res[0];
}

/**
 * @return bool
 */
public
function isNew()
{
    return empty($this->id);
}

/**
 * @param null $id
 */
public
function save($id = null)
{
    if ($id !== null) {
        $this->update($id);
    } else {
        $this->insert();
    }
}

/**
 * @throws Exceptions\Db
 */
protected
function insert()
{
    if (!$this->isNew()) {
        return;
    }
    $columns = [];
    $values = [];
    foreach ($this as $k => $v) {
        if ($k == 'id') {
            continue;
        }
        $columns[] = $k;
        $values[':' . $k] = $v;
    }
    $strCol = implode(', ', $columns);
    $strVal = implode(', ', array_keys($values));
    $sql = 'INSERT INTO ' . static::TABLE . ' (' . $strCol . ') VALUES (' . $strVal . ')';
    $db = Db::instance();
    $db->execute($sql, $values);
}

/**
 * @param $id
 * @throws Exceptions\Db
 */
protected
function update($id)
{
    $this->id = $id;
    $db = Db::instance();
    $columns = [];
    $values = [];
    foreach ($this as $k => $v) {
        if ($k == 'id') {
            continue;
        }
        $columns[] = $k . '=:' . $k;
        $values[':' . $k] = $v;
    }
    $strCol = implode(', ', $columns);
    $sql = 'UPDATE ' . static::TABLE . ' SET ' . $strCol . ' WHERE id=' . $id;
    $db->execute($sql, $values);
}

/**
 * @param $id
 * @return array|bool
 */
public
function delete($id)
{
    $this->id = (int)$id;
    $db = Db::instance();
    $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
    $res = $db->query($sql, static::class, [':id' => $id]);
    if ($res == false) {
        return false;
    }

    return $res;
}

/**
 * @return array
 * @throws \Exception
 */
public
static function search()
{
    $db = Db::instance();
    $sql = "SELECT * FROM " . static::TABLE . " WHERE message LIKE '%" . strtoupper($_POST['value']) . "%'";
    $res = $db->query($sql, static::class, [':message' => $message]);
    if ($res == false) {
        throw new \Exception('Извините, поиск ничего не дал');
    }

    return $res;
}
}
