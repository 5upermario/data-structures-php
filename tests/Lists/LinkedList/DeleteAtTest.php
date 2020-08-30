<?php

namespace Tests\Lists\LinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\LinkedList\LinkedList;

class DeleteAtTest extends TestCase
{
	public function testDeleteFromEmptyList()
	{
		//setup
		$linkedList = new LinkedList;

		//run
		$linkedList->deleteAt(0);

		//assert
		$this->assertEquals(0, $linkedList->length());
		$this->assertEquals('null', $linkedList->__toString());
	}

	public function testDeleteWithMinusIndex()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->deleteAt(-1);

		//assert
		$this->assertEquals(3, $linkedList->length());
		$this->assertEquals('10 -> 20 -> 30 -> null', $linkedList->__toString());
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
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->deleteAt(3);

		//assert
		$this->assertEquals(3, $linkedList->length());
		$this->assertEquals('10 -> 20 -> 30 -> null', $linkedList->__toString());
	}
}
