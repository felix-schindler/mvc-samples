<?php

class UserSingleView extends View
{
	function __construct(
		private User $user
	) {
	}

	public function render(): void
	{
?>
		<p class="s">ID: <?= $this->user->id ?></p>
		<p><?= $this->user->bio ?></p>
<?php
	}
}
