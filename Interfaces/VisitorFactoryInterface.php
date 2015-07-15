<?php namespace Quallsbenson\Analytics\Interfaces;


use Criteria\CriteriaBuilder as Criteria;


interface VisitorFactoryInterface{

	/**
	* build an array of visitors based on the results and the criteria
	* @return array of visitors
	**/

	public function make( $results, Criteria $criteria );


}