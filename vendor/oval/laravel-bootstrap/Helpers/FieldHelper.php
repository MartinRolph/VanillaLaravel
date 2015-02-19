<?php

namespace Oval\Laravel\Bootstrap\Helpers;

    /** Form field helper functions */
    class FormFieldHelper
    {
        /**
         * If $a and $b are the same, it will return 'selected="selected"'. If they are not, it returns an empty string.
         * 
         * @param <> $a
         * @param <> $b
         * 
         * @return string
         * @author James Trusler
         */
        public static function DropdownSelected( $a, $b )
        {
            $htmlString = 'selected="selected"';

            if( $a == $b )
                return $htmlString;

            return "";
        }

        /**
         * If $a and $b are the same, it will return 'checked="checked"'. If they are not, it returns an empty string.
         * 
         * @param <> $a
         * @param <> $b
         * 
         * @return string
         * @author James Trusler
         */
        public static function CheckboxSelected( $a, $b )
        {
            $htmlString = 'checked="checked"';

            if( $a == $b )
                return $htmlString;

            return "";        
        }
    }
