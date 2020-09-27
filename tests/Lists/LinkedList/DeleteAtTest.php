<?php

namespace Tests\Lists\LinkedList;

use OutOfBoundsException;
use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\LinkedList\LinkedList;

class DeleteAtTest extends TestCase
{
	public function testDeleteFromEmptyList()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$linkedList = new LinkedList;

		//run
		$linkedList->deleteAt(0);
	}

	public function testDeleteWithMinusIndex()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->deleteAt(-1);
	}

	public function testDeleteHead()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->deleteAt(0);

		//assert
		$this->assertEquals(2, $linkedList->length());
		$this->assertEquals('20 -> 30 -> null', $linkedList->__toString());
	}

	public function testDeleteFromMiddle()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->deleteAt(1);

		//assert
		$this->assertEquals(2, $linkedList->length());
		$this->assertEquals('10 -> 30 -> null', $linkedList->__toString());
	}

	public function testDeleteLast()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->deleteAt(2);

		//assert
		$this->assertEquals(2, $linkedList->length());
		$this->assertEquals('10 -> 20 -> null', $linkedList->__toString());
	}

	public function testDeleteNonExistingElement()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->deleteAt(3);
	}
}
