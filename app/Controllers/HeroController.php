<?php

namespace App\Controllers;

use App\Models\HeroModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class HeroController extends BaseController
{
    /**
     * View a single hero's details.
     *
     * The $id parameter is the hero's ID, and is
     * passed in from the route definition as $1,
     * since it is the first placeholder in the route.
     */
    public function show(int $id)
    {
        // When you only need to use a model in a single place,
        // you can simply get a new instance here. It will use
        // the default database connection if none is passed in
        // during instantiation.
        $heroes = new HeroModel();

        // Locate a single hero, by ID.
        $hero = $heroes->find($id);

        // If the hero was not located, throw an exception.
        if ($hero === null) {
            throw new PageNotFoundException('Hero not found');
        }

        // Display a view file, passing the variables
        // you want to access in the view within the
        // second parameter.
        echo view('hero', [
            'hero' => $hero,
        ]);
    }
}
