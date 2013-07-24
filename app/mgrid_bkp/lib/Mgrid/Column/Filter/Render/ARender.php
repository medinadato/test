<?php

namespace Mgrid\Column\Filter\Render;

/**
 * Description of Text
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
abstract class ARender 
{
    /**
     * Define se um campo deve ter um ranger ou nao
     * @var string
     */
    protected $range = false;
    /**
     * Filter that uses the render
     * @var Mgrid\Column\Filter
     */
    protected $filter = null;
    /**
     * Index da coluna da grid
     * @var type 
     */
    protected $fieldIndex;
    /**
     * Atributos do elemento
     */
    protected $attributes;
    /**
     * Condicoes da busca padrao para opções match e range 
     * @var array  match: fulltext, = | range: <>, >, <, >=, <= 
     */
    protected $condition = array('match' => array('='), 'range' => array('from' => '>=', 'to' => '<='));

    /**
     * constructor may set options
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $this->setOptions($options);
	return $this;
    }
    
    /**
     * Set grid state from options array
     *
     * @param  array $options
     * @return Grid
     */
    public function setOptions(array $options)
    {
	foreach ($options as $key => $value) {
	    $method = 'set' . ucfirst($key);
	    //forbiden options
	    if (in_array($method, array()))
		if (!is_object($value))
		    continue;

	    if (method_exists($this, $method))
                // Setter exists; use it
		$this->$method($value);
	    else
		throw new \Mgrid\Exception("Unknown option {$method}");
	}
	return $this;
    }
        
    /**
     * sets filter that uses the render
     * @param Mgrid\Column\Filter $filter
     * @return ARender 
     */
    public function setFilter(\Mgrid\Column\Filter $filter)
    {
	$this->filter = $filter;
	return $this;
    }
    
    public function getFieldIndex()
    {
        // pego coluna 
        $column = $this->getFilter()->getColumn();
        
        //seto o nome do campo
        return $column->getIndex();
    }
    
    public function getFilter()
    {
        return $this->filter;
    }

    public function getRange()
    {
        return $this->range;
    }

    public function setRange($range)
    {
        $this->range = $range;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }
    
    public function setAttributeValue($name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function setAttributes($attributes)
    {
        //valores padroes para o Render
        $attributes['class']        = !isset($attributes['class']) ? 'fieldGrid' : $attributes['class'] . ' fieldGrid';
        $attributes['belongsTo']    = 'grid[filter]';
        $attributes['decorators']   = array('ViewHelper');
        
        $this->attributes = $attributes;
    }
    
    public function getCondition()
    {
        return $this->condition;
    }

    public function setCondition($condition)
    {
        $this->condition = $condition;
    }

}