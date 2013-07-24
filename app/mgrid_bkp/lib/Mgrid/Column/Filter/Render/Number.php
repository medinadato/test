<?php

namespace Mgrid\Column\Filter\Render;

use Mgrid\Column\Filter\Render;

/**
 * Description of Text
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class Number extends Render\ARender implements Render\IRender {

    public $renderChild = false;
    
    /**
     *
     * @return type 
     */
    public function getChilds()
    {
        return array('from' => $this->view->translate('Between'), 'to' => $this->view->translate('and'));
    }

    /**
     * Retuns current conditions
     *
     * @return array
     */
    public function getConditions()
    {
        return array(
            'match' => array('='),
            'range' => array('from' => '>=', 'to' => '<='),
        );
    }

    /**
     *
     * @return string
     */
    public function render()
    {
        //adiciono primeira opcao como tudo
        $attributes = $this->getAttributes();

        //atributos customizados
        $attributes['alt'] = 'numero';

        //modo range
        if ($this->getRange()) {

            $field = '';
            $belongTo = $attributes['belongsTo'];

            //loop for childs
            foreach ($this->getChilds() as $key => $child) {
                $this->renderChild = $key;
                $attributes['size'] = isset($attributes['size']) ? $attributes['size'] : 5;
                $attributes['belongsTo'] = "{$belongTo}[{$key}]";
                
                // checo valor padrao
                $attributes['value'] = isset($attributes["value[{$key}]"]) ?  $attributes["value[{$key}]"] : null;
                

                $field .= "
                <span>{$child}: </span>
                " . new \Zend_Form_Element_Text($this->getFieldIndex(),
                                $attributes
                );
            }
        } else {
            // campo unico
            $attributes['size'] = isset($attributes['size']) ? $attributes['size'] : 10;

            $field = new \Zend_Form_Element_Text($this->getFieldIndex(),
                            $attributes
            );
        }

        return $field;
    }

}