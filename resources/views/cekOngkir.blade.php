<!DOCTYPE html>
<html>
    <head>
        <title>tes ongkir</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        
       <div class="container col-md-12">
           <div class="row justify-content">
               <br><br><br>
               <div class="card col-md-8">
                   <div class="card-header">
                       Cek Ongkir
                   </div>

                   <div class="card-body">

                   <!-- FORM SUBMIT DATA -->
                   <form action="/cekOngkir" class="form-horizontal" role="form" method="POST">
                       @csrf 
                       <div class="form-group-lg">

                           <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Provinsi Asal</label>
                                    <select name="province_origin" class="form-control">
                                        <option value="">--Provinces--</option>
                                        <!-- fetch data -->
                                        @foreach($provinces as $province => $value)
                                            <option value="{{$province}}"> {{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                           </div>

                           <div class="col-md-12">
                                <div class="form-group">                                  
                                    <div class="form-group">
                                        <label for="">Kota Asal</label>
                                        <select name="city_origin" class="form-control">
                                            <option>--Kota--</option>
                                        </select>
                                    </div>
                                </div>
                           </div>
        
                           <div class="col-md-12">
                                <div class="form-group">
                                    {{-- sebelumnya --}}
                                    {{-- <label for="">Provinsi Asal</label> --}}
                                    {{-- yang benar --}}
                                    <label for="">Provinsi Tujuan</label>
                                    <select name="province_destination" class="form-control">
                                        <option value="">--Provinces--</option>
                                        <!-- fetch data -->
                                        @foreach($provinces as $province => $value)
                                            <option value="{{$province}}"> {{$value}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="-form-group">
                                    {{-- sebelumnya --}}
                                    {{-- <label for="">Kota Asal</label> --}}
                                    {{-- yang benar --}}
                                    <label for="">Kota Tujuan</label>
                                    <select name="city_destination" class="form-control">
                                        <option>--Kota--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Kurir</label>
                                    <select name="courier" class="form-control">
                                        @foreach ($couriers as $courier => $value)
                                            <option value="{{$courier}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Berat (gr) </label>
                                    <input type="number" name="weight" class="form-control" value="1000">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card d-none ongkir">
                    <div class="card-body">
                        <ul class="list-group" id="ongkir"></ul>
                    </div>
                </div>
            </div>
        </div>
    
        @if($harga)
            <table class="w-full mt-5">
                <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">service</th>
                        <th class="px-4 py-3">description</th>
                        <th class="px-4 py-3">cost</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr class="text-gray-700" wire:loading wire:target="checkOngkir">
                        <td class="px-4 py-3 text-ms font-semibold border" colspan="4">Loading...</td>
                    </tr>
                    @php($no = 1)
                    @foreach ($harga[0]['costs'] as $item)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-ms font-semibold border">{{ $no++ }}</td>
                        <td class="px-4 py-3 text-ms font-semibold border">{{ $item['service'] }}</td>
                        <td class="px-4 py-3 text-ms font-semibold border">{{ $item['description'] }}</td>
                        <td class="px-4 py-3 text-ms font-semibold border">
                            <table class="text-left">
                                <tr>
                                    <th>Cost</th>
                                    <td>: Rp {{ $item['cost'][0]['value'] }}</td>
                                </tr>
                                <tr>
                                    <th>Etd</th>
                                    <td>: {{ $item['cost'][0]['etd'] }}</td>
                                </tr>
                                <tr>
                                    <th>Note</th>
                                    <td>: {{ $item['cost'][0]['note'] }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </body>

    <!-- required script -->

    {{-- sebelumnya --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}

    {{-- jangan pakai jquery yang slim --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function()
        {
            $('select[name="province_origin"]').on('change', function()
            {
                let provinceId = $(this).val();
                if(provinceId)
                {
                    $.ajax({ // sebelumnya jQuery.ajax({
                        url: '/province/'+ provinceId+ '/cities',
                        type:"GET",
                        dataType:"json",
                        success:function(data)
                        {
                            // sebelumnya
                            $('select[name="city_origin]').empty();
                            // yang benar
                            $('select[name="city_origin"]').empty();
                            $.each(data, function(key, value)
                            {
                                // sebelumnya
                                // $('select[name="city_origin"]').append('<option value=" '. key + '">' + value + '</option>' );
                                // penulisan lebih rapi
                                $('select[name="city_origin"]').append(`<option value="${key}">${value}</option>`);
                            });
                        },
                    });
                } 

                else 
                {
                    $('select[name="city_origin"]').empty();
                }
            });

            $('select[name="province_destination"]').on('change', function()
            {
                let provinceId = $(this).val();
                if(provinceId)
                {
                    $.ajax({ // sebelumnya jQuery.ajax({
                        url: '/province/'+ provinceId+ '/cities',
                        type:"GET",
                        dataType:"json",
                        success:function(data)
                        {
                            // sebelumnya
                            // $('select[name="city_destination]').empty();
                            // yang benar
                            $('select[name="city_destination"]').empty();
                            $.each(data, function(key, value){
                                // sebelumnya
                                // $('select[name="city_destination"]').append('<option value=">'. key + '">' + value + '</option>' );
                                // penulisan lebih rapi
                                $('select[name="city_destination"]').append(`<option value="${key}">${value}</option>`);

                            });
                        },
                    });
                } else {
                    $('select[name="city_destination"]').empty();
                }
            });


        });

        
    </script>

</html>