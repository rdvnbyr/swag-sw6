<?php

namespace Sendcloud\Shipping\Core\Infrastructure\Utility\Events;

/**
 * Class EventEmitter
 * @package Sendcloud\Shipping\Core\Infrastructure\Utility\Events
 */
abstract class EventEmitter
{
    protected $handlers = array();

    /**
     * Registers event handler for a given event
     *
     * @param string $eventClass Fully qualified class name of desired event
     * @param callable $handler Callback to invoke when event occurs. Observable will pass observed event instance as a
     *     handler parameter.
     */
    public function when($eventClass, callable $handler)
    {
        $this->handlers[$eventClass][] = $handler;
    }

    /**
     * Fires requested event by calling all its registered handlers
     *
     * @param \Sendcloud\Shipping\Core\Infrastructure\Utility\Events\Event $event Event to fire
     *
     * @return void
     */
    protected function fire(Event $event)
    {
        $eventClass = get_class($event);
        if (empty($this->handlers[$eventClass])) {
            return;
        }

        foreach ($this->handlers[$eventClass] as $handler) {
            call_user_func($handler, $event);
        }
    }
}
