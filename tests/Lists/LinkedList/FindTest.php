<?php

namespace Tests\Lists\LinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\LinkedList\LinkedList;

class FindTest extends TestCase
{
	public function testFindMinusIndex()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$result = $linkedList->find(-1);

		//assert
		$this->assertNull($result);
	}

	public function testFindHead()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$result = $linkedList->find(0);

		//assert
		$this->assertEquals(10, $result);
	}

	public function testFindMiddleElement()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$result = $linkedList->find(1);

		//assert
		$this->assertEquals(20, $result);
	}

	public function testFindNonExistingElement()
	{
		//setup
		$linkedList = LinkedList::fromValues(10, 20, 30);

		//run
		$result = $linkedList->find(3);

		//assert
		$this->assertNull($result);
	}
}
