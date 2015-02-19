<?php
namespace Simplarity;

class Plugin extends Pimple {
    
    public function run(){ 
        foreach( $this->values as $key => $content ){ // Loop on contents
            $content = $this[$key];
            
            if( is_object( $content ) ){
                $reflection = new \ReflectionClass( $content );
                if( $reflection->hasMethod( 'run' ) ){
                    $content->run(); // Call run method on object
                }
            }
        }
    }
}
