<?php
namespace davhae\lampiao\Controller;

class ToolDependencyController
{

    public static function checkToolDependencies() {
        // get the predefined OS constant // Eins von 'Windows', 'BSD', 'Darwin', 'Solaris', 'Linux' oder 'Unknown'
        $PHP_OS = PHP_OS;
        $statusArray = [];
        $TC = new ToolController();

        $arpVersion = shell_exec( ToolController::EXEC_ARP);
        $nmapVersion = shell_exec( ToolController::EXEC_NMAP . "-version");
        $dirbVersion = shell_exec(ToolController::EXEC_DIRB . "-version");
        $niktoVersion = shell_exec(ToolController::EXEC_NIKTO . "-version");

        self::setStatusForTool($statusArray, "arp", $arpVersion);
        self::setStatusForTool($statusArray, "nmap", $nmapVersion);
        self::setStatusForTool($statusArray, "dirb", $dirbVersion);
        self::setStatusForTool($statusArray, "nikto", $dirbVersion);

        return $statusArray;
    }

    public static function setStatusForTool(&$statusArray, $toolName, $version) {
        if ($version != "") {
            $statusArray[$toolName]["status"] = 1;
            $statusArray[$toolName]["version"] = $version;
        } else {
            $statusArray[$toolName]["status"] = 0;
            $statusArray[$toolName]["version"] = "Not found";
        }
    }

    public static function checkOneTool($EXEC_TOOL){
        $version = shell_exec($EXEC_TOOL . ' -version');

        if ($version != "") {
            return 1;
        } else {
            throw new \Exception("ToolDependencyController@checkOneTool - " . $EXEC_TOOL . "NOT FOUND");
        }
    }
}