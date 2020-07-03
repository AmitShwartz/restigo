<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <title>clients</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <!-- Modal add client -->
  <div class="modal fade" id="client_add_model" tabindex="-1" role="dialog" aria-labelledby="client_add_modelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="client_add_modelLabel">Add client</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{csrf_field()}}
          <form id="add_client_form">
            <div class="form-group">
              <label for="add_name">Name</label>
              <input type="text" name="name" class="form-control" id="add_name">
            </div>
            <div class="form-group ">
                <label for="add_type">Type</label>
                <select name="type" class="custom-select" id="add_type">
                    <option value='restaurant' selected>restaurant</option>
                    <option value='coffee house'>coffee house</option>
                    <option value='bar'>bar</option>
                </select>
              </div>
            <div class="form-group ">
              <label for="add_diversity">Diversity</label>
              <select name="diversity" class="custom-select" id="add_diversity">
                <option selected>Choose...</option>
                  @foreach ($diversities as $diversity)
                  <option value={{$diversity->name}}>{{$diversity->name}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="enable" value=1 class="form-check-input" id="add_enable">
                <label class="form-check-label" for="add_enable">Enable</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save New client</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal add client -->

   <!-- Modal edit client -->
   <div class="modal fade" id="client_edit_model" tabindex="-1" role="dialog" aria-labelledby="client_edit_modelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="client_edit_modelLabel">Edit client</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{csrf_field()}}
            {{method_field('PUT')}}
          <form id="edit_client_form">
              <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="edit_name">Name</label>
              <input type="text" name="name" class="form-control" id="edit_name">
            </div>
            <div class="form-group ">
                <label for="edit_type">Type</label>
                <select name="type" class="custom-select" id="edit_type">
                    <option value='restaurant'>restaurant</option>
                    <option value='coffee house'>coffee house</option>
                    <option value='bar'>bar</option>
                </select>
              </div>
            <div class="form-group ">
              <label for="edit_diversity">Diversity</label>
              <select name="diversity" class="custom-select" id="edit_diversity">
                  @foreach ($diversities as $diversity)
                  <option value={{$diversity->name}}>{{$diversity->name}}</option>
                  @endforeach

              </select>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="enable" value=1 class="form-check-input" id="edit_enable">
                <label class="form-check-label" for="edit_enable">Enable</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save client</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal edit client -->

<!-- start Modal delete client -->
  <div class="modal fade" tabindex="-1" role="dialog" id="client_delete_model" aria-labelledby="client_delete_modelLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="client_delete_modelLabel">Delete client</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="delete_client_form">

        <div class="modal-body">
            {{csrf_field()}}
            {{method_field('delete')}}
          <p>Are you sure you want to Delete this Data?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- start Modal delet client -->

<!-- clients Page -->
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <h1 class="">clients management</h1>
      </div>
      <div class="row>">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Name</th>
              <th scope="col">Type</th>
              <th scope="col">Diversity</th>
              <th scope="col">Enable</th>
              <th scope="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#client_add_model">
                  add client
                </button>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($clients as $client)
              <tr>
              <td >{{$client->id}}</td>
              <td>{{$client->name}}</td>
              <td>{{$client->type}}</td>
              <td>{{$client->diversity}}</td>
              <td>{{$client->enable}}</td>
              <td>
                <a href="#" class="btn btn-warning editbtn">Edit</a>
              <a href="#" class="btn btn-danger deletebtn">Delete</a>
            </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      $(".deletebtn").on('click', function() {
        $("#client_delete_model").modal('show')
        $tr=$(this).closest('tr');

        const data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        $('#id').val(data[0])
      })

      $("#delete_client_form").on('submit', function(e) {
        e.preventDefault()

        var id = $('#id').val()
        $.ajax({
          type: "delete",
          url: "/api/clients/"+id,
          data: $('#delete_client_form').serialize(),
          success: function(res) {
            console.log(res)
            $('#delete_client_model').modal('hide')
            confirm('client Deleted from database')?window.location.reload():''
          },
          error: function(err) {
            console.log(err)
            alert("client not deleted")
          }
        })
      })
    })
  </script>


 <script type="text/javascript">
    $(document).ready(function() {
      $(".editbtn").on('click', function() {
        $("#client_edit_model").modal('show')
        $tr=$(this).closest('tr');

        const data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data)
        $('#id').val(data[0])
        $('#edit_name').val(data[1])
        $('#edit_type').val(data[2])
        $('#edit_diversity').val(data[3])
        if(Number(data[4])) $('#edit_enable').prop('checked', true)
      })

      $("#edit_client_form").on('submit', function(e) {
        e.preventDefault()

        var id = $('#id').val()
        console.log($('#edit_client_form').serialize())

        $.ajax({
          type: "PUT",
          url: "/api/clients/"+id,
          data: $('#edit_client_form').serialize(),
          success: function(res) {
            console.log(res)
            $('#edit_client_model').modal('hide')
            confirm('client saved in database')?window.location.reload():''
          },
          error: function(err) {
            console.log(err)
            alert("client not saved")
          }
        })
      })
    })
  </script>

<script type="text/javascript">
    $(document).ready(function() {
      $("#add_client_form").on('submit', function(e) {
        e.preventDefault()

        console.log($('#add_client_form').serialize())
        $.ajax({
          type: "POST",
          url: "/api/clients",
          data: $('#add_client_form').serialize(),
          success: function(res) {
            console.log(res)
            $('#add_client_model').modal('hide')
            confirm('client saved in database')?window.location.reload():''
          },
          error: function(err) {
            console.log(err)
            alert("client not saved")
          }
        })
      })
    })
  </script>

</body>

</html>
