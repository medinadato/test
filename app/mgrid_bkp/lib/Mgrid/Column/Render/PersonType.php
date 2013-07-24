<?php

namespace Mgrid\Column\Render;

use Mgrid\Column\Render;

/**
 * Description of YesOrNo
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class PersonType extends Render\ARender implements Render\IRender {

    /**
     *
     * @return string
     */
    public function render() {
        $row = $this->getRow();
        $index = $this->getColumn()->getIndex();
        
        $types = array(
            1 => 'Representante',
            2 => 'Cliente',
        );
        
        return $types[$row[$index]];
    }
}
