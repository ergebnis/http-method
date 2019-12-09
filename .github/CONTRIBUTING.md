# CONTRIBUTING

We are using [GitHub Actions](https://github.com/features/actions) as a continuous integration system.

For details, see [`workflows/continuous-integration.yml`](workflows/continuous-integration.yml).

## Coding Standards

We are using [`friendsofphp/php-cs-fixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to enforce coding standards.

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

We are using [`phpstan/phpstan`](https://github.com/phpstan/phpstan) to statically analyze the code.

Run

```
$ make static-code-analysis
```

to run a static code analysis.

We are also using the [baseline feature](https://medium.com/@ondrejmirtes/phpstans-baseline-feature-lets-you-hold-new-code-to-a-higher-standard-e77d815a5dff) of [`phpstan/phpstan`](https://github.com/phpstan/phpstan).

Run

```
$ make static-code-analysis-baseline
```

to regenerate the baseline in [`../phpstan-baseline.neon`](../phpstan-baseline.neon).

:exclamation: Ideally, the baseline should shrink over time.

## Tests

We are using [`phpunit/phpunit`](https://github.com/sebastianbergmann/phpunit) to drive the development.

Run

```
$ make tests
```

to run all the tests.

## Extra lazy?

Run

```
$ make
```

to enforce coding standards, run a dependency analysis, run a static code analysis, and run tests!

## Help

:bulb: Run

```
$ make help
```

to display a list of available targets with corresponding descriptions.
