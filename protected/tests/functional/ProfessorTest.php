<?php

class ProfessorTest extends WebTestCase
{
	public $fixtures=array(
		'professors'=>'Professor',
	);

	public function testShow()
	{
		$this->open('?r=professor/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=professor/create');
	}

	public function testUpdate()
	{
		$this->open('?r=professor/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=professor/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=professor/index');
	}

	public function testAdmin()
	{
		$this->open('?r=professor/admin');
	}
}
