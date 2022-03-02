<?php

namespace Qubiqx\QcommerceEcommerceEboekhouden\Listeners;

use Qubiqx\QcommerceEcommerceEboekhouden\Classes\Eboekhouden;
use Qubiqx\QcommerceEcommerceCore\Events\Orders\InvoiceCreatedEvent;

class MarkOrderAsPushableListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(InvoiceCreatedEvent $event)
    {
        if (Eboekhouden::isConnected($event->order->site_id) && ! $event->order->eboekhoudenOrder) {
            $event->order->eboekhoudenOrder()->create([]);
        }
    }
}
