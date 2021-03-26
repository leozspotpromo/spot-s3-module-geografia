<?php

namespace Modules\Geografia\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions,
    DataTables\Editor\SearchPaneOptions;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('geografia::cidade.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('geografia::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    public function datatable(Request $request)
    {
        $fields = [];

        $db = $this->getdb();

        $editor = Editor::inst($db, 'city','id');

        $fields[] = Field::inst('city.id');
        $fields[] = Field::inst('city.description');
        $fields[] = Field::inst('city.state_id')
            ->options( Options::inst()
                ->table( 'state' )
                ->value( 'id' )
                ->label( 'description' )
            );
        $fields[] = Field::inst('city.active');

        $fields[] = Field::inst('state.description');

        $editor->fields($fields);
        $editor->leftJoin( 'state',   'state.id',   '=', 'city.state_id' );
        $editor->process($request->all())->json();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('geografia::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('geografia::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
