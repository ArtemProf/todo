<?php

	namespace common\components\helpers;

	class StringsHelper
	{
		public static function trimmer($text, $maxwords = 20, $maxchar = 100) {
			$text = strip_tags($text);
			$words = explode(' ', $text);
			$wordsCount = count($words);
			$text = '';

			while (mb_strlen($text.' '.($word = array_shift($words))) < $maxchar && $wordsCount - count($words) < $maxwords)
				$text .= ' '.trim($word);

			return $text
				? trim(preg_replace('/[\,\.\-\ ]$/', '', $text)).'...'
				: '';
		}
		
		public static function clean($string) {
			$s = trim($string);
			$s = iconv('UTF-8', 'UTF-8//IGNORE', $s); // drop all non utf-8 characters
			// this is some bad utf-8 byte sequence that makes mysql complain - control and formatting i think
			$s = preg_replace('/(?>[\x00-\x1F]|\xC2[\x80-\x9F]|\xE2[\x80-\x8F]{2}|\xE2\x80[\xA4-\xA8]|\xE2\x81[\x9F-\xAF])/', ' ', $s);
			$s = preg_replace('/\s+/', ' ', $s); // reduce all multiple whitespace to a single space
			
			return $s;
		}
	}