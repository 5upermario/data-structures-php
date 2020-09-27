<?php

namespace Tests\Lists\DoublyLinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\DoublyLinkedList\DoublyLinkedList;

class DeleteAtTest extends TestCase
{
	public function testDeleteFromEmptyList()
	{
		//setup
		$list = new DoublyLinkedList;

		//run
		$list->deleteAt(0);

		//assert
		$this->assertEquals(0, $list->length());
		$this->assertEquals('null <-> null', $list->__toString());
	}

	public function testDeleteWithMinusIndex()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->deleteAt(-1);

		//assert
		$this->assertEquals(3, $list->length());
		$this->assertEquals('null <-> 10 <-> 20 <-> 30 <-> null', $list->__toString());
	}

	public function testDeleteHead()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->deleteAt(0);

		//assert
		$this->assertEquals(2, $list->length());
		$this->assertEquals('null <-> 20 <-> 30 <-> null', $list->__toString());
	}

	public function testDeleteFromMiddle()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->deleteAt(1);

		//assert
		$this->assertEquals(2, $list->length());
		$this->assertEquals('null <-> 10 <-> 30 <-> null', $list->__toString());
	}

	public function testDeleteLast()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->deleteAt(2);

		//assert
		$this->assertEquals(2, $list->length());
		$this->assertEquals('null <-> 10 <-> 20 <-> null', $list->__toString());
	}

	public function testDeleteFromSingleElementList()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10);

		//run
		$list->deleteAt(0);

		//assert
		$this->assertEquals(0, $list->length());
		$this->assertEquals('null <-> null', $list->__toString());
	}

	public function testDeleteNonExistingElement()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->deleteAt(3);

		//assert
		$this->assertEquals(3, $list->length());
		$this->assertEquals('null <-> 10 <-> 20 <-> 30 <-> null', $list->__toString());
	}
}
