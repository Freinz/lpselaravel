</div>

    <h1 class="cat_label">Add Role</h1>

    <form action="{{url('role_add')}}" method="Post">

      @csrf

      <span style="padding-right: 15px;">
      <label for="">Role Name</label>
      <input type="text" name="role" required>
      </span>

      <input class="btn btn-primary" type="submit" value="Add Role">
    </form>

    <div>

    <table class="center">

    <tr>
      <th>Role Name</th>
      <th>Action</th>
    </tr>

    @foreach($data as $data)
    <tr>
      <td>{{$data->role_user}}</td>
      <td>
        <a  class="btn btn-info" href="{{url('role_read', $data->id)}}">Update</a>

        <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('role_delete', $data->id)}}">Delete</a>
      </td>
    
  
    </tr>

    
    @endforeach
  
    
    </table>

    </div>

</div>
