<?php
namespace Hhzbeads\Ini;

class IniConfig implements IniConfigInterface
{

	const CONFIG_PATH = "/home/resource_config/";

    const CONFIG_FILE_SUFFIX = ".ini";

	public static function getConfig($fileName)
	{
		if ($fileName) {
            $config = new \Yaf_Config_Ini(self::CONFIG_PATH . $fileName . self::CONFIG_FILE_SUFFIX);
            return $config->toArray();
        } else {
            throw new \Exception("请先设置配置文件");
        }
	}

	public static function getConfigSelect($fileName, $section)
	{
		$fileConfig = self::getConfig($fileName);
        if (isset($fileConfig[$section])) {
            return $fileConfig[$section];
        } else {
            throw new \Exception($fileName . "-" . $section . "-配置项不存在，请检查配置文件");
        }
	}

	public static function getConfigKey($fileName, $section, $key)
	{
		$sectionConfig = self::getConfigSelect($fileName, $section);
        if (isset($sectionConfig[$key])) {
            return $sectionConfig[$key];
        } else {
            throw new \Exception($fileName . "-" . $section . "-" . $key . "-配置值不存在，请检查配置文件");
        }
	}

}