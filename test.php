<?php

    function execHash($providerid, $name, $des, $date)
    {
        return hash('sha256', $providerid . $name . $des . $date);
    }

    echo execHash(1,'asdasd','wfwef',date("Y-m-d H:i:s"));
?>