@extends('layouts.app')

@section('content')


  <div class="d-flex justify-content-end mb-2">
      <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
  </div>
  <div class="card card-default">
      <div class="card-header">Categories</div>
      <div class="card-body">
          @if ($categories->count() > 0)
            <table class="table">
              <thead>
                  <th>Name</th>
                  <th>Posts Count</th>
                  <th></th>
              </thead>

              <tbody>
                  @foreach($categories as $category)
                      <tr>
                          <td>
                              {{ $category->name }}
                          </td>
                          <td>{{ $category->posts->count() }}</td>
                          <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Delete</button> 
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>  
          @else
              <h3 class="text-center">No Categories Yet</h3>
          @endif
          
          <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
              <form action="" method="POST" id="deleteModalForm">
                @csrf
                @method('DELETE')
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Categories</h5>
                      <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure to delete this category?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-danger">Yes, Delete</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"  id="closeModal">No, Go Back</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
      </div>
  </div>


@endsection

@section('script')
  <script>
    function handleDelete(id){
      var form = document.getElementById('deleteModalForm')
      form.action = "/categories/" + id;
      $('#deleteModal').modal('show');
    }
  </script>
@endsection
