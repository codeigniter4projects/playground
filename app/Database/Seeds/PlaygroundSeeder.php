<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PlaygroundSeeder extends Seeder
{
	public function run()
	{
		// Heroes
		$rows = [
			[
				'name'       => 'Hallam Swales',
				'class'      => 'Swashbuckler',
				'level'      => 1,
				'pronoun'    => 'he',
				'image'      => 'pirate.png',
			],
			[
				'name'       => 'Ursula Frost',
				'class'      => 'Vampire',
				'level'      => 5,
				'pronoun'    => 'she',
				'image'      => 'ursula.png',
			],
			[
				'name'       => 'Enter name',
				'class'      => '',
				'image'      => '',
				'pronoun'    => '',
				'deleted_at' => date('Y-m-d H:i:s'),
			],
			[
				'name'       => 'Spriggans',
				'class'      => 'Imp',
				'level'      => 1,
				'pronoun'    => 'it',
				'image'      => 'Default.png',
			],
		];
		
		$builder = $this->db->table('heroes');
		foreach ($rows as $row)
		{
			$row['created_at'] = date('Y-m-d H:i:s');
			$row['updated_at'] = date('Y-m-d H:i:s');
			
			$builder->insert($row);
		}
	}
}
