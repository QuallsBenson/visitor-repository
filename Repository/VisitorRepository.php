<?php namespace Quallsbenson\Analytics\Repository;


use Criteria\CriteriaBuilder;
use Quallsbenson\Analytics\Interfaces\DatabaseProviderInterface;
use Quallsbenson\Analytics\Interfaces\VisitorFactoryInterface;


class VisitorRepository{


	use \RicAnthonyLee\Itemizer\Traits\CallbackMapperTrait;


	public function __construct()
	{

		$this->setCallbackMap([
			"criteria" : "getCriteriaBuilder",
			"database" : "getDatabaseProvider",
			"visitor"  : "getVisitorFactory"
		]);

	}


	public function setCriteriaBuilder( Criteria\CriteriaBuilder $criteria )
	{

		$this->criteria = $criteria;

	}


	public function getCriteriaBuilder()
	{

		return $this->criteria;

	}


	public function setDatabaseProvider( DatabaseProviderInterface $database )
	{	

		$this->database = $database;

	}


	public function getDatabaseProvider()
	{

		return $this->database;

	}


	public function setVisitorFactory( VisitorFactoryInterface $visitor )
	{	

		$this->visitorFactory = $visitor;

	}


	public function getVisitorFactory()
	{

		return $this->visitorFactory;

	}	


	public function find()
	{

		$criteria = $this->criteria();
		

		$results  = $this->database()->findBy( $criteria );


		if( count( $results ) )
		{

			return $this->visitor()->make( $results );

		}

		return [];

	}



}
