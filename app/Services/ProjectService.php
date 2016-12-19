<?php

namespace App\Services;

use App\Models\Project;
use Storage; 


class ProjectService
{
	/**
	 * Instância do modelo de projeto
	 * @var App\Models\Project
	 */
	protected $project_model; 

	
	public function __construct(
		Project $project_model)
	{
		$this->project_model = $project_model; 	
	}

	public function getProjectList()
	{
		return []; 
	}

	public function getProject($id)
	{
		return true; 
	}

	/**
	 * Obtém projeto a partir da key.
	 * 
	 * @param  string $key    
	 * @param  string $domain 
	 * @return Project Retorna uma instância de Project.
	 */
	public function getProjectByKey($key)
	{
		$project = $this->project_model->getByKey($key); 
		return $project ? $project : false; 
	}	

	/**
	 * Valida um domínio na lista de domínios do projeto.
	 * 
	 * @param  Model\Project $project 
	 * @param  string 	     $domain  
	 * @return boolean       Retorna um boolean informando se o domínio é válido ou não. 
	 */
	public function validateDomain(Project $project, $domain)
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
