<?php

namespace Oval\Laravel\Bootstrap\Helpers;

    /**
     * Functions that are helpful for file operations
     */
    class FileHelper
    {
        /**
         * Pass in a mime type and get back the extension.
         * 
         * @param string $mime_type Mime type can be passed in like "image/jpeg" and it will return "jpg"
         * @return string
         * @author James Trusler
         */
        public static function GetExtensionFromMimeType ( $mimeType ){

            $extensions = array( 
                'image/jpeg' => 'jpeg',
                'image/jpg' => 'jpg',
                'image/x-png' => 'png',
                'image/png' => 'png',
                'image/bmp' => 'bmp',
                'image/gif' => 'gif',
                'text/xml' => 'xml'
            );

            return $extensions[ $mimeType ];
        }
    }