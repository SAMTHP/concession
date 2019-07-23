<?php

class GamerController
{
	private $name;

	public function __construct()
	{
		$this->name = readline("Votre nom :");
	}

	public function __destruct()
	{

	}

	public function setName(string $name)
	{
		$this->name = $name ;
	}

	public function getName()
	{
		return $this->name;
	}
}
