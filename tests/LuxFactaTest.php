<?php

use PHPUnit\Framework\TestCase;

class LuxFactaTest extends TestCase {

  public function testNumbers() {
    $first = new LuxFacta(1);
    $this->assertEquals($first->say(), 1);

    $sec = new LuxFacta(2);
    $this->assertEquals($sec->say(), 2);

    $third = new LuxFacta(28);
    $this->assertEquals($third->say(), 28);
  }

  public function testLux() {
    $first = new LuxFacta(3);
    $this->assertEquals($first->say(), 'Lux');

    $sec = new LuxFacta(40);
    $this->assertFalse($sec->say() === 'Lux');

    $third = new LuxFacta(42);
    $this->assertEquals($third->say(), 'Lux');
  }

  public function testFacta() {
    $first = new LuxFacta(5);
    $this->assertEquals($first->say(), 'Facta');

    $sec = new LuxFacta(6);
    $this->assertFalse($sec->say() === 'Facta');

    $third = new LuxFacta(20);
    $this->assertEquals($third->say(), 'Facta');
  }

  public function testLuxFacta() {
    $first = new LuxFacta(15);
    $this->assertEquals($first->say(), 'LuxFacta');

    $sec = new LuxFacta(30);
    $this->assertEquals($sec->say(), 'LuxFacta');

    $third = new LuxFacta(300);
    $this->assertEquals($third->say(), 'LuxFacta');
  }


}
