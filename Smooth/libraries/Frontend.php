<?php 

	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Frontend Library
	 */

	class Frontend
	{

		public static function header($content)
		{
			return '<header><h1>' . $content . '</h1></header>';
		}
		public static function aside($content)
		{
			return '<aside>' . $content . '</aside>';
		}
		public static function footer($content)
		{
			return '<footer><h1>' . $content . '</h1></footer>';
		}
		public static function h($content, $type)
		{
			return '<h' . $type . '>' . $content . '</h' . $type . '>';
		}
		public static function section($content)
		{
			return '<section>' . $content . '</section>';
		}
		public static function nl($count=null)
		{
			$line = '';
			$count == null ? $count = 0 : $count;
			for ($i=0; $i < $count; $i++) { 
				$line .= '<br>';
			}
			return $line;
		}
		public static function div($id=null, $class=null, $content=null)
		{
			return '<div id="' . $id . '" class="' . $class . '">' . $content . '</div>';
		}
		public static function div_open($id, $class)
		{
			return '<div id="' . $id . '" class="' . $class . '">';
		}
		public static function div_close()
		{
			return '</div>';
		}
		public static function link($link, $content)
		{
			return '<a href="' . $link . '">' . $content . '</a>';
		}
		public static function video($link, $width, $height, $controls='controls')
		{
			return '  <video width="' . $width . '" height="' . $height . '" controls="' . $controls . '">
					  <source src="' . $link . '" type="video/mp4" />
					  <source src="' . $link . '" type="video/ogg" />
					  <source src="' . $link . '" type="video/webm" />
					  </video>';
		}
		public static function audio($link, $controls='controls')
		{
			return '<audio controls="' . $controls . '">
					  <source src="' . $link . '" type="audio/ogg" />
					  <source src="' . $link . '" type="audio/mpeg" />
					  Your browser does not support the audio element.
					</audio>';
		}
		public static function progress($max, $value)
		{
			return '<progress max="' . $max . '" value="' . $value . '">';
		}
		public static function meter()
		{

		}
		public static function p($id='', $class='', $content)
		{
			return '<p id="' . $id . '" class="' . $class . '">' . $content . '</p>';
		}
		public static function span($id='', $class='', $content)
		{
			return '<span id="' . $id . '" class="' . $class . '">' . $content . '</span>';
		}
		public static function small($id='', $class='', $content)
		{
			return '<small id="' . $id . '" class="' . $class . '">' . $content . '</small>';
		}
		public static function code($id, $class, $content)
		{
			return '<code id="' . $id . '" class="' . $class . '">' . $content . '</code>';
		}
		public static function pre($id, $class, $content)
		{
			return '<pre id="' . $id . '" class="' . $class . '">' . $content . '</pre>';
		}
		public static function blockquote($id='', $class='', $cite='', $content)
		{
			return '
			<blockquote id="' . $id . '" class="' . $class . '" cite="' . $cite . '">
				<p>' . $content . '</p>
			</blockquote>';
		}
		public static function address($id='', $class='', $content)
		{
			return '
			<address id="' . $id . '" class="' . $class . '">
				'. $content .'
			</address>';
		}
		public static function abbr($id='', $class='', $title, $content)
		{
			return '<abbr id="' . $id . '" class="' . $class . '" title="' . $title . '">' . $content . '</abbr>';
		}
		public static function html5($lang='en', $title='My title', $charset='utf-8', $main_content='')
		{
			return '
			<!DOCTYPE html>
				<html lang="' . $lang . '">
					<head>
						<meta charset="' . $charset . '">
						<title>' . $title . '</title>
					</head>
					<body>
						<p>' . $main_content . '</p>
					</body>
				</html>
			';
		}
		public static function load_js($library)
		{
			$file = '';
			switch ($library) {
				case 'jquery':
					$file = '<script src="http://code.jquery.com/jquery-latest.min.js"></script>';
					break;
				case 'jquery-ui':
					$file = '<script src="http://code.jquery.com/ui/1.8.23/jquery-ui.min.js"></script>';
					break;
				case 'jquery-mobile':
					$file = '<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.js"></script>';
					break;
				case 'angularjs':
					$file = '<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.2/angular.min.js"></script>';
					break;
				case 'ext-core':
					$file = '<script src="//ajax.googleapis.com/ajax/libs/ext-core/3.1.0/ext-core.js"></script>';
					break;
				case 'mootols':
					$file = '<script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js"></script>';
					break;
				case 'prototype':
					$file = '<script src="//ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>';
					break;
				case 'scriptaculous':
					$file = '<script src="//ajax.googleapis.com/ajax/libs/scriptaculous/1.9.0/scriptaculous.js"></script>';
					break;
				case 'swfobject':
					$file = '<script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>';
					break;
				case 'webfont':
					$file = '<script src="//ajax.googleapis.com/ajax/libs/webfont/1.0.30/webfont.js"></script>';
					break;
				case 'qunit':
					$file = '<script src="http://code.jquery.com/qunit/qunit-1.10.0.js"></script>';
					break;
				case 'dojo':
					$file = '<script src="//ajax.googleapis.com/ajax/libs/dojo/1.8.0/dojo/dojo.js"></script>';
					break;
				case 'less':
					$file = '<script src="http://lesscss.org/js/less.js"></script>';
					break;
				case 'yui':
					$file = '<script src="http://yui.yahooapis.com/3.7.2/build/yui/yui-min.js"></script>';
					break;
				case 'coffeescript':
					$file = '<script src="http://coffeescript.org/extras/coffee-script.js"></script>';
					break;
				case 'underscore':
					$file = '<script src="http://underscorejs.org/underscore-min.js"></script>';
					break;
				case 'backbone':
					$file = '<script src="http://backbonejs.org/backbone-min.js"></script>';
					break;
			}
			return $file . "\n";
		}
		public static function load_css($library)
		{
			$file = '';
			switch ($library) {
				case 'bootstrap':
					$file = '<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">';
					break;
				case 'bootstrap-responsive':
					$file = '<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">';
					break;
				case 'qunit':
					$file = '<link href="http://code.jquery.com/qunit/qunit-1.10.0.css" rel="stylesheet">';
					break;
				case 'normalize':
					$file = '<link href="http://necolas.github.com/normalize.css/2.0.1/normalize.css" rel="stylesheet">';
					break;
				case 'html5-boilerplate':
					$file = '<link href="https://raw.github.com/h5bp/html5-boilerplate/master/css/main.css" rel="stylesheet">';
					break;
				case 'reset':
					$file = '<link href="http://meyerweb.com/eric/tools/css/reset/reset.css" rel="stylesheet">';
					break;
				case 'skeleton':
					$file = '<link href="https://raw.github.com/dhgamache/Skeleton/master/stylesheets/base.css" rel="stylesheet">
					<link href="https://raw.github.com/dhgamache/Skeleton/master/stylesheets/layout.css" rel="stylesheet">
					<link href="https://raw.github.com/dhgamache/Skeleton/master/stylesheets/skeleton.css" rel="stylesheet">';
					break;
			}
			return $file . "\n";
		}
		public static function meta($type='', $content='')
		{
			if( $type == 'encoding' )
				$result = '<meta charset="' . $content . '">';
			else
				$result = '<meta name="' . $type . '" content="' . $content . '"';

			return $result;
		}

	}