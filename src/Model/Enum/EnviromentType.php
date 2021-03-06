<?php

namespace PabloVeintimilla\FacturaEC\Model\Enum;

use Elao\Enum\Enum;
use Elao\Enum\AutoDiscoveredValuesTrait;

/**
 * Enviromente type. (Tipo de ambiente: Desarrollo o produccion depende
 * de en cual ambiente se genere el comprobante).
 *
 * @author Pablo Veintimilla Vargas <pabloveintimilla@gmail.com>
 */
final class EnviromentType extends Enum
{
    use AutoDiscoveredValuesTrait;
    /**
     * Producción.
     * 
     * @var string
     */
    const PRODUCTION = '1';
    /**
     * Desarrollo.
     * 
     * @var string
     */
    const DEVELOPING = '2';
}
