<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class FeeStatus extends Enum
{
    const PAID = "paid";
    const UNPAID = "unpaid";
    const OWED = "owed";
    const OTHER = "other";
}
