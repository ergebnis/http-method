<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/http-method
 */

use Ergebnis\Rector;

$ruleSet = Rector\Config\RuleSet\Php81::create();

return Rector\Config\Factory::fromRuleSet($ruleSet)
    ->withCache(__DIR__ . '/.build/rector/')
    ->withPaths([
        __DIR__ . '/src/',
        __DIR__ . '/test/',
        __DIR__ . '/.php-cs-fixer.php',
        __DIR__ . '/rector.php',
    ]);
