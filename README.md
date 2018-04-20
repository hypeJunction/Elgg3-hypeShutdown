hypeShutdown
============

API to offset code execution until system shutdown.
Allows plugins to execute expensive code until after the page has been rendered in the browser.

## Usage

All shutdown event handlers will be executed after the request has been sent to the browser and the buffer has been flushed.

You can either register a shutdown event handler:

```php
elgg_register_event_handler('shutdown', 'system', function() {
	// your long running script
});
```

You can also use a runtime queue:

```php
\hypeJunction\Shutdown\Queue::instance()->queue(function() use ($video) {
	$video->convert();
});
```