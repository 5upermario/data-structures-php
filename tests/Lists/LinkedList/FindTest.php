<?php

namespace Tests\Lists\LinkedList;

use OutOfBoundsException;
use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\LinkedList\LinkedList;

class FindTest extends TestCase
{
	public function testFindMinusIndex()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->find(-1);
	}

	public function testFindHead()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$result = $linkedList->find(0);

		//assert
		$this->assertEquals(10, $result);
	}

	public function testFindMiddleElement()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$result = $linkedList->find(1);

		//assert
		$this->assertEquals(20, $result);
	}

	public function testFindNonExistingElement()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->find(3);
	}
}
