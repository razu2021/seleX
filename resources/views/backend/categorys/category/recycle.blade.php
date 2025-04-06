@extends('layouts.adminmaster')
@section('admin_contents')

<div>
    <div class="card">
        <div class="card-body">
            <select name="bulk-action" id="bulk-action-select" class="form-control">
                <option value="" disabled>select</option>
                <option value="delete">Delete</option>
                <option value="archive">Archive </option>
                <option value="active">Active</option>
            </select>
            <button class="btn btn-success mt-4" id="bulk-apply-button">Apply Action</button>
            <table class="table">
                <thead>
                  <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($all as $data)
                    <tr>
                        <td> <input type="checkbox" value="{{$data->id}}" data-bulk-select-row>  </td>
                        <td scope="row">{{$data->id}}</td>
                        <td>{{$data->category_name}}</td>
                        <td>{{$data->category_title}}</td>
                        <td>{{$data->category_des}}</td>
                    </tr>
                    @endforeach
                 
                 
                </tbody>
              </table>

        </div>
    </div>
</div>



<script>
    const bulkActionUrl = "{{ route('category.bulkAction') }}";
    const csrfToken = "{{ csrf_token() }}";
</script>



@endsection 