<?php
namespace gallery\core;
class DB
{
	protected $dbh;

	public function connectDB()
	{
		$dbParam = require __DIR__ . '/../config/DbConnect.php';
		try {
			$dbh = new \PDO("mysql:host={$dbParam['host']};dbname={$dbParam['dbname']}",
							$dbParam['user'], $dbParam['pass']);
			$dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			$this->dbh = $dbh;
		} catch (\PDOException $e) {
			file_put_contents(__DIR__ . '/../error_connect/PDOErrors.txt',
				iconv('windows-1251', 'utf-8', $e->getMessage()) . "\n", FILE_APPEND);
		}
	}

	public function query($sql, $class = 'stdClass', $binParam = null)
	{
		try {
			$sth = $this->dbh->prepare($sql);
			$sth->execute($binParam);
			$row = $sth->fetchObject($class);
			return $row;

		} catch (\PDOException $e) {
			file_put_contents(__DIR__ . '/../error_connect/QueryErrors.txt',
				iconv('windows-1251', 'utf-8', $e->getMessage()) . "\n", FILE_APPEND);
		}
	}
}