<?php

namespace davhae\lampiao\Controller;


class ToolController
{
    const EXEC_ARP = "arp ";
    const EXEC_NMAP = "nmap ";
    const EXEC_DIRB = "dirb ";
    const EXEC_NIKTO = "nikto ";

    public function execute($EXEC_CONST, $endParam = "", ...$params) {

        $EXEC = $this->getConstFromVariable($EXEC_CONST);

        // Put all arguments together with a space between
        if (isset($params)) {
            $parameterQuery = $this->createParameterQuery($params);
        }
        $parameterQuery .= " " . $endParam;
        $query = $EXEC . $parameterQuery;

        $result = shell_exec($query);

        return $result;
    }

    public function createParameterQuery($paramArray) {
        return implode($paramArray, " ");
    }

    public function getConstFromVariable($EXEC_CONST) {
        if (defined('self::' . $EXEC_CONST)) {
            return constant("self::" . $EXEC_CONST);
        } else {
            throw new \Exception('Undefined Constant.');
        }
    }
}