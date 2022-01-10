<?php
// Princípio da Inversão de Dependência — Dependa de abstrações e não de implementações.
// Módulos de alto nível não devem depender de módulos de baixo nível. Ambos devem depender da abstração.
// Abstrações não devem depender de detalhes. Detalhes devem depender de abstrações.
use UsuarioDAO as GlobalUsuarioDAO;

interface DBconection{
    public function connect();
}

class MySQLConnection implements DBconection{
    public function connect(){}
}
class OracleConnection implements DBconection{
    public function connect(){}
}

class UsuarioDAO{
    private $db;

    public function __construct(DBconection $dbCon){
        $this->db  = $dbCon;
    }
}



$dbCon = new OracleConnection();

$usuarioDAO = new UsuarioDAO($dbCon);
$usuario2DAO = new UsuarioDAO($dbCon); 