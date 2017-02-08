<?php
    class Tamagotchi
    {
        private $name;
        private $food;
        private $attention;
        private $rest;

        function __construct($name)
        {
            $this->name = $name;
            $this->food = 50;
            $this->attention = 50;
            $this->rest = 50;
        }

        function getName()
        {
            return $this->name;
        }

        function getFood()
        {
            return $this->food;
        }

        function setFood($new_food)
        {
            $this->food = $new_food;
        }

        function getAttention()
        {
            return $this->attention;
        }

        function setAttention($new_attention)
        {
            $this->attention = $new_attention;
        }

        function getRest()
        {
            return $this->rest;
        }

        function setRest($new_rest)
        {
            $this->rest = $new_rest;
        }

        function passTime()
        {
            $this->food -= 5;
            $this->attention -= 5;
            $this->rest -= 5;
        }

        function isDead()
        {
            return
                $this->getFood() <= 0 ||
                $this->getAttention() <= 0 ||
                $this->getRest() <= 0;
        }

        function save()
        {
            $_SESSION['pet'] = $this;
        }

        static function getPet()
        {
            return $_SESSION['pet'];
        }

        static function deletePet()
        {
            $_SESSION['pet'] = NULL;
        }
    }
