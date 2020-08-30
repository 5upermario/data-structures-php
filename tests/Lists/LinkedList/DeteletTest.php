<?php

namespace Tests\Lists\LinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\LinkedList\LinkedList;

class DeleteTest extends TestCase
{
	public function testDeleteFromEmptyList()
	{
		//setup
		$linkedList = new LinkedList;

		//run
		$linkedList->delete();

		//assert
		$this->assertEquals(0, $linkedList->length());
		$this->assertEquals('null', $linkedList->__toString());
	}

	public function testDeleteFromNonEmptyList()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$linkedList->delete();

		//assert
		$this->assertEquals(2, $linkedList->length());
		$this->assertEquals('20 -> 30 -> null', $linkedList->__toString());
	}
}
