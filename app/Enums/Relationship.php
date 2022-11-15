<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Relationship extends Enum
{
    const FRIEND = "friend";
    const MOTHER = "mother";
    const FATHER = "father";
    const SISTER = "sister";
    const BROTHER = "brother";
    const GRAND_FATHER = "grand_father";
    const GRAND_MOTHER = "grand_mother";
    const UNCLE = "uncle";
    const AUNT = "aunt";
    const NEPHEW = "nephew";
    const NIECE = "niece";
    const OTHER = "other";
}
