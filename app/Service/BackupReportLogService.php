<?php
namespace App\Service;

use App\Models\BackupReportLog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class BackupReportLogService
{
    public function getCatalogPaginator(array $filter): LengthAwarePaginator
    {
        $order = $filter['order'];

        if (in_array($order, ['project_name', 'db_name'])) {
            $order = "detail->{$order}";
        }

        $paginator = BackupReportLog::select([
                'id',
                'detail->project_name as project_name',
                'detail->db_name as db_name',
                'status',
                'created_at',
            ])
            ->when($filter['search'] !== '', function (Builder $builder) use ($filter) {
                $search = $filter['search'];

                return $builder->where('id', 'ilike', "{$search}%")
                    ->orWhere('detail->project_name', 'ilike', "{$search}%")
                    ->orWhere('detail->db_name', 'ilike', "{$search}%")
                    ->orWhere('status', 'ilike', "{$search}%")
                    ->orWhere('created_at', 'ilike', "{$search}%");
            })
            ->orderBy($filter['order'], $filter['sort'])
            ->paginate(15);

        return $paginator;
    }
}
