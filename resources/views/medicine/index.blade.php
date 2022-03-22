@extends('layout.conquere')

@section('content')
<h3 class="page-title">
			Daftar obat <small>daftar semua obat yang ada diapotik</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Medicine</a>
						<i class="fa fa-angle-right"></i>
					</li>
				</ul>
				<div class="page-toolbar">
					<!-- tempat action button -->
                 
				</div>
			</div>

<div class="container">
  <h2>Medicines</h2>
<table class="table">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Bentuk</th>
        <th>Formula</th>
        <th>Harga</th>
        <th>kategori</th>
        <th>Gambar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($result as $d)
      <tr>
        <td>{{$d->generic_name}}</td>
        <td>{{$d->form}}</td>
        <td>{{$d->restriction_formula}}</td>
        <td>{{$d->price}}</td>
        <td>{{$d->category->name}}</td>
        <td>
          <a href="#detail_{{$d->id}}" data-toggle="modal">
          <img src="{{asset('images/'.$d->image)}}" alt=""></a>
          <div class="modal fade" id="detail_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">{{$d->generic_name}} {{$d->form}}</h4>
                  </div>
                  <div class="modal-body">
                          <img src="{{asset('images/'.$d->image)}}" height='200px' />
                  </div><br>
                  {{$d->restriction_formula}}
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>
            </div>
          </div>

      
      
        </td>
        <td>
          <a class='btn btn-info' href="{{route('medicines.show',$d->id)}}"
             data-target="#show{{$d->id}}" data-toggle='modal'>detail</a>        
          <div class="modal fade" id="show{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
             <div class="modal-content">
               <!-- put animated gif here -->
               <img src="{{asset('assets/img/ajax-modal-loading.gif')}}" alt="">
             </div>
            </div>
          </div>
        </td>
        
      </tr>
      @endforeach
    </tbody>
  </table>

<div class="container">
  <h2>Daftar Obat</h2>
   <div class="row">
      @foreach($result as $d)
      <div class="col-md-3" style="text-align:center;border:1px solid #999;margin:5px;padding;5px;border-radius:10px;">
     <a href="/medicines/{{$d->id}}">
        <img src="{{asset('images/'.$d->image) }}"
           height="160px" /> <br>
           <b>{{$d->generic_name}}</b> <br>
            {{$d->form}}
          </a>

      </div>
      @endforeach
    </div>
</div>


</div>

@endsection