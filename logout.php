<?php
        include_once 'PlantillaAdmin/user_session.php';

        $userlog= new UsserSession();
        $userlog->closeSession();
        header("location: index.php")

?>