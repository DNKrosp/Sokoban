<?php


class SokobanEntityFabric implements EntityFabric
{

    static function create($name_entity)
    {
        $object = false;

        switch ($name_entity)
        {
            case "box": {
                $object = new Box();
                break;
            }

            case "user": {
                $object = new User(5, 5);
                break;
            }

            case "bomb": {
                $object = new Bomb();
                break;
            }

            case "wall": {
                $object = new Wall();
                break;
            }
        }

        return $object;
    }
}