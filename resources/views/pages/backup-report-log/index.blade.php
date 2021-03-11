<x-layouts.main title="Backup Report Log List">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Backup Report Log List
                    </h2>
                    <div class="text-muted mt-1">
                        {{ $backupReportLogs->firstItem() }}-{{ $backupReportLogs->lastItem() }} of {{ $backupReportLogs->total() }} data
                    </div>
                </div>
            </div>
        </div>

        <x-alert-validation-error />

        <x-backup-report-log-filter class="mb-3" />

        @if ($backupReportLogs->count() > 0)
            <div class="row row-cards mb-3">
                @foreach ($backupReportLogs as $log)
                    <div class="col-md-6 col-xl-4">
                        <x-backup-report-log-card :backup-report-log="$log" />
                    </div>
                @endforeach
            </div>
        @else
            <x-empty-catalog-result />
        @endif

        <div class="d-flex justify-content-center">
            {{ $backupReportLogs->links() }}
        </div>
    </div>

    @push('scripts')
        <script>
            window.pageState = {
                filter: @json($filter)
            }
        </script>
        <script src="{{ mix('js/pages/backup-report-log/index.js') }}"></script>
    @endpush
</x-layouts.main>
