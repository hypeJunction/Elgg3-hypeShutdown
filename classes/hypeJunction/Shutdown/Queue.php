<?php

namespace hypeJunction\Shutdown;

class Queue {

	/**
	 * @var callable[]
	 */
	protected $queue = [];

	/**
	 * Queue a shutdown function
	 *
	 * @param callable $action Callable
	 * @return void
	 */
	public function queue(callable $action) {
		$this->queue[] = $action;
	}

	/**
	 * Process queue
	 * @return void
	 */
	public function process() {
		foreach ($this->queue as $callable) {
			call_user_func($callable, elgg());
		}

		$this->queue = [];
	}
}