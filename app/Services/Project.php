<?php

namespace App\Services;
use App\Services as Service; 
use App\Models as Model;
use Storage; 


class Project
{
	public function getProjectByKey($key, $domain)
	{
		$project = new Model\Project(); 
		$project = $project->getByKey($key); 

		if (!$project)
			return false; 

		$valid_domain = $this->validateDomain($project, $domain); 

		return $valid_domain ? $project : false; 
	}	

	public function validateDomain(Model\Project $project, string $domain)
	{
		$domains = $project->domains(); 

		return in_array($domain, $domains) ? true : false; 
	}
}
