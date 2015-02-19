<?php

namespace Oval\Laravel\Bootstrap\Helpers;

    /**
     * Date Helper functions
     */
    class DateHelper
    {    
        /**
         * Pass in a UK date and the seperator that has been used in your string, and you'll get back a MYSQL compatible date
         * 
         * @param string $date
         * @param string $seperator
         * @return string
         * @author James Trusler
         */
        static function FormatUKDateToMySQLDate( $date, $seperator = "/" )
        {
            if( empty( $date ) )
                return NULL;

            try
            {
                $date = trim($date);
                $dataArray = explode( $seperator, $date );
                $newTime = mktime( 0, 0, 0, $dataArray[ 1 ], $dataArray[ 0 ], $dataArray[ 2 ] );
                return date( "Y-m-d", $newTime ); 
            }
            catch( Exception $e )
            {
                return $date;
            }
        }

        /**
         * Pass in a MySQL date and the seperator that you would like the UK date to be returned with and you'll get back your formatted UK date
         * 
         * @param string $date
         * @param string $seperator
         * @return string
         * @author James Trusler
         */
        static function FormatMySQLDateToUK( $date, $seperator = "/" )
        {
            if( empty( $date ) )
                return NULL;

            try
            {
                $time = strtotime( $date );
                return date( "d{$seperator}m{$seperator}Y", $time );
            }
            catch( Exception $e )
            {
                return $date;
            }
        }

        /**
         * Pass in a MySQL datetime and the seperator that you would like the UK date to be returned with and you'll get back your formatted UK datetime
         * 
         * @param string $dateTime
         * @param string $seperator
         * @return string
         * @author James Trusler
         */
        static function FormatMySQLDateToUKwithTime( $dateTime, $seperator = "/" )
        {
            if( empty( $dateTime ) )
                return NULL;

            try
            {
                $time = strtotime( $dateTime );
                return date( "d{$seperator}m{$seperator}Y H:i", $time );
            }
            catch( Exception $e )
            {
                return $dateTime;
            }
        }
    }