<?php

namespace App\Model;

use App\Db\Connection;

abstract class ModelPadrao
{
    abstract function getTable();

    abstract function getTableCarrinho();

    function getAll()
    {
        $oConnection = Connection::get();

        $sSelect = 'SELECT * FROM ' . $this->getTable();
        $oResult = pg_query($oConnection, $sSelect);

        $aData = [];

        while ($aResultado = pg_fetch_assoc($oResult)){
            $aData[] = $aResultado;
        }
        return $aData;
    }

    function getAllCarrinho()
    {
        $oConnection = Connection::get();

        $sSelect = 'SELECT * FROM ' . $this->getTableCarrinho();
        $oResult = pg_query($oConnection, $sSelect);

        $aData = [];

        while ($aResultado = pg_fetch_assoc($oResult)){
            $aData[] = $aResultado;
        }
        return $aData;
    }

    protected function insert($aValues)
    {
        $oConnection = Connection::get();
        
        $sSql = 'INSERT INTO '.$this->getTable().' ('.implode(',', array_keys($aValues)).') VALUES ('.implode(',', array_values($aValues)).')';
        
        return pg_query($oConnection, $sSql);
    }
    
    protected function insertcarrinho($aValues)
    {
        $oConnection = Connection::get();
        
        $sSql = 'INSERT INTO '.$this->getTableCarrinho().' ('.implode(',', array_keys($aValues)).') VALUES ('.implode(',', array_values($aValues)).')';
        
        return pg_query($oConnection, $sSql);
    }

    protected function delete($aWhere)
    {
        // Implementar
        $oConnection = Connection::get();
        
        $sSql='
            delete from '.$this->getTable().' where 1=1
        ';
        foreach($aWhere as $sNomeColuna => $sValor){
            $sSql .= ' and ' . $sNomeColuna.' = '.$sValor;
        }
        return pg_query($oConnection, $sSql);
                             
    }
    protected function deletecarrinho($aWhere)
    {
        // Implementar
        $oConnection = Connection::get();
        
        $sSql='
            delete from '.$this->getTableCarrinho().' where 1=1
        ';
        foreach($aWhere as $sNomeColuna => $sValor){
            $sSql .= ' and ' . $sNomeColuna.' = '.$sValor;
        }
        return pg_query($oConnection, $sSql);
                             
    }

    protected function update($aValues, $aWhere)
    {
        // Implementar
    }

    /**
     * Retorna o valor pronto para ser 
     * adicionado no comando SQL
     * @param mixed $xValue
     * @return mixed
     */
    protected function getBdValue($xValue)
    {
        if (!empty($xValue) || !is_null($xValue)) {
            if (is_string($xValue)) {
                return '\'' . pg_escape_string($xValue) . '\'';
            }

            return $xValue;
        }

        return 'NULL';
    }
}
