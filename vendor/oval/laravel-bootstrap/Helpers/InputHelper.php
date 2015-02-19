<?php

namespace Oval\Laravel\Bootstrap\Helpers;

    /**
     * Form data helper functions
     */
    class FormDataHelper
    {
        /**
         * Post data from checkboxes comes through as "on" string if on... this converts that to boolean
         * 
         * @param <> $val
         * @return boolean
         * @author James Trusler
         */
        public static function ReturnCheckboxValueAsBoolean( $val )
        {
            if( $val == "on" )
            {
                return TRUE;
            }
            return FALSE;
        }
    }