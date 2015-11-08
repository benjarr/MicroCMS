<?php
/**
 * Created by PhpStorm.
 * User: benja
 * Date: 08/11/15
 * Time: 20:42
 */

namespace MicroCMS\DAO;

use Doctrine\DBAL\Connection;

abstract class DAO
{
    /**
     * Database connection
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * Constructor
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
     * Grants access to the database connection object
     * @return \Doctrine\DBAL\Connection The database connection object
     */
    protected function getDb() { return $this->db; }

    /**
     * @param $row
     * @return mixed
     */
    protected abstract function buildDomainObject($row);
}