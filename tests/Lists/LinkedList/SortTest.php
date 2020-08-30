<?php

namespace Tests\Lists\LinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\LinkedList\LinkedList;

class SortTest extends TestCase
{
	public function testSortOnEmptyList()
	{
		//setup
		$linkedList = new LinkedList;

		//run
		$linkedList->sort();

		//assert
		$this->assertEquals('null', $linkedList->__toString());
	}

	public function testSort()
	{
		//setup
		$linkedList = LinkedList::fromValues(55, 26, 17, 34, 25, 99);

		//run
		$linkedList->sort();

		//assert
		$this->assertEquals('17 -> 25 -> 26 -> 34 -> 55 -> 99 -> null', $linkedList->__toString());
	}
}
