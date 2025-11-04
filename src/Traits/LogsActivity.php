<?php

namespace StatusActivityLog\Traits;

use StatusActivityLog\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait LogsActivity
{
    public static function bootLogsActivity()
    {
        static::created(function ($model) {
            self::logAction('created', $model);
        });

        static::updated(function ($model) {
            self::logAction('updated', $model);
        });

        static::deleted(function ($model) {
            self::logAction('deleted', $model);
        });
    }

    protected static function logAction($action, $model)
    {
        $user = Auth::user();

        ActivityLog::create([
            'user_id' => $user->id ?? null,
            'user_name' => $user->name ?? 'Guest',
            'action' => $action,
            'model' => get_class($model),
            'model_id' => $model->id ?? null,
            'ip_address' => Request::ip(),
            'changes' => json_encode($model->getChanges() ?: []),
        ]);
    }

    public function activityLogs()
    {
        return $this->morphMany(ActivityLog::class, 'model');
    }
}
