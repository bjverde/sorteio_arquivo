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

    public function mergeArrayComtemplados($arrayIncluir){
        $original = $_SESSION[APLICATIVO]['COMTEMPLADOS'];
        $result =  array();
        $result['SITUACAO']= array_merge($original['SITUACAO'], $arrayIncluir['SITUACAO']);
        $result['POSICAO'] = array_merge($original['POSICAO'], $arrayIncluir['POSICAO']);
        $result['KEYO']    = array_merge($original['KEYO'], $arrayIncluir['KEYO']);
        $result['VALOR']   = array_merge($original['VALOR'], $arrayIncluir['VALOR']);
        d($result);
        $_SESSION[APLICATIVO]['COMTEMPLADOS'] = $result;
    }

    public function getArrayComtemplados($qtd,$arrayArquivo){
        $arrayComtemplados = Array();
        for ($i = 1; $i <= $qtd; $i++) {
            $keySorteada = array_rand( $arrayArquivo );
            $arrayComtemplados['SITUACAO'][]='Contemplado';
            $arrayComtemplados['POSICAO'][]=$i;
            $arrayComtemplados['KEYO'][]=$keySorteada;            
            $arrayComtemplados['VALOR'][]=StringHelper::str2utf8($arrayArquivo[$keySorteada]);
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
            $arrayFilaEspera['SITUACAO'][]='Fila de espera';
            $arrayFilaEspera['POSICAO'][]=$i;
            $arrayFilaEspera['KEYO'][]=$keySorteada;
            $arrayFilaEspera['VALOR'][]=StringHelper::str2utf8($arrayArquivo[$keySorteada]);
        }
        $this->mergeArrayComtemplados($arrayFilaEspera);
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