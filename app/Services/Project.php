<?php

namespace App\Services;
use App\Services as Service; 
use App\Models as Model;
use Storage; 


class Project
{
	
	/**
	 * Obtém projeto a partir da key.
	 * 
	 * @param  string $key    
	 * @param  string $domain 
	 * @return Project Retorna uma instância de Project.
	 */
	public function getProjectByKey($key, $domain)
	{
		$project = new Model\Project(); 
		$project = $project->getByKey($key); 

		if (!$project)
			return false; 


		$valid_domain = $this->validateDomain($project, $domain); 

		return $valid_domain ? $project : false; 
	}	

	/**
	 * Valida um domínio na lista de domínios do projeto.
	 * 
	 * @param  Model\Project $project 
	 * @param  string 	     $domain  
	 * @return boolean       Retorna um boolean informando se o domínio é válido ou não. 
	 */
	public function validateDomain(Model\Project $project, $domain)
	{
		$domains = $project->domains()->get()->toArray();

		if ($domains) {
			$domains = array_map(function($domain) {
				return $domain['domain']; 
			}, $domains);
		}
 
		return in_array($domain, $domains) ? true : false; 
	}
}
