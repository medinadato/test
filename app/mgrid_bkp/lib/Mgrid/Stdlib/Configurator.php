<?php

namespace Mgrid\Stdlib;

/**
 * Mgrid
 *
 *
 * @category   Mgrid
 * @package    Mgrid\Stdlib
 * @copyright  Copyright (c) 2003-2013 MDN Solutions. (http://www.mdnsolutions.com)
 * @license    http://mgrid.mdnsolutions.com/license
 */
abstract class Configurator
{
    /**
     * Configure a target object with the provided options
     *
     * The options passed in must be traversable with option names for keys.
     * Option names are case insensitive and are stripped of underscores. By
     * convention, option names are in lowercase and with underscores separated
     * words.
     *
     * The target object is expected to have a setter method for each option
     * passed. By convention, setters are named using 'set' prefix. Only public
     * and non-static methods are called, everything else is ignored.
     *
     * Example: option_name -> setOptionName()
     *
     * Optionally target may implement \Mgrid\Stdlib\Configurable. Once it
     * happens, configurator interprets getOptionNames()'s return. This method
     * returns option names for the target. Only specified options in the return
     * are configured, everything else is ignored.
     *
     * Example: array('max_length', 'timeout') -> setMaxLength() and setTimeout()
     *
     * Configurable implementation can change setter method. Optionally keys
     * from option names provide non-standard setter method names.
     *
     * Example: array('setMaxLen' => 'max_length') -> setMaxLen() instead of setMaxlength()
     *
     * @param  object       $object  The object that needs to be configured
     * @param  \Traversable $options The configuration to apply
     * @throws \InvalidArgumentException
     * @return void
     */
    public static function configure($object, $options)
    {
        // check arguments
        if (!is_object($object)) {
            throw new \InvalidArgumentException(
                'Target should be an object');
        }
        if (!$options instanceof \Traversable && !is_array($options)) {
            throw new \InvalidArgumentException(
                'Options should implement Traversable');
        }

        $normalize = function ($name) {
            return strtolower(str_replace('_', '', $name));
        };

        // normalize option names
        foreach (array_keys($options) as $key) {
            $options[$normalize($key)] = array_shift($options);
        }
        if ($object instanceof \Mgrid\Stdlib\Configurable) {
            $names = (array) $object->getOptionNames();
            array_walk($names, $normalize);
        } else {
            $names = array_keys($options);
        }

        // retrieve available methods
        $methods = array_map('strtolower', get_class_methods($object));

        foreach ($names as $setter => $name) {
            if (isset($options[$name])) {
                // define setter
                if (!is_string($setter)) {
                    $setter = "set$name";
                    if (!in_array($setter, $methods)) {
                        $setter = null;
                    }
                }

                // trigger setter
                if ($setter) {
                    $object->$setter($options[$name]);
                }
            }
        }
	
	return $object;
    }
}