<?php

namespace Database\Factories;

use App\Enums\BackupReportStatus;
use App\Models\BackupReportLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BackupReportLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BackupReportLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'status' => BackupReportStatus::Success,
            'detail' => [
                'project_name' => $this->faker->name,
                'computer_name' => 'My PC',
                'ip' => $this->faker->ipv4,
                'started_at' => '2021-03-11T02:13:00.016Z',
                'finished_at' => '2021-03-11T02:13:25.299Z',
                'db_name' => $this->faker->userName,
                'db_type' => 'PostgreSQL',
                'file_path' => '\\var\\app\\backup-reporter\\runner\\storage\\My Project\\pg_backup_reporter\\2021-03-11_10-13-00.zip',
                'file_size' => 10495
            ]
        ];
    }

    public function failed()
    {
        return $this->state(function (array $attr) {
            return [
                'status' => BackupReportStatus::Failed,
                'detail' => [
                    'project_name' => $this->faker->name,
                    'computer_name' => 'My PC',
                    'ip' => $this->faker->ipv4,
                    'started_at' => '2021-03-11T02:13:00.016Z',
                    'db_name' => $this->faker->userName,
                    'db_type' => 'PostgreSQL',
                    'message' => 'Whoops something went wrong, yikes.'
                ]
            ];
        });
    }
}
