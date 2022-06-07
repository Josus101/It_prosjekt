<?php
    require 'connect';

    $navn = $_POST["navn"];
    $beskrivelse = $_POST["beskrivelse"];
    $interesser = $_POST["interesser"];
    $universitet = $_POST["universitet"];

    $sql = "INSERT INTO grupper (navn, beskribelse, interesser, universitet)
    VALUES ($navn, $beskrivelse, $interesser, $universitet)";
?>