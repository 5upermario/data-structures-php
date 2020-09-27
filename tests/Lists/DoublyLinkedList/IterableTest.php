<?php

namespace Tests\Lists\DoublyLinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\DoublyLinkedList\DoublyLinkedList;

class IterableTest extends TestCase
{
	public function testIteratorOnEmptyList()
	{
		//setup
		$list   = new DoublyLinkedList;
		$result = '';

		//run
		foreach ($list as $node) {
			$result .= ' ' . $node->data;
		}

		//assert
		$this->assertEquals('', $result);
	}

	public function testIteratorOnNonEmptyList()
	{
		//setup
		$list   = DoublyLinkedList::fromValues(10, 20, 30, 40);
		$result = '';
		$list->setDirectionForward();

		//run
		foreach ($list as $key => $node) {
			$result .= ' ' . $key . ' ' . $node->data;
		}

		//assert
		$this->assertEquals(' 0 10 1 20 2 30 3 40', $result);
	}

	public function testIteratorOnBackwardList()
	{
		//setup
		$list   = DoublyLinkedList::fromValues(10, 20, 30, 40);
		$result = '';
		$list->setDirectionBackward();

		//run
		foreach ($list as $key => $node) {
			$result .= ' ' . $key . ' ' . $node->data;
		}

		//assert
		$this->assertEquals(' 3 40 2 30 1 20 0 10', $result);
	}
}
