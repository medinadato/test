<?php

namespace Mgrid\Column\Render;

use Mgrid\Column\Render;

/**
 * Description of UnavailableOrAvailable
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class ActiveOrInactive extends Render\ARender implements Render\IRender {

    /**
     *
     * @return string
     */
    public function render() {
        $row = $this->getRow();
        $index = $this->getColumn()->getIndex();

        $inactive = $this->getView()->translate('Inactive');
        $active = $this->getView()->translate('Active');

        return ($row[$index] == 'Y') ? $active : $inactive;
    }

}