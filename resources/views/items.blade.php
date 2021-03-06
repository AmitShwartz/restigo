<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <title>Items</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <!-- Modal add item -->
  <div class="modal fade" id="item_add_model" tabindex="-1" role="dialog" aria-labelledby="item_add_modelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="item_add_modelLabel">Add Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{csrf_field()}}
          <form id="add_item_form">
            <div class="form-group">
              <label for="add_name">Name</label>
              <input type="text" name="name" class="form-control" id="add_name">
            </div>
            <div class="form-group">
              <label for="add_price">Price</label>
              <input type="number" name="price" class="form-control" id="add_price">
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
              <input type="checkbox" name="has_vat" value=1 class="form-check-input" id="add_has_vat">
              <label class="form-check-label" for="add_has_vat">Has vat</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="enable" value=1 class="form-check-input" id="add_enable">
                <label class="form-check-label" for="add_enable">Enable</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save New Item</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal add item -->

   <!-- Modal edit item -->
   <div class="modal fade" id="item_edit_model" tabindex="-1" role="dialog" aria-labelledby="item_edit_modelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="item_edit_modelLabel">Edit Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{csrf_field()}}
            {{method_field('PUT')}}
          <form id="edit_item_form">
              <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="edit_name">Name</label>
              <input type="text" name="name" class="form-control" id="edit_name">
            </div>
            <div class="form-group">
              <label for="edit_price">Price</label>
              <input type="number" name="price" class="form-control" id="edit_price">
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
              <input type="checkbox" name="has_vat" value=1 class="form-check-input" id="edit_has_vat">
              <label class="form-check-label" for="edit_has_vat">Has vat</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="enable" value=1 class="form-check-input" id="edit_enable">
                <label class="form-check-label" for="edit_enable">Enable</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Item</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal edit item -->

<!-- start Modal delete item -->
  <div class="modal fade" tabindex="-1" role="dialog" id="item_delete_model" aria-labelledby="item_delete_modelLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="item_delete_modelLabel">Delete Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="delete_item_form">

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
<!-- start Modal delet item -->

<!-- Items Page -->
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <h1 class="">Items management</h1>
      </div>
      <div class="row>">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">Catalog Number</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Diversity</th>
              <th scope="col">Has Vat</th>
              <th scope="col">Enable</th>
              <th scope="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#item_add_model">
                  add item
                </button>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
              <tr>
              <td >{{$item->catalog_number}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->price}}</td>
              <td>{{$item->diversity}}</td>
              <td>{{$item->has_vat}}</td>
              <td>{{$item->enable}}</td>
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
        $("#item_delete_model").modal('show')
        $tr=$(this).closest('tr');

        const data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        $('#id').val(data[0])
      })

      $("#delete_item_form").on('submit', function(e) {
        e.preventDefault()

        var id = $('#id').val()
        $.ajax({
          type: "delete",
          url: "/api/items/"+id,
          data: $('#delete_item_form').serialize(),
          success: function(res) {
            console.log(res)
            $('#delete_item_model').modal('hide')
            confirm('Item Deleted from database')?window.location.reload():''
          },
          error: function(err) {
            console.log(err)
            alert("item not deleted")
          }
        })
      })
    })
  </script>


 <script type="text/javascript">
    $(document).ready(function() {
      $(".editbtn").on('click', function() {
        $("#item_edit_model").modal('show')
        $tr=$(this).closest('tr');

        const data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data)
        $('#id').val(data[0])
        $('#edit_name').val(data[1])
        $('#edit_price').val(data[2])
        $('#edit_diversity').val(data[3])
        if(Number(data[4])) $('#edit_has_vat').prop('checked', true)
        if(Number(data[5])) $('#edit_enable').prop('checked', true)
      })

      $("#edit_item_form").on('submit', function(e) {
        e.preventDefault()

        var id = $('#id').val()
        console.log($('#edit_item_form').serialize())

        $.ajax({
          type: "PUT",
          url: "/api/items/"+id,
          data: $('#edit_item_form').serialize(),
          success: function(res) {
            console.log(res)
            $('#edit_item_model').modal('hide')
            confirm('Item saved in database')?window.location.reload():''
          },
          error: function(err) {
            console.log(err)
            alert("item not saved")
          }
        })
      })
    })
  </script>

<script type="text/javascript">
    $(document).ready(function() {
      $("#add_item_form").on('submit', function(e) {
        e.preventDefault()

        console.log($('#add_item_form').serialize())
        $.ajax({
          type: "POST",
          url: "/api/items",
          data: $('#add_item_form').serialize(),
          success: function(res) {
            console.log(res)
            $('#add_item_model').modal('hide')
            confirm('Item saved in database')?window.location.reload():''
          },
          error: function(err) {
            console.log(err)
            alert("item not saved")
          }
        })
      })
    })
  </script>

</body>

</html>
