<?php


class SokobanEntityFabric implements EntityFabric
{

    static function create($name_entity, $x, $y)
    {
        $object = false;

        switch ($name_entity)
        {
            case "box": {
                $object = new Box($x, $y);
                break;
            }

            case "user": {
                $object = new User($x, $y);
                break;
            }

            case "bomb": {
                $object = new Bomb();
                break;
            }

            case "wall": {
                $object = new Wall($x, $y);
                break;
            }
        }

        return $object;
    }
}