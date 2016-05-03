<?php
/**
 * Created by PhpStorm.
 * User: Sinthujan
 * Date: 19/3/2016
 * Time: 11:09 PM
 */

namespace App\Http\Controllers\Artist\DPatterns\Strategy;


class ArtUserDetsClient
{
    private $output;

    public function setOutput(ArtUserDetsInterface $outputtype)
    {
        $this->output = $outputtype;
    }

    public function loadOutput()
    {
        return $this->output->load();
    }

}