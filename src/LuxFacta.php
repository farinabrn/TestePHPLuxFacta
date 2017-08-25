<?php

/*******************************************************************************
  A classe LuxFacta recebe um parâmetro no seu construtor que é sempre um número
   inteiro.
  Com base nesse numero n, escreva o corpo do método say, de forma que:
    - Se o número n for divisível por 3, o retorno deve ser "Lux"
    - Se o número n for divisível por 5, o retorno deve ser "Facta"
    - Se o número n for divisível por 3 e por 5, o retorno deve ser "LuxFacta"
    - Qualquer outra condição o retorno deve ser o próprio número n;
*******************************************************************************/

class LuxFacta {

  private $n;

  public function __construct($n) {
    $this->n = $n;
  }

  public function say() {
	$divisao3=$this->n % 3;
	$divisao5=$this->n % 5;

	if ($divisao3 == 0 && $divisao5 == 0) {
		return 'LuxFacta';
	} else if ($divisao3 == 0) {
		return 'Lux';
	} else if ($divisao5 == 0) {
		return 'Facta';
	}
	
    return $this->n;
  }
}
