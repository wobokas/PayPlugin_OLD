<?php

/**
 * This file was created by the developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on kontakt@bitbag.pl.
 */

namespace BitBag\PayUPlugin\Exception;

use Payum\Core\Exception\Http\HttpException;

/**
 * @author Mikołaj Król <mikolaj.krol@bitbag.pl>
 */
final class PayUException extends HttpException
{
    const LABEL = 'PayUException';

    public static function newInstance($status)
    {
        $parts = [self::LABEL];

        if (property_exists($status, 'statusLiteral')) {
            $parts[] = '[reason literal] ' . $status->statusLiteral;
        }

        if (property_exists($status, 'statusCode')) {
            $parts[] = '[status code] ' . $status->statusCode;
        }

        if (property_exists($status, 'statusDesc')) {
            $parts[] = '[reason phrase] ' . $status->statusDesc;
        }

        $message = implode(PHP_EOL, $parts);

        return new static($message);
    }
}
