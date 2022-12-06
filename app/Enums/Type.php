<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Type extends Enum
{
    const super_vip = "super_vip";
    const vip = "vip";
    const standard = "standard";
    const economy = "economy";
}
