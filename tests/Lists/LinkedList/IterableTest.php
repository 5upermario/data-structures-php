<?php

namespace Tests\Lists\LinkedList;

use PHPUnit\Framework\TestCase;
use SM\DataStructures\Lists\LinkedList\LinkedList;

class IterableTest extends TestCase
{
	public function testIteratorOnEmptyList()
	{
		//setup
		$list   = new LinkedList;
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
		$list   = LinkedList::fromValues(10, 20, 30, 40);
		$result = '';

		//run
		foreach ($list as $node) {
			$result .= ' ' . $node->data;
		}

		//assert
		$this->assertEquals(' 10 20 30 40', $result);
	}
}
