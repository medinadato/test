<?php

namespace Mgrid\Column\Render;

use Mgrid\Column\Render;

/**
 * Description of YesOrNo
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class YesOrNo extends Render\ARender implements Render\IRender {

    /**
     *
     * @return string
     */
    public function render() {
        $row = $this->getRow();
        $index = $this->getColumn()->getIndex();
        
        $yes = $this->getView()->translate('Yes');
        $no = $this->getView()->translate('No');
        
        return ($row[$index] == 'Y') ? $yes : $no;
    }
}
