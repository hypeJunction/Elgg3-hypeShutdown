<?php

namespace hypeJunction\Shutdown;

use Elgg\Event;
use Symfony\Component\HttpFoundation\Response;

class FlushBuffer {

	/**
	 * Flush buffer to allow scripts to continue execution after the response is sent
	 * @return void
	 */
	public function __invoke() {
		ignore_user_abort(true);

		ob_end_clean();
		ob_end_flush();
		flush();

		set_time_limit(3600); // 1 hour

		// Shutdown sequence will no longer keep the user waiting
		// So any long running script can be executed at any point after the response is sent
	}
}