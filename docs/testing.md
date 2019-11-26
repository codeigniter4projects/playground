# Testing

An introduction to Unit Testing with CodeIgniter 4.

## Resources

* [User Guide - Getting Started](https://codeigniter4.github.io/CodeIgniter4/testing/overview.html)
* [PHPUnit](https://phpunit.readthedocs.io/)
* [Assertions Reference](https://phpunit.readthedocs.io/en/latest/assertions.html)
* [ProjectTests](https://github.com/codeigniter4projects/project-tests)

## Unit Testing

If you are unfamiliar with unit testing, start with some of the resources listed above.
Unit testing allows us to break our code down into testable chunks and try to come up with
all the scenarios where it should succeed, fail, or otherwise perform a certain way. Testing
helps make sure we find our bugs and issues before production users, and gives other developers
a chance to see examples of our project in use.

### PHPUnit, CodeIgniter 4, and ProjectTests

CodeIgniter 4 comes with unit tests ready to be run using the popular unit testing tool,
PHPUnit. But since these tests are designed to validate the *framework*, developers will
want to replace them with their own suite of tests for each project. That's where
**ProjectTests** comes in (go read the docs): a scaffold pre-configured for running tests
against a project built in CodeIgniter 4.

## Running

Example tests come as part of the playground in the **tests** directory. To run these,
make sure all the dependencies are installed then type from the root of the project type:

> composer test
