<?php

namespace Oval\Laravel\Bootstrap\Helpers;

    use Illuminate\Support\Facades\Session;

    /**
     * Session helper functions
     */
    class SessionHelper
    {
        private static $errorMessageKey = "SessionHelperErrorMessages";
        
        public static function SetErrorMessageKey( $newKey )
        {
            self::$errorMessageKey = $newKey;
        }
        
        public static function GetErrorMessageKey()
        {
            return self::$errorMessageKey;
        }        
        
        /**
         * You can use this like so:
         * 
         * SessionHelper::SetFlashError( array( 
         *     new Error( new KeyValuePair( "Action", "Your password has successfully been changed" ), Error::SUCCESS )
         * ) );
         * 
         * and retrieve them from the view like this
         * 
         * <?php if( SessionHelper::CheckForFlashError() ) { ?>
         *     <?php foreach( SessionHelper::GetFlashError() as $message ) {
         *         ?><li class="remove-li-styling alert alert-<?=( $message->Type == Error::FAIL ) ? "danger" : "success"?>"><?=$message->Message->Key?>: <?=$message->Message->Value?></li><?php
         *     } ?>
         * <?php } ?>
         * 
         * This can just be included on the view though using the Shared/_ValidationMessages.blade.php file
         * 
         * @param array<Error> $messages It should look something like this:
         * array( new \Error( new \KeyValuePair( "Type of message, eg. Error or Action", "Message to display" ), \Error::FAIL ) )
         */
        public static function SetFlashError( $messages )
        {
            Session::flash( self::$errorMessageKey, serialize( $messages ) );
        }

        public static function CheckForFlashError()
        {
            return Session::has( self::$errorMessageKey );
        }

        public static function GetFlashError()
        {
            return unserialize( Session::get( self::$errorMessageKey ) );
        }
    }