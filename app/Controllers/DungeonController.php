<?php

namespace App\Controllers;

use App\Models\DungeonModel;
use App\Models\HeroModel;

class DungeonController extends BaseController
{
    /**
     * HeroModel instance.
     */
    protected $heroes;

    public function __construct()
    {
        // Assign the model to $this->heroes
        // so that it's available throughout this class
        // Use the `model()` helper method to return
        // a single instance of the model no matter
        // how many times we call it
        $this->heroes = model(DungeonModel::class);
    }

    /**
     * View a single hero's details.
     *
     * The $id parameter is the hero's ID, and is
     * passed in from the route definition as $1,
     * since it is the first placeholder in the route.
     */
    public function show(int $id)
    {
        $dungeon = $this->heroes->find($id);

        if ($dungeon === null) {
            return redirect()->back()->with('error', 'Dungeon not found');
        }

        echo view('dungeon', [
            'dungeon'  => $dungeon,
            'monsters' => $dungeon->monsters(3),
        ]);
    }
}
