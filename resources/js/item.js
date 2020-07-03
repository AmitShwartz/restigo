$(document).ready(function () {
  $("#additem").on('submit', function (e) {
    e.preventDefault()

    $.ajax({
      type: "POST",
      url: "restigo.test/api/items",
      data: $('#additem').serialize(),
      success: function (res) {
        console.log(res)
        $('#add_item_model').model('hide')
        alert('Item saved in database')
      },
      error: function (err) {
        console.log(err)
        alert("item not saved")
      }
    })
  })
})