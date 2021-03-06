<?php

use Kirby\Cms\Page;
use Kirby\Toolkit\Tpl;

class ExamplePage extends Page
{
	public function getMarkup($source = false)
	{
		return Tpl::load($this->root() . '/index.php', compact('source'));
	}

	public function getStyles()
	{
		$css = '';
		$parent = $this->parent();

		if (is_a($parent, ExamplePage::class)) {
			$css .= $parent->getStyles();
		}

		$css .= Tpl::load($this->root() . '/style.css');
		$css .= Tpl::load($this->root() . '/demo.css');

		return $css;
	}

	public function getStylesheetURL()
	{
		$assets = kirby()->root('assets');
		$slug = $this->slug();

		if (file_exists("$assets/$slug.css")) {
			return "assets/$slug.css";
		} else {
			return null;
		}
	}

	public function getScriptURL()
	{
		$assets = kirby()->root('assets');
		$parent = $this->parent();

		if (is_a($parent, ExamplePage::class)) {
			$slug = $parent->slug();
		} else {
			$slug = $this->slug();
		}

		$filepath = "$assets/$slug.js";

		if (file_exists($filepath)) {
			$filename = "$slug.js";
		} else {
			$filename = 'examples.js';
		}

		return "assets/$filename";
	}

	public function getStylesText()
	{
		return Tpl::load($this->root() . '/style.css');
	}

	public function getScriptText()
	{
		return Tpl::load($this->root() . '/script.js');
	}
}
