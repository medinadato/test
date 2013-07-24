<?php

namespace Mgrid\Column\Filter\Render;

use Mgrid\Column\Filter\Render;

/**
 * Description of Text
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class Select extends Render\ARender implements Render\IRender {

    /**
     *
     * @return string
     */
    public function render()
    {
        //adiciono primeira opcao como tudo
        $attributes = $this->getAttributes();
        $attributes['multiOptions'] = array('firstOpt' => ' -- ' . $this->view->translate('All') . ' -- ', 'options' => $attributes['multiOptions']);
        
        return new \Core_Form_Element_Select($this->getFieldIndex(), 
                $attributes
        );
    }
    
    public function getConditions() {
        return array();
    }

}