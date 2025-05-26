<?php

namespace App\Observers;

use App\Models\Entry;

class EntryObserver
{
    /**
     * Handle the Entry "created" event.
     */
    public function created(Entry $entry): void
    {
        $entry->log?->recalculateMetrics();
    }

    /**
     * Handle the Entry "updated" event.
     */
    public function updated(Entry $entry): void
    {
        $entry->log?->recalculateMetrics();
    }

    /**
     * Handle the Entry "deleted" event.
     */
    public function deleted(Entry $entry): void
    {
        $entry->log?->recalculateMetrics();
    }

    /**
     * Handle the Entry "restored" event.
     */
    public function restored(Entry $entry): void
    {
        //
    }

    /**
     * Handle the Entry "force deleted" event.
     */
    public function forceDeleted(Entry $entry): void
    {
        //
    }
}
