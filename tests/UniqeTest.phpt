<?php

use RM\Utils\Unique;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';

class UniqueTest extends Tester\TestCase
{
	/**
	 * @dataProvider default.ini
	 */
	public function testGet($files, $filename, $expected, $separator = '-') {
		$dir = __DIR__ . DIRECTORY_SEPARATOR . Nette\Utils\Random::generate();

		$files = strlen($files) > 0 ? explode(',', $files) : [];

		mkdir($dir);
		foreach ($files as $file)
			file_put_contents($dir . DIRECTORY_SEPARATOR . $file, NULL);

		Unique::$separator = $separator;
		Assert::same($expected, Unique::get($filename, $dir));

		foreach ($files as $file)
			unlink($dir . DIRECTORY_SEPARATOR . $file);
		rmdir($dir);
	}

	/**
	 * @dataProvider same.ini
	 */
	public function testSame($filename) {
		Assert::same($filename, Unique::get($filename));
	}
}

$testCase = new UniqueTest;
$testCase->run();
