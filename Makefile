.PHONY: cs it stan test

it: cs stan test

cs: vendor
	mkdir -p .build/php-cs-fixer
	vendor/bin/php-cs-fixer fix --config=.php_cs --diff --verbose

stan: vendor
	mkdir -p .build/phpstan
	vendor/bin/phpstan analyse --configuration=phpstan.neon

test: vendor
	mkdir -p .build/phpunit
	vendor/bin/phpunit --configuration=test/Unit/phpunit.xml

vendor: composer.json composer.lock
	composer validate
	composer install
	composer normalize
