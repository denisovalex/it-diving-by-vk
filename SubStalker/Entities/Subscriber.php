<?php

namespace SubStalker\Entities;

class Subscriber extends AUser
{
  private int $sex; // 1 for female, 2 for male and 0 fo no sex

  public function __construct(int $id, string $name, int $sex)
  {
    parent::__construct($id, $name);
    $this->sex = $sex;
  }

  public function isFemale()
  {
    return $this->sex === 1;
  }

  public function isMale()
  {
    return $this->sex === 2;
  }
}