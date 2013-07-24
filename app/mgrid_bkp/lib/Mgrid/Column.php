<?php

namespace Mgrid;

/**
 * Description of Column
 *
 * @author Renato Medina <medinadato@gmail.com>
 */
class Column
{

    /**
     * label of column
     * @var string
     */
    protected $label = null;
    /**
     * if the column will show filter
     * @var bool
     */
    protected $hasFilter = false;
    /**
     * if the column should order results
     * @var boolean 
     */
    protected $hasOrdering = null;
    /**
     * main datasource index used by column
     * @var string
     */
    protected $index;
    /**
     * width of the column
     * @var string
     */
    protected $width = null;
    /**
     * render used by column
     * @var array
     */
    protected $render = null;
    /**
     * filter used by column
     * @var \Mgrid\Column\Filter
     */
    protected $filter = null;
    /**
     * order's direction
     * @var type 
     */
    protected $dirOrder = 'ASC';
    /**
     * Class default of the column
     * @var type 
     */
    protected $class = 'sort';
    
    /**
     * Align the values of the field: L-Left | C-Center | R-Right
     * @var string 
     */
    protected $align = 'L';
    
    /**
     * Defines whether the column has total
     * @var boolean 
     */
    protected $hasTotal = false;
    
    /**
     * Defines whether the column should appear at the report
     * @var type 
     */
    protected $isReportColumn = true;

    /**
     * contructor of the grid
     * @param array $options
     * @return Column 
     */
    public function __construct(array $options = array())
    {
	$this->setOptions($options);
	return $this;
    }

    /**
     * Set column state from options array
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
		throw new Grid\Exception("Unknown option {$method}");
	}
	return $this;
    }

    /**
     * sets or returns if the column uses ordering
     * @param bool $value
     * @return Column|bool 
     */
    public function hasOrdering()
    {
	return $this->getHasOrdering();
    }

    /**
     * Set the render
     *
     * $render may be either an array column options, or an object of type
     * Mgrid\Column\Render. 
     *
     * @param  array|Mgrid\Column\Render\ARender $render
     * @throws \Exception on invalid element
     * @return Grid
     */
    public function setRender($render)
    {
	if (is_array($render)) {
	    if (isset($render['type'])) {
		$type = ucfirst($render['type']);
		$className = "\Mgrid\Column\Render\\{$type}";
		$options = isset($render['options']) ? $render['options'] : array();
		$render = new $className($options);
	    } else {
		throw new \Exception("Renders specified by array must have a 'type' index");
	    }
	} elseif (is_object($render) && $render instanceof Mgrid\Column\Render\IRender) {
	    $render = $render;
	} elseif (is_string($render)) {
	    $render = ucfirst($render);
	    $className = "\Mgrid\Column\Render\\{$render}";
	    $render = new $className;
	} else {
	    throw new \Exception('Invalid render');
	}

	$render->setColumn($this);
	$this->render = $render;
	return $this;
    }

    /**
     * Gets de label
     * @return string
     */
    public function getLabel()
    {
	return (string) $this->label;
    }

    /**
     * Sets the label
     * @param string $label
     * @return Column 
     */
    public function setLabel($label)
    {
	$this->label = (string) $label;
	return $this;
    }

    /**
     *
     * @param string|Mgrid\Column\Filter $filter
     * @param array $options
     * @return Column 
     */
    public function setFilter(array $options = array())
    {
	$this->setHasFilter(true);
	$filter = new Column\Filter($options);
        $filter->setColumn($this);
	$this->filter = $filter;
        
	return $this;
    }

    /**
     * Returns the filter used by column
     * @return Mgrid\Column\Filter
     */
    public function getFilter()
    {
	return $this->filter;
    }

    /**
     * Gets if the column uses filter
     * @return bool
     */
    public function getHasFilter()
    {
	return $this->hasFilter;
    }

    /**
     * just an alias for $this->getHasFilter()
     * @return bool
     */
    public function hasFilter()
    {
	return $this->getHasFilter();
    }

    /**
     * Set if the column uses filter
     * @return Column
     */
    public function setHasFilter($hasFilter)
    {
	$this->hasFilter = (bool) $hasFilter;
	return $this;
    }

    /**
     * Gets if the column uses ordering
     * @return bool
     */
    public function getHasOrdering()
    {
	return $this->hasOrdering;
    }

    /**
     * Sets if the grid uses ordering
     * @return Column
     */
    public function setHasOrdering($hasOrdering)
    {
	$this->hasOrdering = (bool) $hasOrdering;
	return $this;
    }
    
    public function getOrdering()
    {
        return $this;
    }
    
    public function getDirOrder()
    {
        return $this->dirOrder;
    }

    public function setDirOrder($dirOrder)
    {
        $this->class .= ($dirOrder == 'ASC') ? ' sortArrowAsc' : ' sortArrowDesc';
        $this->dirOrder = $dirOrder;
    }
    
    public function getHref()
    {
        $params = \Zend_Controller_Front::getInstance()->getRequest()->getParams();
        return '/' . $params['module'] . '/' . $params['controller'] . '/' . $params['action'] . '?' . 'grid[colOrder]=' . $this->getIndex() . '&grid[dirOrder]=' . $this->getDirOrder();
    }
    
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Gets the main data index used by column
     * @return string
     */
    public function getIndex()
    {
	return $this->index;
    }

    /**
     * Sets the index used by column
     * @param string $index
     * @return Column 
     */
    public function setIndex($index)
    {
	$this->index = (string) $index;
	return $this;
    }

    /**
     * Gets the width
     * @return string
     */
    public function getWidth()
    {
	return $this->width;
    }

    /**
     * Sets the width
     * @param string $width
     * @return Column 
     */
    public function setWidth($width)
    {
	$this->width = $width;
	return $this;
    }

    /**
     * returns the render used by column setting the row to by parset by render
     * @param array $row row from recordset to be parsed my render
     */
    public function getRender(array $row)
    {
	if (null === $this->render) {
	    $render = new Column\Render\Text;
	    $render->setColumn($this);
	} else {
	    $render = $this->render;
	}

	$render->setRow($row);
	return $render;
    }

    /**
     * Returns the align value
     * @param boolean $abbreviated
     * @return string 
     */
    public function getAlign($abbreviated = true)
    {
        if(!$abbreviated) {
            switch($this->align) {
                case 'L':
                    return 'left';
                    break;
                case 'C':
                    return 'center';
                    break;
                case 'R':
                    return 'right';
                    break;
                default:
                    return '';
                    break;
            }
        }
        return $this->align;
    }

    /**
     *
     * @param string $align
     * @return Mgrid\Column 
     */
    public function setAlign($align)
    {
        $this->align = $align;
        return $this;
    }
    
    public function getHasTotal()
    {
        return $this->hasTotal;
    }

    /**
     *
     * @param boolean $hasTotal
     * @return Mgrid\Column 
     */
    public function setHasTotal($hasTotal)
    {
        $this->hasTotal = (boolean) $hasTotal;
        return $this;
    }

    public function getIsReportColumn()
    {
        return $this->isReportColumn;
    }

    /**
     *
     * @param boolean $isReportColumn
     * @return Mgrid\Column 
     */
    public function setIsReportColumn($isReportColumn)
    {
        $this->isReportColumn = (boolean) $isReportColumn;
        return $this;
    }

}
