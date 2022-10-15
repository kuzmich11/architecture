<?php

interface SendMessage
{
    public function send();
}

class Message implements SendMessage
{

    public function __construct(
        private string $message
    ){}


    public function send()
    {
        return $this->message;
    }
}

class SMS implements SendMessage
{

    public function __construct(
        private SendMessage $typeMessage
    ){}

    public function send()
    {
        return "{$this->typeMessage->send()}" . "- отправлено через SMS\n";
    }
}

class Email implements SendMessage
{

    public function __construct(
        private SendMessage $typeMessage
    ){}

    public function send()
    {
        return "{$this->typeMessage->send()}" . "- отправлено через Email\n";
    }
}

class CN implements SendMessage
{

    public function __construct(
        private SendMessage $typeMessage
    ){}

    public function send()
    {
        return "{$this->typeMessage->send()}" . "- отправлено через CN\n";
    }
}

//Проверка
$result = new SMS(new Message("Hello, world!"));
echo $result->send();

$result2 = new Email(new Message("Hello, world!"));
echo $result2->send();

$result3 = new CN(new Message("Hello, world!"));
echo $result3->send();

$result4 = new SMS(new Email(new CN(new Message("Hello, world!"))));
echo $result4->send();