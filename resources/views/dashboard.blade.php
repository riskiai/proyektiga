<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
                {{-- <x-welcome /> --}}






                <div class="mb-8 grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">

                    @foreach ($profile as $item )
                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{route('dashboard.profile.edit', $item->id)}}">
                            <img class="rounded-t-lg" src="{{ $item->url ? Storage::url($item->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$item->title}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! Str::limit($item->body,200) !!}</p>
                            <a href="{{route('dashboard.profile.edit', $item->id)}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                               Edit Profile Desa
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </div>

                    @endforeach


                    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 dark:border-gray-700 dark:bg-gray-800 xl:mb-0">
                      <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Komentar Terbaru</h3>
                        <a href="{{ route('dashboard.comment.index') }}" class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                            lihat semua komentar
                          </a>
                      </div>
                      <!-- Chat -->

                      @foreach ($komentar as $item )
                      <form class="overflow-y-auto lg:max-h-[60rem] 2xl:max-h-fit">
                        <article class="mb-5">
                          <footer class="flex items-center justify-between mb-2">
                              <div class="flex items-center">
                                  <p class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white"><img class="w-6 h-6 mr-2 rounded-full" src="{{url('frontend/assets/image/user.png')}}"alt="{{$item->name}}">{{$item->name}}</p>
                                  <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022"> {{$item->created_at}}</time></p>
                              </div>
                          </footer>
                          <p class="mb-2 text-gray-900 dark:text-white">
                            {{$item->body}}
                          </p>
                        </article>
                      </form>
                      @endforeach
                    </div>


                </div>


                {{-- <div class= "max-w-sm max-h-28 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="w-full">
                          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">New products</h3>
                          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">2,340</span>
                          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
                              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                              </svg>
                              12.5%
                            </span>
                            Since last month
                          </p>
                        </div>
                      </div>
                </div> --}}
                <div class="p-4 mb-8 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 dark:border-gray-700 dark:bg-gray-800 xl:mb-0">
                    <div class="container">
                      <h2 class="text-center"> Statistik Hasil penjualan Asap Cair</h2>
                      <canvas id="myChart">

                      </canvas>
                    </div>
                </div>


                    <div class=" mt-6 mb-8 p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <!-- Card header -->
                        <div class="items-center justify-between lg:flex">
                          <div class="mb-4 lg:mb-0">
                            <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Transaksi Terbaru</h3>
                          </div>

                        </div>

                        <div class="flex flex-col mt-6">
                            <div class="overflow-x-auto rounded-lg">
                              <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden shadow sm:rounded-lg">
                                  <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                      <tr>
                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                          Tanggal
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                          Nama Produk
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                          Terjual
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                          Harga satuan
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                          Sub total
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800">
                                        @foreach ($transaksi as $item )

                                      <tr>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->tgl_transaksi }}
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $item->name }}                                        </td>
                                        <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$item->terjual}}
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{$item->price}}
                                        </td>
                                        <td class="inline-flex items-center p-4 space-x-2 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Rp{{ $item->terjual*$item->price }}
                                        </td>
                                      </tr>

                                      @endforeach

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>


                           <!-- Card Footer -->
                    <div class="flex items-center justify-between pt-3 sm:pt-6">
                        <div class="flex-shrink-0">
                        <a href="{{ route('dashboard.statistik.index') }}" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                        Lihat selengkapnya
                            <svg class="w-4 h-4 ml-1 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        </div>
                    </div>
                    </div>



            </div>
            <x-slot name="script">
                <script>
                    var labels =  {{ Js::from($labels) }};
                    var users =  {{ Js::from($data) }};
                    const data = {
                    labels: labels,
                    datasets: [{

                        label: 'Total Penjualan Asap Cair',

                        backgroundColor: 'rgba(69,176,210,255)',

                        borderColor: 'rgb(255, 99, 132)',

                        data: users,

                    },]};

                    const config = {

                    type: 'bar',

                    data: data,

                    options: {}

                    };

                    const myChart = new Chart(

                    document.getElementById('myChart'),

                    config

            );
                  </script>
            </x-slot>

</x-app-layout>
