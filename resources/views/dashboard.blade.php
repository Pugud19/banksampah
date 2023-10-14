<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="hightchart"></div>

                    <script>
                        $(function() {
                            var dataSampah = @json($sampahData);

                            $("hightchart").highcharts({
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Data Berat Sampah Terkumpul'
                                },
                                xAxis: {
                                    categories: ['2023']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Rate'
                                    }
                                },
                                series: [{
                                    name: 'Sampah',
                                    data: dataSampah
                                }],
                                responsive: {
                                        rules: [{
                                            condition: {
                                                maxWidth: 500
                                            },
                                            chartOptions: {
                                                legend: {
                                                    layout: 'horizontal',
                                                    align: 'center',
                                                    verticalAlign: 'bottom'
                                                }
                                            }
                                        }]
                                    }
                            });
                        });
                    </script>

                <div class="flex justify-center">
                    <table class="table-fixed">
                        <thead>
                          <tr class="px-10">
                            <th>id</th>
                            <th class="py-2 px-3">Jenis Sampah</th>
                            <th class="py-2 px-3">Berat per kg</th>
                            <th class="py-2 px-3">Harga Satuan per kg</th>
                            <th class="py-2 px-3">Total Harga</th>
                            <th class="py-2 px-3">Tanggal Di Simpan</th>
                            <th class="py-2 px-3">Settings</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($sampahs as $sp)
                          <tr>
                            <td class="py-2 px-3">{{$sp->id}}</td>
                            <td class="py-2 px-3">{{$sp->jenis_sampah}}</td>
                            <td class="py-2 px-3">{{$sp->berat}}</td>
                            <td class="py-2 px-3">Rp.{{number_format($sp->harga)}}</td>
                            <td class="py-2 px-3">Rp.{{number_format($sp->total_harga)}}</td>
                            <td class="py-2 px-3">{{$sp->created_at}}</td>
                            <td class="py-2 px-3">
                            <a href="/sampahs-delete/{{$sp->id}}" class="border py-1 px-2 rounded bg-red-700 text-white" title="Hapus data"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                            </td>

                        </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
