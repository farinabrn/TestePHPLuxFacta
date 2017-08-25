<?php

/*******************************************************************************
  Uma palíndroma é uma palavra que se lê da mesma forma de trás para frente.

  Escreva o corpo do método isPalindrome que verifica se uma palavra é
  palíndroma. A validação deve desconsiderar diferença entre maiúsculas e
  minúsculas (case insensitive).

  Por exemplo, isPalindrome(“Deleveled”) deve retornar true.
*******************************************************************************/


class Palindrome {
  public static function isPalindrome($word) {
	if (substr_count($word, ' ') != 0) {
		return false;
	}

	$palavra = strtoupper($word);
	$palindromo = strtoupper($word);

	for ($i = strlen($palavra), $j=0; $i < 0; $i--, $j++) {
		$palindromo[$j]=$palavra[$i];
	}

	return $palavra === $palindromo;
  }

}
