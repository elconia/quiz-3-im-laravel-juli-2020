@extends('layouts.master')

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Daftar Proyek</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    @if (session('success'))
        <div class="alert alert-success">
          {{session('success')}}
        </div>
    @endif
    <a href="/pertanyaan/create" class="btn btn-primary mb-3">Buat Proyek Baru</a>
    <table class="table table-bordered">
      <thead>                  
        <tr>
          <th>Nama Proyek</th>
          <th>Deskripsi Proyek</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Data from database -->
        @forelse ($projects as $key => $project)
          <tr>
            <td>{{ $project->nama_proyek }}</td>
            <td>{{ $project->deskripsi_proyek }}</td>
            <td style="display: flex;">
              <a href="/pertanyaan/{{ $project->id }}" class="btn btn-info btn-sm">show</a>
              <a href="/pertanyaan/{{ $project->id }}/edit" class="btn btn-default btn-sm">edit</a>
              <form action="/pertanyaan/{{ $project->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="delete" class="btn btn-danger btn-sm">
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" align="center">Belum ada proyek</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection