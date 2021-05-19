{{-- B180910062 Dulguun --}}
@extends('layouts.admin')
@section('header')
    <h1>Идэвхтэй ажлын байрууд</h1>
@endsection
@section('content')
    @php
    $location = 'http://127.0.0.1:8000/';
    $myvessel = json_decode($vessels);
    $myrank = json_decode($ranks);
    $mycompany = json_decode($companies)
    @endphp
    <div>
        <label for="" class="block text-gray-700 text-sm font-bold mb-2">Хайх</label>
        <select name="select" id="select" class="form-select mt-1 border rounded mb-2">
            <option selected value="id">ID</option>
            <option value="company_id">Company</option>
            <option value="rank_id">Rank</option>
            <option value="vessel_id">Усан онгоц</option>
            <option value="contract_period">Хугацаа(сараар)</option>
            <option value="contract_end_date">Сүүлийн хугацаа</option>
            <option value="state">Төлөв</option>
        </select>
        <input type="text" name="search" id="search_id"  class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <table id="mytable">
        <thead>
        <tr>
            <th onclick="sortTable('id')">#</th>
            <th onclick="sortTable('company_id')">Company</th>
            <th onclick="sortTable('rank_id')">Rank</th>
            <th onclick="sortTable('vessel_id')">Усан онгоц</th>
            <th onclick="sortTable('contract_period')">Хугацаа(сараар)</th>
            <th onclick="sortTable('contract_end_date')">Сүүлийн хугацаа</th>
            <th onclick="sortTable('state')">Төлөв</th>
        </tr>
        </thead>
        <tbody id="body">
        @foreach ($jobs as $item)
        
        @php

            $rank = $myrank[$item->rank_id - 1]->rank_name;
            // print_r($myrank[$item->rank_id - 1]);
            // print_r($item->vessel_id)
            $vessel = $myvessel[$item->vessel_id-1]->vessel_name;
            $company = $mycompany[$item->company_id-2]->company_name;
            // print_r($mycompany);
        @endphp
            <tr onclick="window.location='{{$location}}ajluud/{{$item->id}}';">
                <td>{{$item->id}}</td>
                <td>{{$company}}</td>
                <td>{{$rank}}</td>
                <td>{{$vessel}}</td>
                <td>{{$item->contract_period}}</td>
                <td>{{$item->contract_end_date}}</td>
                <td>{{($item->state == 1)?'Идэвхтэй':'Идэвхгүй'}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    <script>
        function sortTable(order){
            $.ajax({
                type: "POST",
                url: "/sortTable3",
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
                    var vessel = data['vessel'];
                    $("#body").empty();
                    $(mydata).each(function(){
                        //  console.log(this['id']);
                        // console.log(this.rank_id);
                        // console.log(myranks[this.rank_id]);
                        mytable.append("<tr onclick='window.location =" + '"http://127.0.0.1:8000/ajluud/'+this['id']+'"'+"'><td>"+this['id']+"</td><td>"+this.company_id+"</td><td>"+myranks[this.rank_id-1]['rank_name']+"</td><td>"+vessel[this.vessel_id-1]['vessel_name']+"</td><td>"+
                            this.contract_period+"</td><td>"+this.contract_end_date+"</td><td>"+this.state+"</td>");
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
                    var vessel = data['vessel'];
                    var company = data['company'];
                    $("#body").empty();
                    $(mydata).each(function(){
                        mytable.append("<tr onclick='window.location =" + '"http://127.0.0.1:8000/ajluud/'+this['id']+'"'+"'><td>"+this['id']+"</td><td>"+company[this.company_id - 2]['company_name']+"</td><td>"+myranks[this.rank_id-1]['rank_name']+"</td><td>"+vessel[this.vessel_id-1]['vessel_name']+"</td><td>"+
                            this.contract_period+"</td><td>"+this.contract_end_date+"</td><td>"+this.state+"</td>");
                    });
                    // $(data)
                }
            });
        });
    </script>
@endsection