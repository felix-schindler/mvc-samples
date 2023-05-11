<?php

class HeadingView extends View
{
	public function __construct(
		private string $title
	) {
	}

	public function render(): void
	{
		echo "<h1>{$this->title}</h1>";
	}
}
