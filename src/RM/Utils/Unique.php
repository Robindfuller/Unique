<?php

namespace RM\Utils;

/**
 * Uniqe is simple library for generating unique filenames in directories.
 *
 * @author Roman Mátyus <romanmatyus@romiix.org>
 */
class Unique
{
	/** @var string Filename and order separator */
	public static $separator = '-';

	/**
	 * Get new filename in format <filename><separator><order>.<extension>
	 * @param  string $filename Name of file
	 * @param  string $dir      Directory where will be file saved
	 * @return string           Output filename
	 */
	public static function get($filename, $dir)
	{
		if (!file_exists($dir . DIRECTORY_SEPARATOR . $filename))
			return $filename;

		$path_parts = pathinfo($filename);

		$name = $path_parts['filename'];
		$extension = $path_parts['extension'];

		preg_match("/" . self::$separator . "(?<order>\d+)$/", $name, $tmp);
		$order = (isset($tmp['order'])) ? $tmp['order'] : NULL;

		$nameWithoutOrder = (isset($tmp['order'])) ? substr($name, 0, -strlen(self::$separator . $order)) : $name;

		$generateNewName = function ($order) use ($nameWithoutOrder, $extension) {
			$n = $nameWithoutOrder;
			$n .= (is_null($order)) ? NULL : self::$separator . $order;
			$n .= '.' . $extension;
			return $n;
		};

		$newName = $generateNewName($order);

		while (file_exists($dir . DIRECTORY_SEPARATOR . $newName))
			$newName = $generateNewName($order++);

		return $newName;
	}
}
