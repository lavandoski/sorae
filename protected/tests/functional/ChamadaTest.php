<?php

class ChamadaTest extends WebTestCase
{
	public $fixtures=array(
		'chamadas'=>'Chamada',
	);

	public function testShow()
	{
		$this->open('?r=chamada/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=chamada/create');
	}

	public function testUpdate()
	{
		$this->open('?r=chamada/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=chamada/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=chamada/index');
	}

	public function testAdmin()
	{
		$this->open('?r=chamada/admin');
	}
}
