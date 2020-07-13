# Process

A brief log of how this repo was created, for those who may be interested. Made in Linux.

## Create the repo

*Commit 83fb1b4*

* Navigate to GitHub and start a new project
* Clone it to a local folder:

`git clone https://github.com/myorganization/playground.git`

## Add CodeIgniter4

*Commit 6cbd1ab*

We use the [App Starter](https://codeigniter4.github.io/userguide/installation/installing_composer.html#app-starter)
in [Latest Dev](https://codeigniter4.github.io/userguide/installation/installing_composer.html#latest-dev)
as a starting point because it takes advantage of the latest version of the framework.

* Create a new `appstarter` project with Composer:

`composer create-project codeigniter4/appstarter --stability=dev --no-install --ignore-platform-reqs --no-interaction`
	
* Move the desired files into our repo:

`mv appstarter/app appstarter/composer.json appstarter/env appstarter/.gitignore appstarter/public appstarter/spark appstarter/writable appstarter/tests playground/`

*Notes: We skip license and docs because we have our own versions.*

## Configure Composer

*Commit 1912da4*

Not everyone will want to use Composer but having it set up correctly makes it available
to those who would.

* Edit **composer.json**, replacing the App Start framework defaults with this project's specifics
* Set the minimum stability to `dev` so we can play with the latest versions (or use the [`builds` commands](https://codeigniter4.github.io/userguide/installation/installing_composer.html#latest-dev))

## Create docs

*Commit ca25c36*

We create the [docs](docs/) and save this file that we have been typing diligently
in the spirit of making this repo well documented.
