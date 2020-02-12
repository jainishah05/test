$(function() 
{
  $("#employee").validate(
  {
    rules: 
    {
      name:{
        required: true,
        pattern : /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/
      },
      email: {
        required: true,
        pattern: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
      },
      phone: {
        required: true,
        pattern: /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/
      },
      city: {
        required: true,
      },
      gender:{
         required: true,
      },
      fileupload: {
        extension: "png|gif|jpeg|jpg"
      },
    },
    // Specify validation error messages
    messages: 
    {
      name:
      {
        required: "* Name Field is Required",
        pattern: "* Please enter valid Name"
      },
      email: {
        required: "* Email Field is Required",
        pattern: "* Please enter valid Mail ID"
      }, 
      phone: {
        required: "* Phone No. Field is Required",
        pattern: "* Please enter valid Phone No."
      }, 
      city: "* Please select a City",
      gender: "* Please select Gender",
      fileupload: {
        extension: "* File should be .jpg, .jpeg, .png, .gif"
      },
    },
    submitHandler: function(form) {
      form.submit();
    },
  });
});