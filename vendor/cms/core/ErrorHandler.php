<?php

namespace cms;

class ErrorHandler
{
	/**
	 * @var \DateTime
	 */
	private $date;
	
	CONST URL_FILE_ERROR  = WWW . '/errors/';
	CONST FILE_SAVE_ERROR = ROOT . '/storage/errors/errors.log';
	CONST ERR_404 	 = '404';
	CONST ERR_DEV 	 = 'dev';
	CONST ERR_PROD   = 'prod';
	CONST FILE_ERROR = [
		self::ERR_404  => self::URL_FILE_ERROR . '404.php',
		self::ERR_DEV  => self::URL_FILE_ERROR . 'dev.php',
		self::ERR_PROD => self::URL_FILE_ERROR . 'prod.php'
	];
	
	/**
	 * ErrorHandler constructor.
	 * @throws \Exception
	 */
	public function __construct()
	{
		$this->date = (new \DateTime())->format('Y-m-d H-i-s');
		
		DEBUG ? error_reporting(-1) : error_reporting(0);
		set_exception_handler([$this, 'exceptionHandler']);
	}
	
	/**
	 * @param \Throwable $e
	 */
	public function exceptionHandler(\Throwable $e): void
	{
		$this->logErrors($e->getMessage(), $e->getTraceAsString() ,$e->getFile(), $e->getLine());
		$this->displayError('Exeption', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
	}
	
	/**
	 * @param string $message
	 * @param string $title
	 * @param string $file
	 * @param string $line
	 */
	protected function logErrors(string $message = '', string $title = '', string $file = '', string $line = ''): void
	{
		$date	  = '[' . $this->date . ']';
		$message  = 'Текст ошибки:' . $message;
		$file 	  = '| ФАЙЛ: ' . $file;
		$line 	  = '| Линия: ' . $line;
		$seporate = "\n==========================\n";
		
		error_log($date . $message . $file . $line . $seporate,3,self::FILE_SAVE_ERROR);
	}
	
	/**
	 * @param string $errno
	 * @param string $errstr
	 * @param string $errFile
	 * @param string $errLine
	 * @param int $responce
	 */
	protected function displayError(
		string $errno,
		string $errstr,
		string $errfile,
		string $errline,
		int $responce = 404
	): void
	{
		http_response_code((int)$responce);
		if (DEBUG && isset(self::FILE_ERROR[$responce])) {
			require_once self::FILE_ERROR[$responce];
		} elseif (DEBUG) {
			require_once self::FILE_ERROR[self::ERR_DEV];
		} else {
			require_once self::FILE_ERROR[self::ERR_PROD];
		}
		die;
	}
}