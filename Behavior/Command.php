<?php

interface CommandInterface {
    public function execute();
    public function undo();
    public function redo();
    public function log();
}

class CopyCommand implements CommandInterface {
    private string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function execute ()
    {
        echo "Копируем $this->text";
    }
    public function undo()
    {
        echo "Отменяем копирование";
    }
    public function redo()
    {
        echo "Повторяем копирование";
    }
    public function log()
    {
        echo "Выполнено копирование $this->text";
    }
}

class CutCommand implements CommandInterface {
    private string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function execute ()
    {
        echo "Вырезаем $this->text";
    }
    public function undo()
    {
        echo "Отменяем вырезание";
    }
    public function redo()
    {
        echo "Повторяем вырезание";
    }
    public function log()
    {
        echo "Выполнено вырезание $this->text";
    }
}

class PastCommand implements CommandInterface {
    private string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function execute ()
    {
        echo "Вставляем $this->text";
    }
    public function undo()
    {
        echo "Отменяем вставку";
    }
    public function redo()
    {
        echo "Повторяем вставку";
    }
    public function log()
    {
        echo "Выполнена вставка $this->text";
    }
}

class DocWord {
    public function submit(CommandInterface $command)
    {
        $command->execute();
        $command->log();
    }
}

$invoker = new DocWord();
$invoker->submit(new CopyCommand("Какой-то текст"));
