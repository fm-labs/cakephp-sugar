<?php
declare(strict_types=1);

namespace Sugar;

use Cake\Core\BasePlugin;

/**
 * Plugin for Sugar
 */
class Plugin extends BasePlugin
{
    /**
     * @var bool
     */
    public bool $routesEnabled = false;

    /**
     * @var bool
     */
    public bool $bootstrapEnabled = false;
}
