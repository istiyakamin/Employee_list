<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>


<table id="customers">
  <tr>
    <th>Serial</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Phone</th>
  </tr>
  @foreach($data as $singleData)
  <tr>
  	
    <td>{{$serial++}}</td>
    <td>{{$singleData->name}}</td>
    <td>{{$singleData->email}}</td>
    <td>{{$singleData->address}}</td>
    <td>{{$singleData->phone}}</td>
  </tr>
  @endforeach
</table>