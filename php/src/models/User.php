<?php

class User
{
	public function __construct(
		public string $id,
		public string $name,
		public string $bio,
	) {
	}

	/**
	 * @param array<string,string> $userData
	 * @throws Exception
	 */
	public static function from(array $userData): User
	{
		$id = $userData['id'];
		$name = $userData['name'];
		$bio = $userData['bio'];

		if ($id && $name && $bio) {
			return new User($userData['id'], $userData['name'], $userData['bio']);
		}

		throw new Exception('User data is incorrect. Please provide `id`, `name` and `bio`');
	}
}
