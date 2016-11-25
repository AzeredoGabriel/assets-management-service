<?php

namespace App\Services;
use App\Services as Service; 
use App\Repositories as Repository;
use Storage; 

/**
 * Camada de aplicação. 
 * Essa camada é responsável por receber os parâmetros, verificar a validade deles e aplicar a lógica de negócio, pode acessar outros services
 */

class Tag
{

	public function getValidTags($str_tags)
    {
    	/**
    	 * Verifica se as tags são válidas com regex, database ou sei lá mais o que..
    	 */
    	
    	$tags = explode(',', $str_tags); 
    	return $tags; 
    }

}
