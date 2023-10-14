@extends('home')

@section('content')
<div class="content-center">
    <div class="text-center my-2">
        @if ($errors->any())
        <div class="text-red-500">
            <strong>Whoops!</strong> Ada sesuatu yang salah dengan data yang kamu input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <div class="selection:bg-fuchsia-300 selection:text-fuchsia-900">
        <p>
          untuk menentukan total harga yang akan diberikan maka anda harus memasukan satuan harga per kg kedalam inputan harga. berikut merupakan
          list harga untuk beberapa <em>jenis sampah</em> yang ada:
        </p>
            <ul role="list" class="marker:text-sky-200 list-disc flex justify-around pl-5 space-y-3">
                <li class="mt-3">kertas = 800</li>
                <li>Plastik = 1500</li>
                <li>logam = 2300</li>
                <li>kaca = 2300</li>
                <li>dan lain-lain = 800</li>
              </ul>
      </div>

    <form class="my-5 text-center" action="{{ route('sampahs.store')}}" method="post">
        @csrf
        <label class="block">
        <span class="block text-sm font-medium text-slate-700">jenis sampah</span>
        <input type="text" class="border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" name="jenis_sampah" id="jenis_sampah"/>
        <p class="mt-2 opacity-50 contrast-more:opacity-100 text-blue-600 text-sm">
          Masukkan Jenis sampah
        </p>
      </label>
      <label class="block">
        <span class="block text-sm font-medium text-slate-700">Berat</span>
        <input type="text" class="border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" name="berat" id="berat"/>
        <p class="mt-2 opacity-50 contrast-more:opacity-100 text-blue-600 text-sm">
          Masukkan Berat per kg
        </p>
      </label>
      <label class="block">
        <span class="block text-sm font-medium text-slate-700">Harga</span>
        <input type="text" class="border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" name="harga" id="harga"/>
        <p class="mt-2 opacity-50 contrast-more:opacity-100 text-blue-600 text-sm">
          Masukkan harga
        </p>
      </label>
        <div class="flex justify-center">
            <button type="submit" name="proses" class="border py2 px-2 my-3 rounded-full bg-blue-400 text-white">submit</button>
        </div>
    </form>
</div>
@endsection
