<?php

namespace SubStalker\Entities;

class Group extends AUser
{
  public function __construct(int $id, string $name)
  {
    parent::__construct($id, $name);
  }
}