<?php

namespace SM\DataStructures\Lists\LinkedList;

use Iterator;
use OutOfBoundsException;

class LinkedList implements Iterator
{
	protected ?LinkedListNode $head;
	protected int $length;
	protected ?LinkedListNode $current;
	protected int $position;

	public function __construct()
	{
		$this->head     = null;
		$this->length   = 0;
		$this->current  = null;
		$this->position = -1;
	}

	public function rewind()
	{
		$this->current  = $this->head ?? null;
		$this->position = $this->head ? 0 : -1;
	}

	public function current()
	{
		return $this->current;
	}

	public function key()
	{
		return $this->position;
	}

	public function next()
	{
		$this->current = $this->current->next;
		++$this->position;
	}

	public function valid()
	{
		return $this->position != -1 && !is_null($this->current);
	}

	public function find(int $index)
	{
		if ($index < 0 || $index >= $this->length)
			throw new OutOfBoundsException;

		$current = $this->head;
		$i       = 0;

		while ($i < $index) {
			$current = $current->next;
			++$i;
		}

		return $current->data;
	}

	public function insert($data)
	{
		$node       = new LinkedListNode($data);
		$node->next = $this->head;
		$this->head = $node;

		++$this->length;
	}

	public function insertAt(int $index, $data)
	{
		if ($index < 0 || $index > $this->length)
			throw new OutOfBoundsException;

		if ($index == 0)
			return $this->insert($data);

		$current = $this->head;
		$i       = 0;
		$node    = new LinkedListNode($data);

		while ($i < $index - 1) {
			$current = $current->next;
			++$i;
		}

		$node->next    = $current->next;
		$current->next = $node;
		++$this->length;
	}

	public function delete()
	{
		if ($this->length == 0) return;

		$head       = $this->head;
		$this->head = $head->next;

		unset($head);
		--$this->length;
	}

	public function deleteAt(int $index)
	{
		if ($this->length == 0 || $index < 0 || $index >= $this->length)
			throw new OutOfBoundsException;

		if ($index == 0)
			return $this->delete();

		$current = $this->head;
		$i       = 0;

		while ($i < $index - 1) {
			$current = $current->next;
			++$i;
		}

		$deletable     = $current->next;
		$current->next = $current->next->next;

		--$this->length;
		unset($deletable);
	}

	public function reverse()
	{
		$previous = null;
		$current  = $this->head;
		$next     = null;

		while (!is_null($current)) {
			$next          = $current->next;
			$current->next = $previous;
			$previous      = $current;
			$current       = $next;
		}

		$this->head = $previous;
	}

	public function sort()
	{
		$size = $this->length;
		$k    = $size;

		for ($i = 0; $i < $size - 1; ++$i, --$k) {
			$current = $this->head;
			$next    = $this->head->next;

			for ($j = 1; $j < $k; ++$j) {
				if ($current->data > $next->data) {
					$tmpData       = $current->data;
					$current->data = $next->data;
					$next->data    = $tmpData;
				}

				$current = $current->next;
				$next    = $next->next;
			}
		}
	}

	public function length(): int
	{
		return $this->length;
	}

	public function __toString()
	{
		$result  = '';
		$current = $this->head;

		while (!is_null($current)) {
			$result .= $current->data . ' -> ';
			$current = $current->next;
		}

		return $result . 'null';
	}

	public static function fromValues(...$data): self
	{
		$linkedList = new self();

		foreach (array_reverse($data) as $value) {
			$linkedList->insert($value);
		}

		return $linkedList;
	}
}
