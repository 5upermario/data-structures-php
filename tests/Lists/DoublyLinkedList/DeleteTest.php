<?php

namespace Tests\Lists\DoublyLinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\DoublyLinkedList\DoublyLinkedList;

class DeleteTest extends TestCase
{
	public function testDeleteFromEmptyList()
	{
		//setup
		$list = new DoublyLinkedList;

		//run
		$list->delete();

		//assert
		$this->assertEquals(0, $list->length());
		$this->assertEquals('null <-> null', $list->__toString());
	}

	public function testDeleteFromSingleElementList()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10);

		//run
		$list->delete();

		//assert
		$this->assertEquals(0, $list->length());
		$this->assertEquals('null <-> null', $list->__toString());
	}

	public function testDeleteFromNonEmptyList()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->delete();

		//assert
		$this->assertEquals(2, $list->length());
		$this->assertEquals('null <-> 20 <-> 30 <-> null', $list->__toString());
	}
}
