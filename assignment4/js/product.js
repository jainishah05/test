$(function() 
{
  $("#add_product").validate(
  {
    rules: 
    {
      pname:{
        required: true,
      },
      price: {
        required: true,
        pattern: /^\d+(,\d{3})*(\.\d{1,2})?$/
      },
      fileupload: {
        extension: "png|gif|jpeg|jpg"
      },
      category: {
        required: true,
      }
    },
    // Specify validation error messages
    messages: 
    {
      pname: "* Product Field is Required",
      price: {
        required: "* Price Field is Required",
        pattern: "* Please enter valid Price"
      }, 
      fileupload: {
        extension: "* File should be .jpg, .jpeg, .png, .gif"
      },
      category: "* Please select a Category"
    },
    submitHandler: function(form) {
      form.submit();
    },
  });
});