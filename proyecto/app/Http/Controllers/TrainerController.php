<?php

namespace proyecto\Http\Controllers;
use proyecto\Trainer;
use Illuminate\Http\Request;
use proyecto\Http\Requests\StoreTrainerRequest;
class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('user' , 'admin');

        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna la vista create que se encuentra de la carpeta trainers
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {
       
        //Se instancia la variable
        $trainer = new Trainer();
        
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $trainer->avatar= $name;
            $file->move(public_path().'/images/', $name);
            
        }

        $trainer->name = $request->input('name');
        $trainer->slug = $request->input('slug');
        $trainer->save();
       // return 'Saved';

        return redirect()->route('trainers.index');
        //return $request->input('name');
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //Se retorna el nombre del entrenador mediante el slug
       

        //$trainer = Trainer::where('slug','=',$slug)->firstOrFail();
        //$trainer = Trainer::find($id);
        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        //Retorna una vista llamada edit
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        //Actualiza la infomracion del entrenador
        $trainer->fill($request->except('avatar'));
        //Revisa se hay la existencia de un elemento llamado avatar
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            //Se le asigna un nombre unico para evitar sobreescritura
            $name = time().$file->getClientOriginalName();
            $trainer->avatar=$name;
            //Mueve el archibo a la carpeta images
            $file->move(public_path().'/images/', $name);
            
        }
        //Guarda la informacion
        $trainer->save();
        return redirect()->route('trainers.show', [$trainer])->with('status', 'Entrenador actualizado correctamente');
        

        //return 'Informacion actualizada';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $file_path = public_path(). '/images/' . $trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();
          return redirect()->route('trainers.index');
        
    }
}
