<?php

class UserListView extends View
{
	/**
	 * @param array<User> $user
	 */
	function __construct(
		private array $user
	) {
	}

	public function render(): void
	{
?>
		<ul>
			<?php foreach ($this->user as $user) : ?>
				<li>
					<a href="/users/<?= $user->id ?>">
						<?= $user->name ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
<?php
	}
}
