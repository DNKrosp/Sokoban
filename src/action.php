<?php


class Action
{
    private $pathToConfig;
    private $actions = [];
    public function __construct($pathToConfig)
    {
        if(file_exists($pathToConfig))
        {
            $this->pathToConfig = $pathToConfig;
            $jsonConfig = json_decode(file_get_contents($this->pathToConfig), true);
            $this->actions = $jsonConfig;
        }
    }

    public function getAction($pressedKey)
    {
        $searchedAction = false;
        foreach ($this->actions as $action => $keys)
            foreach ($keys as $key)
                if($key == $pressedKey)
                    $searchedAction = $action;

        return $searchedAction;
    }

    private function searchKeyAndDeleteIfNeedle($searchedKey, $ifNeedle = false)
    {
        $isKeyExist = false;
        foreach ($this->actions as $action => $keys)
            foreach ($keys as $key)
                if($key == $searchedKey)
                    if($ifNeedle)
                        unset($key);
                    else
                        $isKeyExist = true;

        return $isKeyExist;
    }

    public function setActionKey($action, $key, $ifExistDelete = false)
    {
        if(!$this->searchKeyAndDeleteIfNeedle($key, $ifExistDelete))
            array_push($this->actions[$action], $key);
        else
            throw new Exception("Данная клавиша уже используется!", 20);

        $isChanged = false;

        $configFile = fopen($this->pathToConfig.".new", "w");
        if(fwrite($configFile, json_encode($this->actions)))
        {
            if(file_exists($this->pathToConfig))
                if(rename($this->pathToConfig, $this->pathToConfig.".bkp"))
                    if(rename($this->pathToConfig.".new", $this->pathToConfig) && ($isChanged=true))
                        throw new Exception("Проблемы с доступом к файлу", 15);
                    else
                        throw new Exception("Файла конфигурации не существует", 15);
        } else
            throw new Exception("Не удалось создать файл", 10);

        return $isChanged;
    }
}