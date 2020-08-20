<?php 
    class UsserSession{
        
        public function closeSession(){
            session_unset();
            session_destroy();
        }
    }
?>