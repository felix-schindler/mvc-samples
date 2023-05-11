<?php

use PHPUnit\Framework\TestCase;
require "../src/models/User.php";

class UserTests extends TestCase
{
	/**
	 * @throws Exception
	 */
	function testUserFromArray(): void {
		$u1 = User::from([
			'id' => "24a3d454-7670-41c3-9ec4-02a2b82602ce",
			'name' => 'Felix Schindler',
			'bio' => 'Age: 20'
		]);

		$this->assertNotNull($u1);
	}
}
