<?php

namespace Tests\Lists\LinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\LinkedList\LinkedList;

class ReverseTest extends TestCase
{
	public function testReverseWithEmptyList()
	{
		//setup
		$linkedList = new LinkedList;

		//run
		$linkedList->reverse();

		//assert
		$this->assertEquals('null', $linkedList->__toString());
	}

	public function testReverseWithOddLength()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->reverse();

		//assert
		$this->assertEquals('30 -> 20 -> 10 -> null', $linkedList->__toString());
	}

	public function testReverseWithEvenLength()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30, 40);

		//run
		$linkedList->reverse();

		//assert
		$this->assertEquals('40 -> 30 -> 20 -> 10 -> null', $linkedList->__toString());
	}
}
