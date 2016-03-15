<?php
/*
 * This file is part of the Badminton AppBundle (https://github.com/C3-TKO/Badminton).
 *
 * (c) Thomas Kolar <thomas.kolar@email.de>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

if (isset($_ENV['BOOTSTRAP_CLEAR_CACHE_ENV'])) {
    passthru(sprintf(
        'php "%s/console" cache:clear --env=%s --no-warmup',
        __DIR__,
        $_ENV['BOOTSTRAP_CLEAR_CACHE_ENV']
    ));
}

require __DIR__ . '/autoload.php';