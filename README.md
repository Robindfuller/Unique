# Unique

[![Build Status](https://scrutinizer-ci.com/g/romanmatyus/Unique/badges/build.png?b=master)](https://scrutinizer-ci.com/g/romanmatyus/Unique/build-status/master)
[![Code Quality](https://scrutinizer-ci.com/g/romanmatyus/Unique/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/romanmatyus/Unique/)
[![Code Coverage](https://scrutinizer-ci.com/g/romanmatyus/Unique/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/romanmatyus/Unique/)
[![Packagist](https://img.shields.io/packagist/v/rm/unique.svg)](https://packagist.org/packages/rm/unique)

Uniqe is simple library for generating unique filenames in directories.

## Requirements

Unique requires PHP 5.4 or later.

## Installation

The best way to install Unique is use [Composer](http://getcomposer.org) package [`rm/unique`](https://packagist.org/packages/rm/unique) or manual download the latest ZIP package from [GitHub](https://github.com/romanmatyus/Unique/archive/master.zip).

```
$ composer require rm/unique
```

## Example

I need upload file `something.png` into directory `/images`.

If it is necessary to not overwrite existing files, you need to generate unique filenames.

**Now it's simple!**

```PHP
$filename = Unique::get('something.png', '/images'); // return 'something.png'

```

And what if directory contains files `something.png` and for example, also `something-1.png`?

Returns `something-2.png`!

`Unique::get()` automatic generate filename in format `<filename><separator><order>.<extension>` and check if exists in specified directory. If is unique, return it.

## API

### get()

Method `get()` has two parameters:

- `string` `$filename` Name of file
- `string` `$dir` Directory where will be file saved

Return

- `string` Output filename

### $separator

Default `separator` of filename and order it's `-`. It's possible change it, for example:

```PHP
Unique::$separator = '|';
```

## Contributing

- Use it!
- Write bug reports of ideas into [Issue tracker](https://github.com/romanmatyus/Unique/issues).
- Fork repos and send pull requests with number of issue, source code and tests.

## Contact

Roman Mátyus <romanmatyus@romiix.org>
