<?php

namespace App\Controllers;

use App\Models\DungeonModel;
use CodeIgniter\HTTP\ResponseInterface;

class DungeonController extends BaseController
{
    /**
     * DungeonModel instance.
     */
    protected DungeonModel $dungeons;

    public function __construct()
    {
        // Assign the model to $this->dungeons
        // so that it's available throughout this class
        // Use the `model()` helper method to return
        // a single instance of the model no matter
        // how many times we call it
        $this->dungeons = model(DungeonModel::class);
    }

    /**
     * View a single dungeon's details.
     *
     * The $id parameter is the dungeon's ID, and is
     * passed in from the route definition as $1,
     * since it is the first placeholder in the route.
     *
     * @return ResponseInterface|string
     */
    public function show(int $id)
    {
        $dungeon = $this->dungeons->find($id);

        if ($dungeon === null) {
            return redirect()->back()->with('error', 'Dungeon not found');
        }

        return view('dungeon', [
            'dungeon'  => $dungeon,
            'monsters' => $dungeon->monsters(3),
        ]);
    }
}
