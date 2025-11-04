<?php

namespace StatusActivityLog\Traits;

use StatusActivityLog\Models\Status;
use StatusActivityLog\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait HasStatus
{
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * Set status by code for this model.
     *
     * @param string $code
     * @param string|null $note
     * @return void
     */
    public function setStatus(string $code, ?string $note = null): void
    {
        $module = class_basename($this);
        $status = Status::where('module', $module)->where('code', $code)->first();

        if (!$status) {
            throw new \Exception("Status code [$code] not found for module [$module].");
        }

        $oldStatus = $this->status?->code ?? null;

        $this->status_id = $status->id;
        $this->save();

        // create activity log for status change
        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? 'System',
            'action' => 'status_changed',
            'model' => get_class($this),
            'model_id' => $this->id,
            'ip_address' => Request::ip(),
            'changes' => json_encode(['from' => $oldStatus, 'to' => $status->code, 'note' => $note]),
        ]);
    }
}
