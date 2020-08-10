<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
{
    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required',
            'deskripsi_proyek' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_deadline' => 'required',
            'status' => 'required',
            'manager_id' => 'required'
        ]);

        $query = DB::table('projects')->insert([
            'nama_proyek' => $request['nama_proyek'], 
            'deskripsi_proyek' => $request['deskripsi_proyek'],
            'tanggal_mulai' => $request['tanggal_mulai'], 
            'tanggal_deadline' => $request['tanggal_deadline'],
            'status' => $request['status'], 
            'manager_id' => $request['manager_id']
        ]);

        return redirect('/proyek')->with('success', 'proyekmu berhasil disimpan!');
    }

    public function index()
    {
        $projects = DB::table('projects')->get();

        return view('proyek.index', compact('projects'));
    }

    public function show($proyek_id)
    {
        $project = DB::table('projects')->where('id', $proyek_id)->first();

        return view('proyek.show', compact('project'));
    }

    public function edit($proyek_id)
    {
        $project = DB::table('projects')->where('id', $proyek_id)->first();

        return view('proyek.edit', compact('project'));
    }

    public function update($proyek_id, Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required',
            'deskripsi_proyek' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_deadline' => 'required',
            'status' => 'required',
            'manager_id' => 'required'
        ]);

        $query = DB::table('projects')->where('id', $proyek_id)->update([
            'nama_proyek' => $request['nama_proyek'], 
            'deskripsi_proyek' => $request['deskripsi_proyek'],
            'tanggal_mulai' => $request['tanggal_mulai'], 
            'tanggal_deadline' => $request['tanggal_deadline'],
            'status' => $request['status'], 
            'manager_id' => $request['manager_id']
        ]);

        return redirect('/proyek')->with('success', 'Berhasil mengubah proyek!');
    }

    public function destroy($proyek_id)
    {
        $query = DB::table('projects')->where('id', $proyek_id)->delete();

        return redirect('/proyek')->with('success', 'Berhasil menghapus proyek!');
    }
}
