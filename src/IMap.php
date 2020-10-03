<?php


interface IMap
{
    public function __construct($pathToJson);

    public function render();
}