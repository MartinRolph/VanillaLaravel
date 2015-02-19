<?php

namespace Oval\Laravel\Bootstrap\Helpers;

    /**
     * Functions helpful for performance analysis
     */
    class AnalysisHelper
    {
        /**
         * Place in 2 numbers and get the difference from them
         * 
         * An example usage would be:
         * 
         * $startTime = microtime( TRUE );
         * $endTime = microtime( TRUE );
         * $difference = AnalysisHelper::GetTimeDifference( $startTime, $endTime );
         * 
         * @param <float, int> $start
         * @param <float, int> $end
         * @return <float, int>
         * @author James Trusler
         */
        public static function GetTimeDifference( $start, $end )
        {
            $time = $end - $start;
            return $time;
        }
    }