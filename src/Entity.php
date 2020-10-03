<?php


interface Entity
{
    public function __construct($x, $y);

    public function run();

    public function render();

    public function needRerender();

    public function checkCollapse($type, $side);
}