# Database

An overview of creating this project's database and how to configure and use it.

## Defining

Our project comes with all the database tables it needs by defining a series of
[Migrations](https://codeigniter4.github.io/userguide/dbmgmt/migration.html). Migration
files can be specific to one table (or even one column) or they can group a number of
changes together, as long as running them in order produces the desired result.

We start with one big migration to create the tables we need. From the command line:

`./spark migrate:create create_playground_tables`

This generates our [first migration file](App/Database/Migrations/2019-11-21-175417_create_playground_tables.php)
which can now be filled in with our database tables. Later migrations can change any of this
so there is no need to get it all correct on first try.

## Connecting

Before we can use our database we need to supply the connection info. The User Guide has
a lot of information on how to do this:
[Database Configuration](https://codeigniter4.github.io/userguide/database/configuration.html)

For our project we will follow some secure best practices and leave all sensitive information
out of our config files (e.g. [app/Config/Database.php](app/Config/Database.php)) and place
it instead in our **.env** file. This ensures our database credentials never go into
a repo, and it positions our project to use different database connections for each environment.

Since we cannot provide **.env** in the repo, there is one pre-configured for a simple
test database at [.env.example](.env.example), based one the version that comes with the
framework, **env** (no leading period). Rename it to **.env** to use it.

## Migrating

Once migrations are in place and we have a working database connection we are ready to
create the database. Use the **spark** command to run through all migrations so our project
has the latest database structure:

`./spark migrate`

## Seeding

[Database Seeds](https://codeigniter4.github.io/userguide/dbmgmt/seeds.html) let our project
start with some initial data. This could be settings or preferences, test data, or really
anything. Our project will seed a number of examples into each of its tables so there is
something to look at, as well as some examples to work with. Seeders can be fully-namespaced
references, but [our initial seeder](app/Database/Seeds/PlaygroundSeeder.php) will be run
right out of [app/Database/Seeds/](app/Database/Seeds/). Use the command line tool to run
the seeder:

`./spark db:seed PlaygroundSeeder`
