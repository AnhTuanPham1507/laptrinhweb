<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PropertyType extends Enum
{
    const SUPER_VIP = "super_vip";
    const VIP = "vip";
    const STANDARD = "standard";    
    const ECONOMY = "economy";
}
