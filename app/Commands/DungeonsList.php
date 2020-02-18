<?php namespace App\Commands;

use App\Models\DungeonModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class DungeonsList extends BaseCommand
{
    protected $group       = 'Playground';
    protected $name        = 'dungeons:list';
    protected $description = 'List all dungeons by difficulty';
	protected $usage       = 'dungeons:list';
	protected $arguments   = [];

	public function run(array $params = [])
    {
        $row = (new DungeonModel())
			->select('id, name, difficulty, capacity')
			->orderBy('difficulty', 'desc')
			->get()->getResultArray();

		if (empty($row))
		{
			CLI::write('There are no dungeons. Did you seed the database?', 'yellow');
		}
		else
		{
			$thead = ['ID', 'Name', 'Difficulty', 'Capacity'];
			CLI::table($row, $thead);
		}
	}
}
