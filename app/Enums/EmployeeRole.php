<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class EmployeeRole extends Enum
{
    const SECURITY = "security";
    const LABOR = "labor";
    const MAINTENANCE_STAFF = "maintenance_staff";
    const OTHER = "other";
}
