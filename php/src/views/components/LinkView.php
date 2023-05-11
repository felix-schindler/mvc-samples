<?php

class LinkView extends View
{
	public function __construct(
		private string $href,
		private ?string $title = null
	) {
		if ($this->title == null) {
			$this->title = $this->href;
		}
	}

	public function render(): void
	{
		echo "<a href=\"{$this->href}\">$this->title</a>";
	}
}
