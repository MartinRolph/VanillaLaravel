<?php

namespace Oval\Laravel\Bootstrap\Core;

    /**
     * The core object was set up to prevent properties being added on the fly
     * 
     * This object should be extended by all custom classes, but especially view models.
     * 
     * @author James Trusler
     */
    class CoreObject
    {
        /**
         * When a property is added to a class that extends this object, it will throw an error if that
         * property was never defined.
         * 
         * @param <> $key
         * @param <> $value
         * @throws Exception
         */
        public function __set( $key, $value )
        {
            throw new Exception( "
                Thrown at Oval\Laravel\Objects\CoreObject.\r\n\r\n                

                The property you are trying to set does not exist on this object\r\n
                Key: $key\r\n
                Value: $value\r\n\r\n
                    
                Please define it on the inheriting object ie. the ViewModel?
            " );
        }
    }