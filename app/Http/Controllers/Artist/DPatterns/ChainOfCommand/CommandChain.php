<?php
/**
 * Created by PhpStorm.
 * User: Sinthujan
 * Date: 19/3/2016
 * Time: 11:58 PM
 */

namespace App\Http\Controllers\Artist\DPatterns\ChainOfCommand;


class CommandChain
{
    private $_cmd= array();

    public function addCommand($command)
    {
        $this->_cmd[] =$command;
    }

    public function runCommand($name, $args)
    {
        foreach($this->_cmd as $cmd)
        {
            if($cmd->onCommand($name,$args))
            {
                //Do sending code here.
                    return $cmd->getMailBox();
            }
        }
    }

}