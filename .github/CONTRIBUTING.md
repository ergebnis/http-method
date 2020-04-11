# CONTRIBUTING

We are using [GitHub Actions](https://github.com/features/actions) as a continuous integration system.

For details, take a look at the following workflow configuration files:

- [`workflows/integrate.yaml`](workflows/integrate.yaml)
- [`workflows/prune.yaml`](workflows/prune.yaml)
- [`workflows/release.yaml`](workflows/release.yaml)
- [`workflows/renew.yaml`](workflows/renew.yaml)

## Coding Standards

We are using [`yamllint`](https://github.com/adrienverge/yamllint) to enforce coding standards in YAML files.

If you do not have `yamllint` installed yet, run

```
$ brew install yamllint
```

to install `yamllint`.

We are using [`friendsofphp/php-cs-fixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to enforce coding standards in PHP files.

Run

```
$ make coding-standards
```

to automatically fix coding standard violations.

## Dependency Analysis

We are using [`maglnet/composer-require-checker`](https://github.com/maglnet/ComposerRequireChecker) to prevent the use of unknown symbols in production code.

Run

```
$ make dependency-analysis
```

to run a dependency analysis.

## Static Code Analysis

We are using [`phpstan/phpstan`](https://github.com/phpstan/phpstan) and [`vimeo/psalm`](https://github.com/vimeo/psalm) to statically analyze the code.

Run

```
$ make static-code-analysis
```

to run a static code analysis.

We are also using the baseline features of [`phpstan/phpstan`](https://medium.com/@ondrejmirtes/phpstans-baseline-feature-lets-you-hold-new-code-to-a-higher-standard-e77d815a5dff) and [`vimeo/psalm`](https://psalm.dev/docs/running_psalm/dealing_with_code_issues/#using-a-baseline-file).

Run

```
$ make static-code-analysis-baseline
```

to regenerate the baselines in [`../phpstan-baseline.neon`](../phpstan-baseline.neon) and [`../psalm-baseline.xml`](../psalm-baseline.xml).

:exclamation: Ideally, the baselines should shrink over time.

## Tests

We are using [`phpunit/phpunit`](https://github.com/sebastianbergmann/phpunit) to drive the development.

Run

```
$ make tests
```

to run all the tests.

## Mutation Tests

We are using [`infection/infection`](https://github.com/infection/infection) to ensure a minimum quality of the tests.

Enable `pcov` or `Xdebug` and run

```
$ make mutation-tests
```

to run mutation tests.

## Extra lazy?

Run

```
$ make
```

to enforce coding standards, run a static code analysis, and run tests!

## Help

:bulb: Run

```
$ make help
```

to display a list of available targets with corresponding descriptions.
