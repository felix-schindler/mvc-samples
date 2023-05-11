<?php

/**
 * This class allow a more direct access to all Database
 * classes for easier access to things like transactions
 *
 * To close the connection, the instance has to be set to `null`
 *
 * @since 2.0.0
 */
class Database extends PDO
{
	private PDOStatement $query;

	/**
	 * Opens the connection to the DB automatically
	 *
	 * @throws PDOException If the connection can't be established
	 */
	public function __construct()
	{
		parent::__construct('sqlite::memory:');

		$sql = <<<SQL
		CREATE TABLE IF NOT EXISTS users (
			id TEXT PRIMARY KEY,
			name TEXT,
			bio TEXT
		);

		INSERT OR IGNORE INTO users (id, name, bio) VALUES ('aabbd79f-d7f9-40c3-8f6e-bd7074b90713', 'Felix Schindler', 'Location: Bad Cannstatt\nStudying: Computer Science as a german-chinese double degree');
		INSERT OR IGNORE INTO users (id, name, bio) VALUES ('4021d3ff-7778-4951-b74c-142c662d964b', 'Sophie', 'Location: Vaihingen\nStudying: Computer Science as a german-chinese double degree');
		SQL;

		$this->exec($sql);
	}

	/**
	 * Executes an SQL query
	 *
	 * @param string $queryStr SQL query as string
	 * @param array<string,string> $values Escaped values
	 * @throws PDOException When anything goes wrong
	 * @return bool Whether the query was executed successfully
	 */
	public function execute(string $queryStr, ?array $values = null): bool
	{
		$this->query = $this->prepare($queryStr);
		return $this->query->execute($values);
	}

	/**
	 * Reads data (row by row) from database
	 * Access returned value via $return['ColumnName']
	 *
	 * @see https://bugs.php.net/bug.php?edit=2&id=44341 Always string values!
	 * @throws PDOException When anything goes wrong
	 * @return array<string,string>|null Result as array - null on failure
	 */
	public function fetch(): ?array
	{
		$this->query->setFetchMode(PDO::FETCH_ASSOC);	// Fetch into array
		if (($result = $this->query->fetch()) !== false)
			return $result;
		return null;
	}

	/**
	 * Reads data (all rows) from database
	 *
	 * @see https://bugs.php.net/bug.php?edit=2&id=44341 Always string values!
	 * @return array<array<string,string>> Null on error, array with values (as string!) otherwise (PDO::FETCH_ASSOC)
	 */
	public function fetchAll(): array
	{
		return $this->query->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Counts the effected rows of the last query
	 *
	 * @return integer Effected rows
	 */
	public function count(): int
	{
		return $this->query->rowCount();
	}
}
