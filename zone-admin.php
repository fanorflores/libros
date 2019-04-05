<?php
if(empty($session->get('user')))
{
    header("Location: index.php");
}
?>