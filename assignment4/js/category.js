$(function() 
{
  $("#create_category").validate(
  {
    rules: 
    {
      category: 
      {
        required: true,
        pattern: /^[a-zA-Z ]*$/
      }
    },
    // Specify validation error messages
    messages: 
    {
      category:
      {
        required: "* Category field is Required",
        pattern : "* Only Letters & White space are allowed"
      },
    },
    submitHandler: function(form) {
      form.submit();
    },
  });
});