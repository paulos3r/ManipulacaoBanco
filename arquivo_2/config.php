<?php
//coneção com o banco de dados pdo
try {
    $pdo = new PDO( "mysql:dbname=test;host=127.0.0.1", "root", "" );

	}catch( Exception $e ){
        print_r( $e );
    }