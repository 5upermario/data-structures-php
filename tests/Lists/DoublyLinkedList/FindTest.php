<?php

namespace Tests\Lists\DoublyLinkedList;

use OutOfBoundsException;
use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\DoublyLinkedList\DoublyLinkedList;

class FindTest extends TestCase
{
	public function testFindWithMinusIndex()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->find(-1);
	}

	public function testFindWithTooBigIndex()
	{
		//assert
		$this->expectException(OutOfBoundsException::class);

		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$list->find(3);
	}

	public function testFindHead()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$result = $list->find(0);

		//assert
		$this->assertEquals(10, $result);
	}

	public function testFindLast()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$result = $list->find(2);

		//assert
		$this->assertEquals(30, $result);
	}

	public function testFindMiddle()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30);

		//run
		$result = $list->find(1);

		//assert
		$this->assertEquals(20, $result);
	}

	public function testFindInBiggerList()
	{
		//setup
		$list = DoublyLinkedList::fromValues(10, 20, 30, 40, 50, 60, 70, 80, 90);

		//run
		$result = $list->find(6);

		//assert
		$this->assertEquals(70, $result);
	}
}
