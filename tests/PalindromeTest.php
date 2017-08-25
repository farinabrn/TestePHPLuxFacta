<?php

use PHPUnit\Framework\TestCase;

class PalindromeTest extends TestCase {

  public function testExampleCase() {
    $word = 'omississimo';
    $this->assertTrue(Palindrome::isPalindrome($word));
  }

  public function testPalindromesCase() {
    $word = 'Ama';
    $this->assertTrue(Palindrome::isPalindrome($word));

    $word = 'amA';
    $this->assertTrue(Palindrome::isPalindrome($word));
  }

  public function testOddAndEvenSizedPalindromes() {
    $word = 'amma';
    $this->assertTrue(Palindrome::isPalindrome($word));

    $word = 'ana';
    $this->assertTrue(Palindrome::isPalindrome($word));

    $word = 'romametemamor';
    $this->assertTrue(Palindrome::isPalindrome($word));
  }

  public function testNonPalindromes() {
    $word = 'not a palindrome';
    $this->assertFalse(Palindrome::isPalindrome($word));
  }

  public function testEmptyWord() {
    $word = '';
    $this->assertTrue(Palindrome::isPalindrome($word));
  }

  public function testLongPalindromes() {
    $word = 'aaaaaaaaaababaaaaaaaaaa';
    $this->assertTrue(Palindrome::isPalindrome($word));

    $word = 'aaaaaaaaaabbaaaaaaaaaa';
    $this->assertTrue(Palindrome::isPalindrome($word));
  }

}
