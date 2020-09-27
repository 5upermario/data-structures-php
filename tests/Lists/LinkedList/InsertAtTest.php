<?php

namespace Tests\Lists\LinkedList;

use OutOfBoundsException;
use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\LinkedList\LinkedList;

class InsertAtTest extends TestCase
{
	public function testInsertAtMinusPosition()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->insertAt(-1, 40);
	}

	public function testInsertAtZeroPosition()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->insertAt(0, 40);

		//assert
		$this->assertEquals(4, $linkedList->length());
		$this->assertEquals('40 -> 10 -> 20 -> 30 -> null', $linkedList->__toString());
	}

	public function testInsertAtMiddlePosition()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->insertAt(1, 40);

		//assert
		$this->assertEquals(4, $linkedList->length());
		$this->assertEquals('10 -> 40 -> 20 -> 30 -> null', $linkedList->__toString());
	}

	public function testInsertAtLastPosition()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->insertAt(3, 40);

		//assert
		$this->assertEquals(4, $linkedList->length());
		$this->assertEquals('10 -> 20 -> 30 -> 40 -> null', $linkedList->__toString());
	}

	public function testInsertAtTooBigPosition()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->insertAt(4, 40);
	}
}
