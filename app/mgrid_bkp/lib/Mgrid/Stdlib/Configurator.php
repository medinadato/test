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

namespace Mgrid\Stdlib;

/**
 * Abstract class for Configurator
 *
 * @since       0.0.1
 * @author      Renato Medina <medinadato@gmail.com>
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