<?php namespace Quallsbenson\Analytics\Google;

use Quallsbenson\Analytics\Interfaces\VisitorFactoryInterface;
use Criteria\CriteriaBuilder as Criteria;
use Quallsbenson\Analytics\Visitor;


class VisitorFactory implements VisitorFactoryInterface{

	/**
	* build an array of visitors based on the results and the criteria
	* @return array of visitors
	**/

	public function make( $results, Criteria $criteria )
	{

		$visitorsRaw = $results["rows"];
		$visitors    = [];


		foreach( $visitorsRaw as $v )
		{

			$i = 0;
			$visitor = new Visitor;

			foreach( $criteria["dimensions"] as $d )
			{

				$visitor->{ $d->getAlias() } = $v[$i++];

			}

			foreach( $criteria["metrics"] as $m )
			{

				$visitor->{ $m->getAlias() } = $v[$i++];

			}

			$visitors[] = $visitor;

		}

		return $visitors;

	}


}