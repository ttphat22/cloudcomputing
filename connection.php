<?php
    $conn = pg_connect("postgres://domghdpwcvbbpb:99d53f5110e884413df709ad16167ffc18bee237558c6b6082815c20c39d7a0f@ec2-3-225-30-189.compute-1.amazonaws.com:5432/d8au6qs8pc639n");
    //$conn = pg_connect("postgresql://postgres:Phat22072001@localhost:5432/postgres");
    if(!$conn){
        die("Can not connect database");
    } 
?>