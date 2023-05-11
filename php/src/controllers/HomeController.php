<?php

class HomeController extends Controller
{
	protected array $paths = ['/'];
	
	protected function execute(): View
	{
		$layout = new LayoutView();
		$layout->addChild(new HeadingView("Home"));
		$layout->addChild(new TextView("Do you want to have a look at our Users?"));
		$layout->addChild(new LinkView("/users", "Click here, you'll like it! ↗️"));
		
		return $layout;
	}
}
