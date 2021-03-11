<?php

namespace App\Policies;

use App\Models\BackupReportLog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BackupReportLogPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        //
        return true;
    }

    public function view(User $user, BackupReportLog $backupReportLog)
    {
        //
        return true;
    }

    public function delete(User $user, BackupReportLog $backupReportLog)
    {
        //
        return $user->isAdmin();
    }
}
