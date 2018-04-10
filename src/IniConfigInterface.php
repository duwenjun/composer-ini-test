<?php
namespace Hhzbeads\Ini;

interface IniConfigInterface
{

	public static function getConfig($fileName);

	public static function getConfigSelect($fileName, $section);

	public static function getConfigKey($fileName, $section, $key);

}