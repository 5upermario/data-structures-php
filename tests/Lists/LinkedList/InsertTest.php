<?php

namespace Tests\Lists\LinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\LinkedList\LinkedList;

class InsertTest extends TestCase
{
	public function testInsertToAnEmptyLinkedList()
	{
		//setup
		$linkedList = new LinkedList();

		//run
		$linkedList->insert(4);

		//assert
		$this->assertEquals(1, $linkedList->length());
		$this->assertEquals('4 -> null', $linkedList->__toString());
	}

	public function testInsertToANotEmptyLinkedList()
	{
		//setup
		$linkedList = LinkedList::fromValues(88, 99);

		//run
		$linkedList->insert(77);

		//assert
		$this->assertEquals(3, $linkedList->length());
		$this->assertEquals('77 -> 88 -> 99 -> null', $linkedList->__toString());
	}
}
