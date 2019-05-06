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
        while ( ($line = fgets ($file)) !== false ){
            $meuArray[] = $line;
        }
        fclose($file);
        /*
        //Para arquivo CSV
        $file = fopen($arquivoNomeCaminho, 'r');
        while (($line = fgetcsv($file)) !== false){
            //$meuArray[] = StringHelper::str2utf8($line);
            $meuArray[] = $line;
        }
        fclose($file);
        */
        
		return $meuArray;
    }
    
    public function getArrayComtemplados($qtd,$arrayArquivo){
        $arrayComtemplados = Array();
        for ($i = 1; $i <= $qtd; $i++) {
            $keySorteada = array_rand( $arrayArquivo );
            $arrayComtemplados['LINHA'][]=$i;
            $arrayComtemplados['KEYO'][]=$keySorteada;
            $arrayComtemplados['VALOR'][]=$arrayArquivo[$keySorteada];
        }
        $_SESSION[APLICATIVO]['COMTEMPLADOS'] = $arrayComtemplados;
		return $arrayComtemplados;
    }
    
    public function getArrayFilaEspera($arrayArquivo,$arrayComtemplados){
        $listEspera = array_diff($arrayArquivo, $arrayComtemplados['VALOR']);
        $qtd = CountHelper::count($listEspera);
        $arrayFilaEspera=array();
        for ($i = 1; $i <= $qtd; $i++) {
            $keySorteada = array_rand( $listEspera );
            $arrayFilaEspera['LINHA'][]=$i;
            $arrayFilaEspera['KEYO'][]=$keySorteada;
            $arrayFilaEspera['VALOR'][]=$listEspera[$keySorteada];
        }
        $_SESSION[APLICATIVO]['FILAESPERA'] = $arrayFilaEspera;
		return $arrayFilaEspera;
	}    

	public function sortear( $qtd, $postArquivoMateria){
        $arrayArquivo = $this->getArrayArquivo($postArquivoMateria);
        $arrayComtemplados = $this->getArrayComtemplados($qtd,$arrayArquivo);
        $this->getArrayFilaEspera($arrayArquivo,$arrayComtemplados);
        $result = 1;
		return $result;
	}
}