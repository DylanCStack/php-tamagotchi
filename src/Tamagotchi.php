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
            $this->food = 100;
            $this->attention = 100;
            $this->rest = 100;
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
    }
