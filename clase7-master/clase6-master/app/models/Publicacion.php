<?php

class Publicacion extends Eloquent{
    protected $table ='publicacion';
    
    public function freshTimestamp() {
        //return date('Y-m-d h:i:s');
        return time();
    }
}
