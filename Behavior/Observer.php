<?php

interface Observer {
    public function getMessage($vacancy);
}

class User implements Observer {
    private string $name;
    private string $email;
    private int $experience;


    public function __construct($name)
    {
        $this->name=$name;
    }

    public function getMessage ($vacancy)
    {
        echo "$this->name для Вас есть новая вакансия $vacancy\n";

    }
}

interface Observable {
    public function addSubscribed(Observer $user);
    public function removeSubscribed(Observer $user);
    public function notify();
}

class HandHunter implements Observable {

    private string $vacancy;
    private array $users;

    /**
     * @param string $vacancy
     */
    public function setVacancy(string $vacancy): void
    {
        $this->vacancy = $vacancy;
    }


    public function addSubscribed(Observer $user)
    {
        $this->users[] = $user;
    }

    public function removeSubscribed(Observer $user)
    {
        foreach ($this->users as $us){
            if ($us === $user) {
                unset($us);
            }
        }
    }

    public function notify()
    {
        foreach ($this->users as $user) {
            $user->getMessage($this->vacancy);
        }

    }
}

$user = new User("Ivan");
$user2 = new User("Petr");

$website = new HandHunter();
$website->addSubscribed($user);
$website->addSubscribed($user2);
$website->setVacancy("PHP-програмист");

$website->notify();
