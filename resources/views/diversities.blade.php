<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <title>diversities</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <!-- Modal add diversity -->
  <div class="modal fade" id="diversity_add_model" tabindex="-1" role="dialog" aria-labelledby="diversity_add_modelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="diversity_add_modelLabel">Add diversity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{csrf_field()}}
          <form id="add_diversity_form">
            <div class="form-group">
              <label for="add_name">Name</label>
              <input type="text" name="name" class="form-control" id="add_name">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="enable" value=1 class="form-check-input" id="add_enable">
                <label class="form-check-label" for="add_enable">Enable</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save New diversity</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal add diversity -->

   <!-- Modal edit diversity -->
   <div class="modal fade" id="diversity_edit_model" tabindex="-1" role="dialog" aria-labelledby="diversity_edit_modelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="diversity_edit_modelLabel">Edit diversity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{csrf_field()}}
            {{method_field('PUT')}}
          <form id="edit_diversity_form">
              <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="edit_name">Name</label>
              <input type="text" name="name" class="form-control" id="edit_name">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="enable" value=1 class="form-check-input" id="edit_enable">
                <label class="form-check-label" for="edit_enable">Enable</label>
              </div>
              <div id="clientsList">
              </div>
              <div id="itemsList">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save diversity</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal edit diversity -->

<!-- start Modal delete diversity -->
  <div class="modal fade" tabindex="-1" role="dialog" id="diversity_delete_model" aria-labelledby="diversity_delete_modelLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="diversity_delete_modelLabel">Delete diversity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="delete_diversity_form">

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
<!-- start Modal delet diversity -->

<!-- diversities Page -->
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <h1 class="">diversities management</h1>
      </div>
      <div class="row>">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Name</th>
              <th scope="col">Total Items</th>
              <th scope="col">Total Clients</th>
              <th scope="col">Enable</th>
              <th scope="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#diversity_add_model">
                  add diversity
                </button>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($diversities as $diversity)
              <tr>
              <td >{{$diversity->id}}</td>
              <td>{{$diversity->name}}</td>
              <td>{{$diversity->items_count}}</td>
              <td>{{$diversity->clients_count}}</td>
              <td>{{$diversity->enable}}</td>
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
        $("#diversity_delete_model").modal('show')
        $tr=$(this).closest('tr');

        const data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        $('#id').val(data[0])
      })

      $("#delete_diversity_form").on('submit', function(e) {
        e.preventDefault()

        var id = $('#id').val()
        $.ajax({
          type: "delete",
          url: "/api/diversities/"+id,
          data: $('#delete_diversity_form').serialize(),
          success: function(res) {
            console.log(res)
            $('#delete_diversity_model').modal('hide')
            confirm('diversity Deleted from database')?window.location.reload():''
          },
          error: function(err) {
            console.log(err)
            alert("diversity not deleted")
          }
        })
      })
    })
  </script>


 <script type="text/javascript">

function createField(fieldData) {
        var fieldTemplate = [
            '<div class="form-group">',
            '<lable id>',
            fieldData.name || 'No name provided',
            '</lable>',
            '</div>'
        ];
        // a jQuery node
        return $(fieldTemplate.join(''));
}

    $(document).ready(function() {
      $(".editbtn").on('click', function() {
        $("#diversity_edit_model").modal('show')
        $tr=$(this).closest('tr');

        const data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data)
        $('#id').val(data[0])
        $('#edit_name').val(data[1])
        if(Number(data[2])) $('#edit_enable').prop('checked', true)

        $.ajax({
          type: "GET",
          url: "/api/diversities/"+data[0],
          success: function(res) {
            console.log(res)

            var itemsList = $();
            var clientsList = $();

            // Store all the field nodes
            $('#clientsList').empty()
            $('#itemsList').empty()

            res.data.clients.forEach(function(client, i) {
            clientsList = clientsList.add(createField(client));
            });
            $('#clientsList').append( '<h5>Clients</h5>')
            $('#clientsList').append(clientsList)

            res.data.items.forEach(function(item, i) {
            itemsList = itemsList.add(createField(item));
            });

            $('#itemsList').append( '<h5>Items</h5>')
            $('#itemsList').append(itemsList)

          },
          error: function(err) {
            console.log(err)
          }
        })

      })

      $("#edit_diversity_form").on('submit', function(e) {
        e.preventDefault()

        const id = $('#id').val()
        console.log($('#edit_diversity_form').serialize())

        $.ajax({
          type: "PUT",
          url: "/api/diversities/"+id,
          data: $('#edit_diversity_form').serialize(),
          success: function(res) {
            console.log(res)
            $('#edit_diversity_model').modal('hide')
            confirm('diversity saved in database')?window.location.reload():''
          },
          error: function(err) {
            console.log(err)
            alert("diversity not saved")
          }
        })
      })
    })
  </script>

<script type="text/javascript">
    $(document).ready(function() {
      $("#add_diversity_form").on('submit', function(e) {
        e.preventDefault()

        console.log($('#add_diversity_form').serialize())
        $.ajax({
          type: "POST",
          url: "/api/diversities",
          data: $('#add_diversity_form').serialize(),
          success: function(res) {
            console.log(res)
            $('#add_diversity_model').modal('hide')
            confirm('diversity saved in database')?window.location.reload():''
          },
          error: function(err) {
            console.log(err)
            alert("diversity not saved")
          }
        })
      })
    })
  </script>

</body>

</html>
