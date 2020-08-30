<?php

namespace SM\DataStructures\Lists\LinkedList;

class LinkedList
{
	private ?LinkedListNode $head;
	private int $length;

	public function __construct()
	{
		$this->head   = null;
		$this->length = 0;
	}

	public function find(int $index)
	{
		if ($index < 0 || $index >= $this->length) return null;

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
		if ($index < 0 || $index > $this->length) return;

		if ($index == 0) {
			$this->insert($data);
			return;
		}

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
		if ($this->length == 0 || $index < 0 || $index >= $this->length) return;

		if ($index == 0) {
			$this->delete();
			return;
		}

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
