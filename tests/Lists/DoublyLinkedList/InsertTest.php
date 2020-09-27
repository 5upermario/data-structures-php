<?php

namespace Tests\Lists\DoublyLinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\DoublyLinkedList\DoublyLinkedList;

class InsertTest extends TestCase
{
	public function testInsertToAnEmptyList()
	{
		//setup
		$list = new DoublyLinkedList;

		//run
		$list->insert(55);

		//assert
		$this->assertEquals(1, $list->length());
		$this->assertEquals('null <-> 55 <-> null', $list->__toString());
	}

	public function testInsertToANonEmptyList()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 30, 40);

		//run
		$list->insert(55);

		//assert
		$this->assertEquals(4, $list->length());
		$this->assertEquals('null <-> 55 <-> 10 <-> 30 <-> 40 <-> null', $list->__toString());
	}
}
