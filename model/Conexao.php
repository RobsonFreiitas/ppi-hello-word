<?php

class Conexao{

    public static function select($tabela, $projecao){
        $sql = "SELECT $projecao FROM $tabela;";
        $resource = Conexao::getConexao()
        ->prepare($sql);
        $resource->execute();
        return $resource->fetchAll();
    }

    public static function insert($tabela, $parametros,
    $valores){
        $sql = "INSERT INTO " . $tabela . " (" .
            $parametros . ") VALUES (" .
            $valores . ");";
        self::getConexao()->exec($sql);
        echo $sql;
    }

    private static function getConexao(){
        try{
            $conexao = new PDO(
                "mysql:host=ec2.3-227-154-49.compute-1.amazonaws.com;port=5432;dbname=df4od0bkf7g1eb",
                "ppi4mdamofibzvikhhj",
                "b0aebb907fe0dd12e44743ba86ae705d561ca8d05ae77e6d8851249b114a92f2"
            );
            $conexao->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            //echo "Voilá !";
            return $conexao;
        }
        catch(PDOException $e){
            echo "Deu erro: " . $e->getMessage();
        }
    }
}