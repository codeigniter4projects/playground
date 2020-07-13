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

		// Dungeons
        $rows = [
            [
                'name'       => 'Palace of the Inquisition',
                'difficulty' => 4,
                'capacity'   => 25
            ],
            [
                'name'       => 'Warwick\'s Revenge',
                'difficulty' => 6,
                'capacity'   => 15
            ],
            [
                'name'       => 'The Den of Horrors',
                'difficulty' => 10,
                'capacity'   => 42
            ],
        ];

        $builder = $this->db->table('dungeons');
        foreach ($rows as $row)
        {
            $row['created_at'] = date('Y-m-d H:i:s');
            $row['updated_at'] = date('Y-m-d H:i:s');

            $builder->insert($row);
        }

		// Monsters
		$rows = [
			[
				'name'       => 'Slime',
				'health'     => 5,
				'dungeon_id' => 1,
			],
			[
				'name'       => 'Goblin',
				'health'     => 10,
				'dungeon_id' => 1,
			],
			[
				'name'       => 'Hound',
				'health'     => 25,
				'dungeon_id' => 2,
			],
			[
				'name'       => 'Werewolf',
				'health'     => 35,
				'dungeon_id' => 2,
			],
			[
				'name'       => 'Warwick',
				'health'     => 300,
				'dungeon_id' => 2,
				'deleted_at' => date('Y-m-d H:i:s'),
			],
			[
				'name'       => 'Ghoul',
				'health'     => 1,
				'dungeon_id' => 3,
			],
			[
				'name'       => 'Skeleton',
				'health'     => 10,
				'dungeon_id' => 3,
			],
			[
				'name'       => 'Abomination',
				'health'     => 100,
				'dungeon_id' => 3,
			],
		];

		$builder = $this->db->table('monsters');
		foreach ($rows as $row)
		{
			$row['created_at'] = date('Y-m-d H:i:s');
			$row['updated_at'] = date('Y-m-d H:i:s');

			$builder->insert($row);
		}

		// Abilities
		$rows = [
			[
				'name'     => 'Hit',
				'damage'   => 1,
				'cooldown' => 2,
			],
			[
				'name'     => 'Scratch',
				'damage'   => 2,
				'cooldown' => 4,
			],
			[
				'name'     => 'Bite',
				'damage'   => 3,
				'cooldown' => 5,
			],
			[
				'name'     => 'Howl',
				'damage'   => 8,
				'cooldown' => 15,
			],
			[
				'name'     => 'Blast',
				'damage'   => 10,
				'cooldown' => 20,
			],
		];

		$builder = $this->db->table('abilities');
		foreach ($rows as $row)
		{
			$row['created_at'] = date('Y-m-d H:i:s');
			$row['updated_at'] = date('Y-m-d H:i:s');

			$builder->insert($row);
		}

		// Abilities-Monsters
		$rows = [
			['ability_id' => 1, 'monster_id' => 1], // Hit - Slime
			['ability_id' => 1, 'monster_id' => 2], // Hit - Goblin
			['ability_id' => 1, 'monster_id' => 7], // Hit - Skeleton
			['ability_id' => 1, 'monster_id' => 8], // Hit - Abomination
			['ability_id' => 2, 'monster_id' => 3], // Scratch - Hound
			['ability_id' => 2, 'monster_id' => 4], // Scratch - Werewolf
			['ability_id' => 2, 'monster_id' => 7], // Scratch - Skeleton
			['ability_id' => 3, 'monster_id' => 2], // Bite - Goblin
			['ability_id' => 3, 'monster_id' => 3], // Bite - Hound
			['ability_id' => 3, 'monster_id' => 4], // Bite - Werewolf
			['ability_id' => 3, 'monster_id' => 5], // Bite - Warwick
			['ability_id' => 4, 'monster_id' => 3], // Howl - Hound
			['ability_id' => 4, 'monster_id' => 4], // Howl - Werewolf
			['ability_id' => 4, 'monster_id' => 6], // Howl - Ghoul
			['ability_id' => 5, 'monster_id' => 5], // Blast - Warwick
			['ability_id' => 5, 'monster_id' => 6], // Blast - Ghoul
		];
		
		$builder = $this->db->table('abilities_monsters');
		foreach ($rows as $row)
		{
			$row['created_at'] = date('Y-m-d H:i:s');

			$builder->insert($row);
		}
	}
}
