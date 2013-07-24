<?php

namespace Mgrid\Export;

use Mgrid;

/**
 * @category   Core
 * @package    Core_Grid_Export
 * @copyright  Móveis Simonetti (http://www.moveissimonetti.com.br)
 * @author Renato Medina <medinadato@gmail.com>
 */
interface IExport
{
    /**
     * Performs the render for one specified file
     * @param Grid $grid 
     * @param string $title 
     */
    public static function render(Grid $grid, $title = '');
}
