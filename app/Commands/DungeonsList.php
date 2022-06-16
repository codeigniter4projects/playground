<?php

namespace App\Commands;

use App\Models\DungeonModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class DungeonsList extends BaseCommand
{
    /**
     * @var string
     */
    protected $group = 'Playground';

    /**
     * @var string
     */
    protected $name = 'dungeons:list';

    /**
     * @var string
     */
    protected $description = 'List all dungeons by difficulty';

    /**
     * @var string
     */
    protected $usage = 'dungeons:list';

    /**
     * @var mixed[]
     */
    protected $arguments = [];

    public function run(array $params = []): void
    {
        $row = model(DungeonModel::class)
            ->builder()
            ->select('id, name, difficulty, capacity')
            ->orderBy('difficulty', 'desc')
            ->get()->getResultArray();

        if (empty($row)) {
            CLI::write('There are no dungeons. Did you seed the database?', 'yellow');
        } else {
            $thead = ['ID', 'Name', 'Difficulty', 'Capacity'];
            CLI::table($row, $thead);
        }
    }
}
