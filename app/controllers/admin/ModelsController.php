<?php

class ModelsController extends BaseController {

    /**
     * Model Repository
     *
     * @var Model
     */
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $models = $this->model->paginate(10);
        $title = 'Models';

        return View::make('admin.models.index', compact('models','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('admin.models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        $validation = Validator::make($input, Model::$rules);

        if ($validation->passes()) {
            $this->model->create($input);

            return Redirect::route('admin.models.index');
        }

        return Redirect::route('admin.models.create')
                        ->withInput()
                        ->withErrors($validation)
                        ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $model = $this->model->findOrFail($id);

        return View::make('admin.models.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $model = $this->model->find($id);

        if (is_null($model)) {
            return Redirect::route('admin.models.index');
        }

        return View::make('admin.models.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Model::$rules);

        if ($validation->passes()) {
            $model = $this->model->find($id);
            $model->update($input);

            return Redirect::route('admin.models.show', $id);
        }

        return Redirect::route('admin.models.edit', $id)
                        ->withInput()
                        ->withErrors($validation)
                        ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $this->model->find($id)->delete();

        return Redirect::route('admin.models.index');
    }


}
