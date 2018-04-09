<?php

namespace hypeJunction\Shutdown;

use Elgg\Event;
use Symfony\Component\HttpFoundation\Response;

class CloseConnection {

	/**
	 * Close HTTP connection
	 *
	 * @param Event $event Event
	 *
	 * @return Response
	 */
	public function __invoke(Event $event) {

		$response = $event->getObject();
		/* @var $response \Symfony\Component\HttpFoundation\Response */

		$response->headers->set('Connection', 'close');
		$response->headers->set('Content-Encoding', 'none');
		$response->headers->set('Content-Length', strlen($response->getContent()));

		return $response;

	}
}