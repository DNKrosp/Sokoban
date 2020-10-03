<?php


class ControlEscTerminalLinux
{
    public $settingsMapped = [
        "119"=>"up",
        "115"=>"down",
        "97"=>"left",
        "100"=>"right",
        "27"=>[
            "91"=>[
                "65"=>"up",
                "66"=>"down",
                "67"=>"right",
                "68"=>"left",
            ]]
    ];

    private $stdin;

    public function __construct($settings = null)
    {
        if($settings!==null)
            $this->settings = $settings;

        //выход из канонического режима ввода (требование нажатия Enter)
        system("stty -icanon -echo");

        //Неблокирующий поток ввода данных
        $this->stdin = fopen('php://stdin', 'r');
        stream_set_blocking($this->stdin, 0);
    }

    function getAction()
    {
        $stack = $this->waitKeyStack();
        return $this->getCommand($stack);
    }

    private function waitKeyStack()
    {
        $isKeyPressed = false;
        $stackActions = [];
        while ($isKeyPressed!==true)
        {
            $key = ord(fgetc($this->stdin));
            if($key!==0)
            {
                do {
                    array_push($stackActions, $key);
                    $key = ord(fgetc($this->stdin));
                } while($key!==0);

                $isKeyPressed = true;
            }
        }
        return $stackActions;
    }

    private function getCommand($stackAction)
    {
        $command=$this->settingsMapped;

        while ($stackAction!==[])
        {
            $key = array_shift($stackAction);

            if(key_exists($key, $command))
                $command=$command[$key];
        }

        return $command;
    }
}

