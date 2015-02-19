<?php

namespace Oval\Laravel\Bootstrap\Helpers;

    /**
     * General helper functions
     */
    class GeneralHelper
    {
        /**
         * Takes an array and places <pre> tags around it for easy reading. If you would like the code to exit, place TRUE into the boolean
         * 
         * @param type $array Pass in the array you want to take a look at
         * @param type $exit Do you want the function to throw an exit after? If so pass TRUE into here
         * @author James Trusler
         */
        public static /** void */ function PrintExt( /** [] */ $array, /** bool */ $exit = FALSE )
        {
            echo "<pre>";
                print_r( $array );
            echo "</pre>";

            if( $exit )
                exit;
        }

        /**
         * This was created to assist with decoding RTE fields after they came out of the database
         * 
         * param string $string Pass in the RTE string
         * @return string This will either return an empty string or the decoded string
         * @author James Trusler
         */
        public static /** string */ function DecodeHTMLEntities( $string )
        {
            if( $string )
                return htmlspecialchars_decode( $string );
            return "";
        }
    }