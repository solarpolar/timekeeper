<?php

use Timekeeper\Repo\Client\ClientInterface;
use Timekeeper\Service\Form\Clients\ClientForm;

class ClientController extends BaseController {

	/**
	 * Member Vars
	 */
	protected $client;
	//protected $reportForm;
	protected $perPage = 10;

	/**
	* Instantiate a new ReportController
	*/
    public function __construct(ClientInterface $client, ClientForm $clientForm)
    {
        $this->client = $client;
        $this->clientForm = $clientForm;

        //Set up auth filter
        $this->beforeFilter('auth');

        //Check CSRF token on POST
        $this->beforeFilter('csrf', array('on' => 'post'));
        
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $clients = $this->client->all();

        return View::make('clients.index')->with('clients', $clients);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('clients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$result = $this->clientForm->store( Input::all() );

        if( $result )
        {
            // Success!
   //         	$page = Input::get('page');
			// $pagiData = $this->report->byPage(Session::get('org_id'), $page, $this->perPage);
	  //       $paginator = Paginator::make($pagiData->items->toArray(), $pagiData->totalItems, $this->perPage);
	  //       $paginator->setBaseUrl(URL::to('reports'));
	  //       $paginator->setCurrentPage($page);

	  //       $data['reports'] = $pagiData->items->toArray();
	  //   	$data['links'] = sprintf($paginator->links());
	  //       $data['page'] = $page;

	  //       return $data;
        	return Redirect::action('ClientController@index');

        } else {
        	// Validation failed
           	return Redirect::action('ClientController@create')->withErrors($this->clientForm->errors());
           	//return Response::json($this->reportForm->errors(), 400);
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $client = $this->client->byId($id);
        return View::make('clients.show')->with('client', $client);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $client = $this->client->byId($id);
        return View::make('clients.edit')->with('client', $client);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($client_id)
	{
		$data = Input::all();
		$data['client_id'] = $client_id;

		$result = $this->clientForm->update( $data );

        if( $result )
        {
            // Success!
   			// $page = Input::get('page');
			// $pagiData = $this->report->byPage(Session::get('org_id'), $page, $this->perPage);
	  //       $paginator = Paginator::make($pagiData->items->toArray(), $pagiData->totalItems, $this->perPage);
	  //       $paginator->setBaseUrl(URL::to('reports'));
	  //       $paginator->setCurrentPage($page);

	  //       $data['reports'] = $pagiData->items->toArray();
	  //   	$data['links'] = sprintf($paginator->links());
	  //       $data['page'] = $page;

	  //       return $data;
        	return Redirect::action('ClientController@index');

        } else {
        	// Validation failed
           	return Redirect::action('ClientController@update')->withErrors($this->clientForm->errors());
           	//return Response::json($this->reportForm->errors(), 400);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->client->destroy($id);

		return Redirect::action('ClientController@index');
	}

}
