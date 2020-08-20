<?php
        include_once 'user_session.php';

        $userlog= new UsserSession();
        $userlog->closeSession();
        header("location: index.php")

?>