<?php

/*******************************************************************************
  Escreva o método cd (change directory) para um sistema de arquivos abstrato.
    O diretório raiz é '/'
    O separador é '/'
    O diretório pai é acessível através de '..'
    O nome de um diretório contém apenas letras (A-Za-z)
    Quando um path for inválido, o método deverá lançar a exceção do tipo InvalidPathException

  Por exemplo:
    $path = new Path('/a/b/c/d');
    echo $path->cd('e/f')->currentPath;   //exibe '/a/b/c/d/e/f
    echo $path->cd('../x')->currentPath;  //exibe '/a/b/c/d/e/x'
    echo $path->cd('/d')->currentPath;    //exibe '/d'
    echo $path->cd('/?')->currentPath;    //InvalidPathException é lançada

*******************************************************************************/
class InvalidPathException extends Exception
{
}

class Path {

  public $currentPath;

  public function __construct($path) {
    $this->currentPath = $path;
  }


  public function cd($path) {
	try {
		if ($path[0] == '/') {
			$this->currentPath = $path;
			return $this;
		}

		$arrayPath = explode('/', $path);

		foreach ($arrayPath as $a) {
			switch($a) {
				case '..' && strlen($a) == 2:
					$this->currentPath = substr_replace($this->currentPath, '', strlen($this->currentPath) - 2);
					if (strlen($this->currentPath) == 0) {
						$this->currentPath = substr_replace($this->currentPath, '/', strlen($this->currentPath));
					}

					break;
				case preg_match('[A-Za-z]', $a) :
					$this->currentPath = substr_replace($this->currentPath, '/'.$a.'', strlen($this->currentPath));
					break;
				case '':
					break;
				default:
					throw new InvalidPathException();
					break;
		
			}
		}

		return $this;
	} catch(InvalidPathException $e) {
		return $e->getMessage();
	}
  }
}
