<?php

namespace Mgrid\Column\Render;

use Mgrid\Column\Render;

/**
 * Description of Money
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class Money extends Render\ARender implements Render\IRender
{
    /**
     *
     * @return string
     */
    public function render()
    {
        $currency = new \Zend_Currency();
        
	$row = $this->getRow();
	$index = $this->getColumn()->getIndex();
	return $currency->toCurrency($row[$index]);
    }

}