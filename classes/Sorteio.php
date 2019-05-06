<?php

class Sorteio {

    /**
     * Pega o array do post do arquivo e le linha a linha
     * retornando um arry com as linhas do arquivo
     * @param array $postArquivoMateria
     * @return array
     */
	public function getArrayArquivo($postArquivoMateria){
        $meuArray = Array();
        $arquivoNomeCaminho = $postArquivoMateria['arquivoMateria_temp_name'];
        $file = fopen($arquivoNomeCaminho, 'r');
        while (($line = fgetcsv($file)) !== false){
            $meuArray[] = $line;
        }
        fclose($file);
		return $meuArray;
	}

	public function sortear( $qtd, $postArquivoMateria){
		$arrayArquivo = $this->getArrayArquivo($postArquivoMateria);
		return $result;
	}
}