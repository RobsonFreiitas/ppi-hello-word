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
                "mysql:host=localhost;dbname=ppi4m_infolanches",
                "ppi4m",
                "ppi41@ifrn"
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