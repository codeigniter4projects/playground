# Playground
A space to learn and experience CodeIgniter 4

This playground is here to help you learn CodeIgniter 4 by example. We try to cover use cases for the most
common tasks you'll find yourself doing in web applications. Where there are multiple ways to do something,
we've tried to give examples of doing things in each way. 

This isn't meant to replace [the docs](https://codeigniter4.github.io/CodeIgniter4/index.html). This is just
something to look at to get a deeper understanding, or to better see how something could be done in practice. 

## Resources

There are two primary ways to learn about what's going on here in the Playground. The first is the code itself. 
We've heaped a LOT of comments throughout the code. They're your best docs. So explore them in depth. 
Additionally, there's a small collection of docs in the conveniently named [docs](docs) folder. 

To setup a working playground on your own local device, read through the next section.  

## Getting Started 

In order to get the playground setup on your own computer, you'll need a few minimum requirements - all of which
are listed on [CodeIgniter's repo](https://github.com/codeigniter4/CodeIgniter4#server-requirements). Basically,
as long as you are running PHP 7.2 or later you'll meet most of them. 

While CodeIgniter does not require it, using this repo also requires the use of 
[Composer](https://getcomposer.org/) to install CodeIgniter as a dependency, and PHPUnit - the test framework. 
You don't need that installed globally, and we actually recommend against it, since different projects likely
require different versions of PHPUnit installed as time goes on and it can become tricky maintain a local 
environment that works with all of the different versions. 

While it can be downloaded as a zip and extracted, we'll use [git](https://git-scm.com/) to manage things.

With those out of the way, it only takes a few small steps to get the project up and running locally. 

1 - Clone the repo if you haven't already, from the CLI:

	git clone https://github.com/codeigniter4projects/playground

That creates a new directory, `playground`, under your current directory.

2 - Enter the new directory and install the project dependencies with Composer. NOTE: The command shown
here assumes that you have Composer loaded globally. If you don't, then pretend we're using `composer.phar`.
```
cd playground
composer install
```

3 - Copy `.env.example` in the project directory and name it `.env`. Then open it up and verify the settings:

* First, `CI_ENVIRONMENT` is set to `development` as this enables error handling, the debug toolbar, and some other
	things handy while in development. 

* Next make sure that `app.baseURL` matches whatever you are currently running your site at. If you use `spark`, 
	then it already matches the default. If this doesn't match, then generated links might not work, and your 
	developer toolbar will never show up. 

* Finally while you're in there, you can edit your database settings, though you can do that in `app/Config/Database.php`
	just as easily. Since we won't deploy this to multiple servers it's no big deal to edit the config files directly.

4 - Back on the command line, we install all of the needed database tables and sample data. 
```
php spark migrate
php spark db:seed PlaygroundSeeder
```

5 - That's it! If you're hosting through Apache, Nginx, etc, then head to your site. If you just want a quick
way to work with your site locally, go back to the CLI and start up `spark`, CodeIgniter's small server. 

	php spark serve

If you get would like to change the port it's running on, that's no problem: 

	php spark serve --port 8081

Enjoy! 

