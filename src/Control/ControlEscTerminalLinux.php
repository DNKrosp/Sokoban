<?php


class ControlEscTerminalLinux
{
    private $settings = [
        "player0"=>[
            "up"=>[119], //w
            "down"=>[115], //a
            "left"=>[97], //s
            "right"=>[100] //d
        ],
        "player1"=>[
            "up"=>[[27, 91, 65]], //arrow up
            "down"=>[[27, 91, 66]], //arrow down
            "left"=>[[27, 91, 68]], //arrow left
            "right"=>[[27, 91, 67]] //arrow right
        ],
        "game"=>[
            "pause"=>[27]
        ]
    ];

    public $settingsMapped = [
        "119"=>["player0"=>"up"],
        "115"=>["player0"=>"left"],
        "97"=>["player0"=>"down"],
        "100"=>["player0"=>"right"],
        "27"=>[
            ["game"=>"pause"],
            "91"=>[
                "65"=>["player1"=>"up"],
                "66"=>["player1"=>"down"],
                "67"=>["player1"=>"right"],
                "68"=>["player1"=>"left"],
        ]]
    ];

    private $stdin;

    public function __construct($settings = null)
    {
        if($settings!==null)
        {
            //todo сделать валидацию настроек в зависимости от возможностей персонажа
            $this->settings = $settings;
        }

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

        if(count($command)>1)
            $command=$command[0];

        return $command;
    }
}

