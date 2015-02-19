<?php

namespace Oval\Laravel\Bootstrap\Helpers;

    /**
     * Model helper functions that assist with any model standards or operations
     */
    class ModelHelper
    {
        /**
         * This function simply sets a standard for what should be returned from controllers and placed into views.
         * 
         * It standardizes the view model to be accessed with $Model.
         * 
         * @param <> $model I suggest passing in a ViewModel class but the function does not restrict different usages
         * @return <>[] Returns an array with the "Model" key so that all views access $Model
         * @author James Trusler
         */
        public static function Prepare( $model )
        {
            return array( "Model" => $model );
        }
    }