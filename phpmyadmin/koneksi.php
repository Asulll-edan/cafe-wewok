<?php
    $db = mysqli_connect("localhost",
                            "root",
                            "",
                            "cafe");

                            if($db->connect_error){
                                echo 'gak konek';
                            }

?>