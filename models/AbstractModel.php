<?php
//namespace gallery\models;

abstract class AbstractModel
{
	protected static $dbh;

	public function connectDB()
	{
		$dbParam = require __DIR__ . '/../config/DbConnect.php';
		$dsn = "mysql:host={$dbParam['host']};dbname={$dbParam['dbname']}";
		$user = $dbParam['user'];
		$pass = $dbParam['pass'];
		try {
			$dbh = new PDO($dsn, $user, $pass);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$dbh = $dbh;
		} catch (PDOException $e) {
			file_put_contents(__DIR__ . '/../error_connect/PDOErrors.txt',
				iconv('windows-1251', 'utf-8', $e->getMessage()) . "\n", FILE_APPEND);
		}
	}

	public function query($sql, $class = 'stdClass', $binParam = null)
	{
		try {
			$sth = self::$dbh->prepare($sql);
			if (isset($binParam[0])) {
				foreach ($binParam as $item) {
					foreach ($item as $key => $value) {
						$sth->bindParam($key, $value);
					}
				}
			}

			$sth->execute();
			$row = $sth->fetchObject($class);
			return $row;

		} catch (PDOException $e) {
			file_put_contents(__DIR__ . '/../error_connect/QueryErrors.txt',
				iconv('windows-1251', 'utf-8', $e->getMessage()) . "\n", FILE_APPEND);
		}
	}
}