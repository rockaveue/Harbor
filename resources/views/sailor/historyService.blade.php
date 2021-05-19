{{-- B180910062 Dulguun --}}
@extends('layouts.admin')
@section('header')
    Үйлчилгээний түүх харуулах хэсэг
@endsection
@section('content')
@php
$location = 'http://127.0.0.1:8000/';
@endphp
@isset($history)
{{-- {{$history}} --}}
<div>
    <label for="" class="block text-gray-700 text-sm font-bold mb-2">Хайх</label>
    <select name="select" id="select" class="form-select mt-1 border rounded mb-2">
        <option selected value="id">ID</option>
        <option value="sailor_id">Далайчны дугаар</option>
        <option value="rank_id">Албан тушаал</option>
        <option value="vessel_id">Усан онгоц</option>
        <option value="sign_on_date">Эхэлсэн өдөр</option>
        <option value="sign_on_port">Гарсан боомт</option>
        <option value="sign_off_date">Ирсэн өдөр</option>
        <option value="sign_off_port">Ирсэн боомт</option>
        <option value="contract_period">Гэрээний хугацаа</option>
        <option value="contract_end_date">Гэрээ дуусах хугацаа</option>
    </select>
    <input type="text" name="search" id="search_id" class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>
<table id="mytable">
    <thead>
    <tr>
        <th onclick="sortTable('id')">#</th>
        <th onclick="sortTable('sailor_id')">Далайчны дугаар</th>
        <th onclick="sortTable('rank_id')">Албан тушаал</th>
        <th onclick="sortTable('vessel_id')">Усан онгоц</th>
        <th onclick="sortTable('sign_on_date')">Эхэлсэн өдөр</th>
        <th onclick="sortTable('sign_on_port')">Гарсан боомт </th>
        <th onclick="sortTable('sign_off_date')">Ирсэн өдөр </th>
        <th onclick="sortTable('sign_off_port')" >Ирсэн боомт</th>
        <th onclick="sortTable('contract_period')" >Гэрээний хугацаа</th>
        <th onclick="sortTable('contract_end_date')">Гэрээ дуусах хугацаа</th>
    </tr>
    </thead>
    <tbody id="body">
    @foreach ($history as $item)
        <tr onclick="window.location='{{$location}}sailors/{{$item->sailor_id}}';">
            <td>{{$item->id}}</td>
            <td>{{$item->sailor_id}}</td>
            <td>{{$item->rank_id }}</td>
            <td>{{$item->vessel_id }}</td>
            <td>{{$item->sign_on_date}}</td>
            <td>{{$item->sign_on_port}}</td>
            <td>{{($item->sign_off_date == null) ? 'Ирээгүй' : $item->sign_off_date}}</td>
            <td>{{($item->sign_off_port == null) ? 'Ирээгүй' : $item->sign_off_port}}</td>
            <td>{{$item->contract_period}}</td>
            <td>{{$item->contract_end_date}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endisset
<script>
    function sortTable(order){
        $.ajax({
            type: "POST",
            url: "/sortTable2",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                order: order,
            },
            success: function(data){
                var mydata = data['data'];
                var mytable = $('#mytable tbody')
                $("#body").empty();
                $(mydata).each(function(){
                    mytable.append("<tr onclick='window.location =" + '"http://127.0.0.1:8000/sailors/'+this['id']+'"'+"'><td>"+this['id']+"</td><td>"+this.sailor_id+
                        "</td><td>"+this.rank_id+"</td><td>"+this.vessel_id+
                        "</td><td>"+this.sign_on_date+"</td><td>"+this.sign_on_port+"</td><td>"+
                        this.sign_off_date+"</td><td>"+this.sign_off_port+"</td><td>"+
                        this.contract_period+"</td><td>"+this.contract_end_date+"</td>");
                });
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
                var mydata = data['data'];
                var mytable = $('#mytable tbody')
                $("#body").empty();
                $(mydata).each(function(){
                    mytable.append("<tr onclick='window.location =" + '"http://127.0.0.1:8000/sailors/'+this['id']+'"'+"'><td>"+this['id']+"</td><td>"+this.sailor_id+
                        "</td><td>"+this.rank_id+"</td><td>"+this.vessel_id+
                        "</td><td>"+this.sign_on_date+"</td><td>"+this.sign_on_port+"</td><td>"+
                        this.sign_off_date+"</td><td>"+this.sign_off_port+"</td><td>"+
                        this.contract_period+"</td><td>"+this.contract_end_date+"</td>");
                });
            }
        });
    });
</script>
@endsection