<?php
if (isset($_FILES["file"]))
{
    $nombre_img =  $_FILES['imagen']['name'];

    $directorio = 'images/';

        move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);

}