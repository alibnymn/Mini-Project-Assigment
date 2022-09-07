<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Client;

class ProjectController extends Controller
{
    public function data()
    {
        $project = Project::all();
        return view('project.data', compact('project'));
    }

    

    public function add()
    {
        $client = Client::all();

        return view('project.add', compact('client'));
    }

    public function store(Request $request){

        $request->validate([
            'project_name' => 'required|min:2',
            'client_id' => 'required',
        ]);

        $project_name = $request->project_name;
        $client_id = $request->client_id;
        $project_start = $request->project_start;
        $project_end = $request->project_end;
        $project_status = $request ->project_status;

       
        DB::table('tb_m_project')->insert([
            'project_name'=>$project_name,
            'client_id'=>$client_id,
            'project_start'=>$project_start,
            'project_end'=>$project_end,
            'project_status'=>$project_status,
        ]);

        return redirect('project')->with('status', 'Data Project berhasil ditambah');

    }

    public function edit($id){
        $project = Project::all()->where('project_id',$id)->first();
        $client = Client::all();

        return view('project.edit',compact('project','client'));
    }

    public function update(Request $request, project $project)
    {
        $request->validate([
            'project_name' => 'required|min:2',
        ]);

        $project->project_name = $request->project_name;
        $project->client_id = $request->client_id;
        $project->project_start = $request->project_start;
        $project->project_end = $request->project_end;
        $project->project_status = $request ->project_status;

        return redirect('project')->with('status', 'Data Project berhasil diupdate');
    } 

    public function deleteAll(Request $request){
      
        $ids = $request->get('ids');
        DB::table("tb_m_project")->whereIn('project_id', explode(',', $ids))->delete();

        return response ()->json(['success'=>"Delete Project Berhasil dihapus."]);
    }

    public function cari(Request $request){

        $cari = $request->cari;
        
        $project = DB::table('tb_m_project')->where('project_name','like',"%".$cari."%")->paginate();

        return view('project.data', compact('project'));


    }
  

}