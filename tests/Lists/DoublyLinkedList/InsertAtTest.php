<?php

namespace Tests\Lists\DoublyLinkedList;

use OutOfBoundsException;
use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\DoublyLinkedList\DoublyLinkedList;

class InsertAtTest extends TestCase
{
	public function testInsertAtMinusPosition()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->insertAt(-1, 40);
	}

	public function testInsertAtZeroPosition()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->insertAt(0, 40);

		//assert
		$this->assertEquals(4, $list->length());
		$this->assertEquals('null <-> 40 <-> 10 <-> 20 <-> 30 <-> null', $list->__toString());
	}

	public function testInsertAtMiddlePosition()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->insertAt(1, 40);

		//assert
		$this->assertEquals(4, $list->length());
		$this->assertEquals('null <-> 10 <-> 40 <-> 20 <-> 30 <-> null', $list->__toString());
	}

	public function testInsertAtLastPosition()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->insertAt(3, 40);

		//assert
		$this->assertEquals(4, $list->length());
		$this->assertEquals('null <-> 10 <-> 20 <-> 30 <-> 40 <-> null', $list->__toString());
	}

	public function testInsertAtTooBigPosition()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->insertAt(4, 40);
	}
}
