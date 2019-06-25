<?php

namespace cms;

class Cache
{
	use TSingletone;
	
	const EXTENSION = '.txt';
	
	/**
	 * @param string $key
	 * @param string $data
	 * @param int $second
	 * @return bool
	 */
	public function set(string $key, string $data, int $second = 3600): bool
	{
		if ($second) {
			$content['data'] = $data;
			$content['end_time'] = time() + $second;
			return (file_put_contents(CACHE . '/' . md5($key) . self::EXTENSION, serialize($content)))? true : false;
		}
	}
	
	/**
	 * @param string $key
	 * @return bool|mixed
	 */
	public function get(string $key)
	{
		$file = CACHE . '/' . md5($key) . self::EXTENSION;
		if (file_exists($file)) {
			$content = unserialize(file_get_contents($file));
			if (time() <= $content['end_time']) {
				return $content;
			}
			unlink($file);
		}
		return false;
	}
	
	/**
	 * @param string $key
	 */
	public function delete(string $key): void
	{
		$file = CACHE . '/' . md5($key) . self::EXTENSION;
		if (file_exists($file)) {
			unlink($file);
		}
	}
}