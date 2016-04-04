<?php
/**
 * Created by PhpStorm.
 * User: Sinthujan
 * Date: 19/3/2016
 * Time: 11:57 PM
 */

namespace App\Http\Controllers\Artist\DPatterns\ChainOfCommand;


interface ICommand
{
    function onCommand($name, $args);
}