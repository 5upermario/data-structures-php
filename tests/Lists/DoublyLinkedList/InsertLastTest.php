<?php

namespace Tests\Lists\DoublyLinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\DoublyLinkedList\DoublyLinkedList;

class InsertLastTest extends TestCase
{
	public function testInsertToEmptyList()
	{
		//setup
		$list = new DoublyLinkedList;

		//run
		$list->insertLast(55);

		//assert
		$this->assertEquals(1, $list->length());
		$this->assertEquals('null <-> 55 <-> null', $list->__toString());
	}

	public function testInsertToNonEmptyList()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->insertLast(55);

		//assert
		$this->assertEquals(4, $list->length());
		$this->assertEquals('null <-> 10 <-> 20 <-> 30 <-> 55 <-> null', $list->__toString());
	}
}
