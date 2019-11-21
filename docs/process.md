# Process

A brief log of how this repo was created, for those who may be interested. Made in Linux.

## Create the repo

*Commit 83fb1b4*

* Navigate to GitHub and start a new project
* Clone it to a local folder:

`git clone https://github.com/tattersoftware/playground.git`

## Add CodeIgniter4

*Commit 6cbd1ab*

We use the [Dev Starter](https://codeigniter4.github.io/userguide/installation/installing_composer.html#dev-starter)
as a starting point because it takes advantage of the latest version of the framework.

* Create a new `devstarter` project with Composer:

`composer create-project codeigniter4/devstarter --stability=dev --no-install --ignore-platform-reqs --no-interaction`
	
* Move the desired files into our repo:

`mv devstarter/app devstarter/composer.json devstarter/env devstarter/.gitignore devstarter/public devstarter/spark devstarter/writable playground/`

*Notes: We skip license and docs because we have our own versions, and the test files because we will use ProjectTests.*

## Add ProjectTests

*Commit cc337b8*

We use CodeIgniter 4's [ProjectTests](https://github.com/codeigniter4projects/project-tests)
for unit testing because the **tests/** directory that comes with the framework is designed
to test the framework, not our project.

* Clone the repo to a local folder:

`git clone https://github.com/codeigniter4projects/project-tests.git`

* Move the desired files into our repo:

`mv project-tests/src/* playground/`

*Notes: See the [ProjectTests docs](https://github.com/codeigniter4projects/project-tests/blob/develop/README.md) for more info on the suite.*

## Configure Composer

*Commit 1912da4*

Not everyone will want to use Composer but having it set up correctly makes it available
to those who would.

* Edit **composer.json**, replacing the Dev Start framework defaults with this project's specifics
* Add the necessary sections for running unit tests via **ProjectTests**
* Set the minimum stability to `dev` so we can play with the latest versions

## Create docs

*Commit ca25c36*

We create the [docs](docs/) and save this file that we have been typing diligently
in the spirit of making this repo well documented.
