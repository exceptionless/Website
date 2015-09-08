<?php
if(!class_exists('Cyclone_Slider_Vimeo')):
    
    /**
    * Class for handling Vimeo slides
    */
    class Cyclone_Slider_Vimeo {
        
        /**
         * Get Vimeo ID
         * 
         * Return vimeo video id
         *
         * @param string $url URL of to parse
         *
         * @return int|false Vimeo ID on success and false on fail
         */
        public function get_vimeo_id($url){
            
            $parsed_url = parse_url($url);
            if ($parsed_url['host'] == 'vimeo.com'){
                $vimeo_id = ltrim( $parsed_url['path'], '/');
                if (is_numeric($vimeo_id)) {
                    return $vimeo_id;
                }
            }
            return false;
        }
    } // end class
    
endif;