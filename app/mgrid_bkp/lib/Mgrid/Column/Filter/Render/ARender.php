<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://mgrid.mdnsolutions.com/license>.
 */

namespace Mgrid\Column\Filter\Render;

/**
 * Number filter type
 *
 * @since       0.0.1
 * @author      Renato Medina <medinadato@gmail.com>
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

    /**
     * 
     * @param type $attributes
     */
    public function setAttributes($attributes)
    {
        //valores padroes para o Render
        $attributes['class']        = !isset($attributes['class']) ? 'fieldGrid' : $attributes['class'] . ' fieldGrid';
        $attributes['belongsTo']    = 'grid[filter]';
        $attributes['decorators']   = array('ViewHelper');
        
        $this->attributes = $attributes;
    }
    
    /**
     * 
     * @param string $html
     * @param array $attributes
     * @return string
     */
    protected function generateHtmlOfAttributes($html = '', array $attributes = array())
    {
        foreach($attributes as $name => $value) {
            if(is_array($value)) {
                $value = implode(' ', $value);
            }
            
            $html .= ' ' . $name . '="' . $value . '" ';
        }
        
        return $html;
    }
    
    /**
     * 
     * @return type
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * 
     * @param type $condition
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
    }

}