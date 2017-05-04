<?php

namespace App\View;

use Illuminate\View\FileViewFinder;


/**
*
*/
class ThemeViewFinder extends FileViewFinder
{

	protected $activeTheme;

	protected $basePath;



	public function setBasePath($path)
	{
		# code...
		return $this->basePath = $path;
	}

	public function setActiveTheme($theme)
	{
		# code...
		$this->activeTheme = $theme;

		array_unshift($this->paths, $this->basePath.'/'.$theme.'/views');

	}

}
