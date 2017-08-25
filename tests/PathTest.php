<?php

use PHPUnit\Framework\TestCase;

class PathTest extends TestCase {

  public function testChangeCurrentPath() {
    $path = new Path('/a/b/c/d');
    $newPath = $path->cd('../x');
    $this->assertEquals($newPath->currentPath, '/a/b/c/x');
  }

  public function testTwoTimesDown() {
    $path = new Path('/a/b/c/d');
    $newPath = $path->cd('../../x');
    $this->assertEquals($newPath->currentPath, '/a/b/x');
  }

  public function testMiddleParentDir() {
    $path = new Path('/a/b/c/d');
    $newPath = $path->cd('a/../x');
    $this->assertEquals($newPath->currentPath, '/a/b/c/d/x');
  }

  public function testThreeTimesUp() {
    $path = new Path('/a/b/c');
    $newPath = $path->cd('d/e/f');
    $this->assertEquals($newPath->currentPath, '/a/b/c/d/e/f');
  }

  public function testDoubleSlash()
  {
    $path = new Path('/a/b/c');
    $newPath = $path->cd('d//e/f');
    $this->assertEquals($newPath->currentPath, '/a/b/c/d/e/f');
  }

  public function testRootPath() {
    $path = new Path('/a/b/c');
    $newPath = $path->cd('/d/e/f');
    $this->assertEquals($newPath->currentPath, '/d/e/f');
  }

  public function testChangeToRootPath() {
    $path = new Path('/a/b/c');
    $newPath = $path->cd('/');
    $this->assertEquals($newPath->currentPath, '/');
  }

  /**
  * @expectedException InvalidPathException
  */
  public function testInvalidPath() {
    $path = new Path('/a/b/c');
    $newPath = $path->cd('/?');
  }

  /**
  * @expectedException InvalidPathException
  */
  public function testSingleDot() {
    $path = new Path('/a/b/c');
    $newPath = $path->cd('./d');
  }

  /**
  * @expectedException InvalidPathException
  */
  public function testTripleDot() {
    $path = new Path('/a/b/c');
    $newPath = $path->cd('.../d');
  }

  /**
  * @expectedException InvalidPathException
  */
  public function testFourDots() {
    $path = new Path('/a/b/c');
    $newPath = $path->cd('..../d');
  }

  public function testParentFromRoot() {
    $path = new Path('/');
    $newPath = $path->cd('..');
    $this->assertEquals($newPath->currentPath, '/');
  }
}
