@extends('home')

@section('content')
<h1 class="text-red-700 text-7xl text-center">Selamat Datang di Bank Sampah</h1>
<div class="flex justify-center">
<table class="table-fixed">
    <thead>
      <tr class="px-10">
        <th>id</th>
        <th class="py-2 px-3">Jenis Sampah</th>
        <th class="py-2 px-3">Berat per kg</th>
        <th class="py-2 px-3">Harga</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($sampahs as $sp)
      <tr>
        <td class="py-2 px-3">{{$sp->id}}</td>
        <td class="py-2 px-3">{{$sp->jenis_sampah}}</td>
        <td class="py-2 px-3">{{$sp->berat}}</td>
        <td class="py-2 px-3">Rp.{{number_format($sp->total_harga)}}</td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>
<div class="flex justify-end">
    <a href="{{ route('sampahs.create')}}" class="border py2 px-2 my-3 rounded-full bg-blue-700 text-white">Tambah Sampah</a>
</div>
@endsection
