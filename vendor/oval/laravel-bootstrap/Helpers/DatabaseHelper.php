<?php

namespace Oval\Laravel\Bootstrap\Helpers;

    /**
     * Database helper functions
     */
    class DatabaseHelper
    {
        /**
         * This is specifically for Eloquent, it will return the latest database query that was made by Eloquent
         * @return string
         * @author James Trusler
         */
        public static function GetLastQuery() {
            $queries = DB::getQueryLog();
            $sql = end($queries);

            if( ! empty($sql['bindings']))
            {
                $pdo = DB::getPdo();

                foreach($sql['bindings'] as $binding)
                {
                    $sql['query'] =
                      preg_replace('/\?/', $pdo->quote($binding),
                        $sql['query'], 1);
                }
            }

            return $sql['query'];
        }
    }