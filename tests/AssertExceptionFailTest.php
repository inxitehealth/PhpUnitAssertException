<?php declare(strict_types = 1);

namespace VladaHejda;

use Exception;
use VladaHejda\Exceptions\MyException;
use VladaHejda\Exceptions\MyExceptionSubclass;
use PHPUnit\Framework\TestCase;

class AssertExceptionFailTest extends TestCase
{

	public function testBadCode(): void
	{
		$this->expectException(\PHPUnit\Framework\Exception::class);
		$this->expectExceptionMessage('Failed asserting the code of thrown Exception.');

		$test = function (): void {
			throw new Exception('', 110);
		};
		AssertException::assertException($test, null, 120);
	}

	public function testBadCodeOfClass(): void
	{
		$this->expectException(\PHPUnit\Framework\Exception::class);
		$this->expectExceptionMessage(sprintf(
			'Failed asserting the code of thrown %s.',
			MyException::class
		));

		$test = function (): void {
			throw new MyException('', 110);
		};
		AssertException::assertException($test, null, 120);
	}

	public function testBadMessage(): void
	{
		$this->expectException(\PHPUnit\Framework\Exception::class);
		$this->expectExceptionMessage('Failed asserting the message of thrown Exception.');

		$test = function (): void {
			throw new Exception('Wrong message.');
		};
		AssertException::assertException($test, null, null, 'Right message.');
	}

	public function testBadMessageOfClass(): void
	{
		$this->expectException(\PHPUnit\Framework\Exception::class);
		$this->expectExceptionMessage(sprintf(
			'Failed asserting the message of thrown %s.',
			MyException::class
		));

		$test = function (): void {
			throw new MyException('Wrong message.');
		};
		AssertException::assertException($test, null, null, 'Right message.');
	}

}
