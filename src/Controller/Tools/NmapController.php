<?php

namespace davhae\lampiao\Controller\Tools;

use davhae\lampiao\Controller\ToolController;
use davhae\lampiao\Controller\ToolDependencyController;
use Slim\Http\Request;

class NmapController
{
    public function init(Request $req) {
        $TC = new ToolController();
        ToolDependencyController::checkOneTool(ToolController::EXEC_NMAP);



        switch ($req->getParam("scanType")) {
            case "fast":
                $scanType = "-F";
                break;
            case "ping":
                $scanType = "-sn -n";
                break;
            case "port":
                $scanType = "-p " . $req->getParam("portRange");
                break;
            case "commonPorts":
                $scanType = "-p 20, 80, 443";
                break;
            default:
                $scanType = "";
        }

        $customQuery = [];
        if (isset($_POST["versionDetection"])) {
            array_push($customQuery, '-sV');
        }
        if (isset($_POST["osDetection"])) {
            array_push($customQuery, '-O');
        }
        if (isset($_POST["scriptDetection"])) {
            array_push($customQuery, '-sC');
        }
        if (isset($_POST["scriptDetection"])) {
            array_push($customQuery, '-sC');
        }
        if (isset($_POST["timing"])) {
            array_push($customQuery, $req->getParam("timing"));
        }
        if (isset($_POST["fragment"])) {
            array_push($customQuery, "-f");
        }
        if ($req->getParam("decoy") !== "") {
            array_push($customQuery, "-D " . $req->getParam("decoy"));
        }
        if (isset($_POST["verbose"])) {
            array_push($customQuery, "-v");
        }
        $resultPath = "results/nmap/" . $req->getParam("ip") . ".xml";
        if (isset($_POST["ox"])) {

            array_push($customQuery, "--webxml -oX " . "\"" . $resultPath . "\"");
        }


        $parameterQuery = $TC->createParameterQuery($customQuery);


        return $TC->execute("EXEC_NMAP", $req->getParam("ip"), $resultPath, $scanType, $parameterQuery);
    }
}