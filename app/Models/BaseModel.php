<?php

namespace App\Models;

use Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class BaseModel extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;

    protected $perPage = 25;

    public function transformAudit(array $data): array
    {
        if (Arr::has($data, 'auditable_type')) {
            $modelPath = explode("\\", $data['auditable_type']);
            $data['auditable_type'] = last($modelPath);
        }
        if (Arr::has($data, 'user_id')) {
            $data['user_id'] = Auth::user()->id;
        }
        if (Arr::has($data, 'user_type')) {
            $data['user_type'] = Auth::user()->role->name;
        }
        if (Arr::has($data, 'event')) {
            $data['event'] = ucfirst($data['event']);
        }
        return $data;
    }
}
