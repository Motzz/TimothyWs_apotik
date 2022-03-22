@extends('layout.conquere')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th>Nama</th>
        <td>Medicines</td>
      </tr>
    </thead>
    <tbody>
   @foreach($result as $d)
      <tr>
        <td>{{ $d->name }}</td>
        <td>{{ $d->description }}</td>
        <td>
          @foreach ($d->medicines as $m)
            {{$m->generic_name}}
          @endforeach
            <a class='btn btn-xs btn-info'  data-toggle='modal' data-target='#myModal'
                onclick='showProducts({{ $d->id }})'>Detail</a><!--button detail-->
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
      <div class="modal-content" >
        <div class="modal-header">
          <h4 class="modal-title">Detail obat</h4>
        </div>
        <div class="modal-body" id="showproducts">
          <!--loading animated gif can put here-->
          <img src="{{asset('assets/img/ajax-modal-loading.gif')}}" alt="">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
function showProducts(category_id)
{
  $.ajax({
    type:'GET',
    url:'{{url("report/listmedicine/")}}'+"/"+category_id,
    data:{'_token':'<?php echo csrf_token() ?>',
          'category_id':category_id
         },
    success: function(data){
       $('#showproducts').html(data/*.msg*/)
    }
  });
}
</script>
@endsection


