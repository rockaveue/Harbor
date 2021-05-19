{{-- B180910044 Battushig --}}
@extends('layouts.admin')
@section('header')
    Далайчдын мэдээлэл
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
@php
    $location = 'http://127.0.0.1:8000/';
    $starttime = microtime(true);
    $myrank = json_decode($ranks);
@endphp
    @isset($sailors)
        <div>
            {{-- <i class="fas fa-sort"></i>
            <i class="fas fa-camera" style="font-size: 20px; width: 10px"></i> --}}
            <label for="" class="block text-gray-700 text-sm font-bold mb-2">Хайх</label>
            <select name="select" id="select" class="form-select mt-1 border rounded mb-2">
                <option selected value="id">ID</option>
                <option value="job_status">Төлөв</option>
                <option value="sailor_name">Нэр</option>
                <option value="rank_id">Тушаал</option>
                <option value="date_of_birth">Төрсөн огноо</option>
                <option value="maritial_status">Гэрлэлт</option>
                <option value="address">Хаяг</option>
                <option value="height">Өндөр</option>
                <option value="weight">Жин</option>
                <option value="shoe_size">Гутлын размер</option>
                <option value="blood_type">Цусны төрөл</option>
            </select>
            <input type="text" name="search" id="search_id" class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <table id="mytable">
            <thead>
            <tr>
                <th onclick="sortTable('id')">
                    #<img src="{{url('/pic/caret-down.png')}}" style="width: 1vh; filter:invert(1);" alt="Image"/>
                </th>
                <th onclick="sortTable('job_status')">Төлөв</th>
                <th onclick="sortTable('sailor_name')">Нэр</th>
                <th onclick="sortTable('rank_id')">Тушаал</th>
                <th onclick="sortTable('date_of_birth')">Төрсөн огноо</th>
                <th onclick="sortTable('maritial_status')">Гэрлэлт</th>
                <th onclick="sortTable('address')">Хаяг</th>
                <th onclick="sortTable('height')">Өндөр</th>
                <th onclick="sortTable('weight')">Жин</th>
                <th onclick="sortTable('shoe_size')">Гутлын размер</th>
                <th onclick="sortTable('blood_type')">Цусны төрөл</th>
            </tr></thead>
            <tbody id="body">
            @foreach ($sailors as $item)
            @php
                $rank = $myrank[$item->rank_id - 1]->rank_name;
                
            @endphp
                <tr onclick="window.location = '{{$location}}sailors/{{$item->id}}'">
                    <td>{{$item->id}}</td>
                    <td>{{$item->job_status}}</td>
                    <td>{{$item->sailor_name}}</td>
                    <td>{{$rank}}</td>
                    <td>{{$item->date_of_birth}}</td>
                    <td>{{$item->maritial_status}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->height}}</td>
                    <td>{{$item->weight}}</td>
                    <td>{{$item->shoe_size}}</td>
                    <td>{{$item->blood_type}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @endisset
    <script>
        function sortTable(order){
            $.ajax({
                type: "POST",
                url: "/sortTable",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    order: order
                },
                success: function(data){
                    // console.log(data);
                    var mydata = data['data'];
                    var mytable = $('#mytable tbody')
                    var myranks = data['ranks'];
                    $("#body").empty();
                    $(mydata).each(function(){
                        // console.log(this);
                        // console.log(this.rank_id);
                        // console.log(myranks[this.rank_id]);
                        mytable.append("<tr onclick='window.location =" + '"http://127.0.0.1:8000/sailors/'+this['id']+'"'+"'><td>"+this['id']+"</td><td>"+this.job_status+"</td><td>"+this.sailor_name+"</td><td>"+myranks[this.rank_id-1]['rank_name']+"</td><td>"+this.date_of_birth+"</td><td>"+this.maritial_status+"</td><td>"+this.address+"</td><td>"+this.height+"</td><td>"+this.weight+"</td><td>"+this.shoe_size+"</td><td>"+this.blood_type+"</td>");
                    });
                    // $(data)
                }
            });
        }
        $(document).on('keyup', '#search_id', function(){
            var query = $('#search_id').val();
            var selected = $('#select').find(":selected").val();
            console.log(query);
            $.ajax({
                type: "POST",
                url: "",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    mydata: query,
                    selected: selected
                },
                success: function(data){
                    // console.log(data);
                    var mydata = data['data'];
                    var mytable = $('#mytable tbody')
                    var myranks = data['ranks'];
                    $("#body").empty();
                    $(mydata).each(function(){
                        // console.log(this);
                        // console.log(this.rank_id);
                        // console.log(myranks[this.rank_id]);
                        mytable.append("<tr onclick='window.location =" + '"http://127.0.0.1:8000/sailors/'+this['id']+'"'+"'><td>"+this['id']+"</td><td>"+this.job_status+"</td><td>"+this.sailor_name+"</td><td>"+myranks[this.rank_id-1]['rank_name']+"</td><td>"+this.date_of_birth+"</td><td>"+this.maritial_status+"</td><td>"+this.address+"</td><td>"+this.height+"</td><td>"+this.weight+"</td><td>"+this.shoe_size+"</td><td>"+this.blood_type+"</td>");
                    });
                    // $(data)
                }
            });
        });
    </script>
    @php
         // Top of page
        // Code
        $endtime = microtime(true); // Bottom of page

        // printf("Page loaded in %f seconds", $endtime - $starttime );
        function debug_to_console($data) {
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);

            echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
        }
        debug_to_console($endtime-$starttime);
    @endphp
@endsection