<?php

  class Tamagachi
  {
    private $name;
    private $food;
    private $rest;
    private $attention;

    function __construct($user_name, $user_food = 5, $user_rest = 5, $user_attention = 5)
    {
      $this->name = $user_name;
      $this->food = $user_food;
      $this->rest = $user_rest;
      $this->attention = $user_attention;
    }

    function getName()
    {
      return $this->name;
    }

    function setName($new_name)
    {
      $this->name = $new_name;
    }

    function getFood()
    {
      return $this->food;
    }

    function setFood($new_food)
    {
      $this->food = $new_food;
    }

    function getRest()
    {
      return $this->rest;
    }

    function setRest($new_rest)
    {
      $this->rest = $new_rest;
    }

    function getAttention()
    {
      return $this->attention;
    }

    function setAttention($new_attention)
    {
      $this->attention = $new_attention;
    }

    function save()
    {
      array_push($_SESSION['list_of_tamagachis'], $this);
    }

    static function getAll()
    {
      return $_SESSION['list_of_tamagachis'];
    }
  }

?>
