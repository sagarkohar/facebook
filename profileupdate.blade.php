<!-- Navbar -->
@include('links')
<div class="row">
  <div class="col-lg-3"></div>
  <div class="container col-lg-5">
    <form
      class="container shadow p-2 bg-body rounded"
      id="frm"
      action="uP"
      method="post"
      enctype="multipart/form-data"
    >

    @csrf
      <div class="text-center p-2 fs-2 mb-2 fw-bold">Update Your Account!</div>
      <div class="row">
        <div class="form-group row fs-5">
          <div class="col-lg-1"></div>
          <label class="col-lg-3 col-sm-3 col-form-label">Full Name:</label>
          <div class="col-lg-7 col-sm-6">
            <input
              type="text"
              class="form-control"
              value="{{request.user.userprofile1.full_name}}"
              id="name"
              name="full_name"
            />
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-4"></div>
        <div
          class="col-lg-6 col-sm-12"
          style="margin-top: -5px; color: red"
          id="nmmsg"
        ></div>
      </div>

      <div class="row">
        <div class="form-group row fs-5">
          <div class="col-lg-1"></div>
          <label class="col-lg-3 col-sm-3 col-form-label">Contact:</label>
          <div class="col-lg-7 col-sm-6">
            <input
              type="number"
              class="form-control"
              value="{{request.user.userprofile1.contact}}"
              id="con"
              name="contact"
            />
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-lg-4"></div>
        <div
          class="col-lg-6 col-sm-12"
          style="margin-top: -5px; color: red"
          id="nmmsg2"
        ></div>
      </div>

      <div class="row">
        <div class="form-group row fs-5">
          <div class="col-lg-1"></div>
          <label class="col-lg-3 col-sm-3 col-form-label">Address:</label>
          <div class="col-lg-7 col-sm-6">
            <input
              type="text"
              class="form-control"
              value="{{request.user.userprofile1.address}}"
              name="address"
            />
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-lg-4"></div>
        <div
          class="col-lg-6 col-sm-12"
          style="margin-top: -5px; color: red"
          id="nmmsg4"
        ></div>
      </div>

      <div class="row">
        <div class="form-group row fs-5">
          <div class="col-lg-1"></div>
          <label class="col-lg-3 col-sm-3 col-form-label">Pin Code:</label>
          <div class="col-lg-7 col-sm-6">
            <input
              type="number"
              class="form-control"
              value="{{request.user.userprofile1.pin_code}}"
              name="pin"
            />
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-lg-4"></div>
        <div
          class="col-lg-6 col-sm-12"
          style="margin-top: -5px; color: red"
          id="nmmsg5"
        ></div>
      </div>

      <div class="input-group" style="justify-content: center">
        <input
          type="submit"
          class="btn btn-lg btn-primary w-10 fs-6"
          value="update account"
          name="btn"
          id="btn"
        />
      </div>
    </form>
  </div>
  <div class="col-lg-3 col-sm-1"></div>
</div>

<!-- footer -->
{% include "afterlogin/footer.html" %}

<script>
  // Define the custom validation method
  $.validator.addMethod(
    "lettersWithSpace",
    function (value, element) {
      return this.optional(element) || /^[a-zA-Z\s]*$/.test(value);
    },
    "Please enter letters only"
  );

  $.validator.addMethod(
    "hasSpecialSymbol",
    function (value, element) {
      // Define a regular expression to check for at least one special symbol
      return this.optional(element) || /[!@#$%^&*]/.test(value);
    },
    "Password must contain at least one special symbol."
  );

  $(document).ready(function () {
    if ($("#btn").length) {
      $("#frm").validate({
        rules: {
          name: {
            required: true,
            minlength: 2,
            maxlength: 20,
            lettersWithSpace: true,
          },
          em: {
            required: true,
            email: true,
          },
          con: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10,
          },
          gender: {
            required: true,
          },
          add: {
            required: true,
            minlength: 5,
            maxlength: 50,
          },
          pin: {
            required: true,
            digits: true,
            minlength: 6,
            maxlength: 6,
          },
          newpass: {
            required: true,
            minlength: 8,
            hasSpecialSymbol: true, // Ensure at least one special symbol
          },
          conpass: {
            required: true,
            equalTo: "#newpass",
          },
          agreeCheckbox: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "Please enter your full name",
            minlength: "Please enter at least 2 characters",
            maxlength: "Maximum length is 20 characters",
            lettersWithSpace: "Only letters and spaces are allowed in the name", // Message for custom validation rule
          },
          em: {
            required: "Please enter your email",
            email: "Please enter a valid email address",
          },
          con: {
            required: "Please enter your contact",
            digits: "Please enter a valid 10 digits number",
            minlength: "Please enter 10 digits number",
            maxlength: "Please enter 10 digits number",
          },
          gender: {
            required: "Please select your gender",
          },
          add: {
            required: "Please enter your address",
            minlength: "Please enter at least 5 characters",
            maxlength: "Maximum length is 50 characters",
            lettersWithSpace:
              "Only letters and spaces are allowed in the address",
          },
          pin: {
            required: "Please enter your pin code",
            digits: "Please enter a valid pin code",
            minlength: "Pin code must be 6 digits long",
            maxlength: "Pin code must be 6 digits long",
          },
          newpass: {
            required: "Please enter a new password",
            minlength: "Password must be at least 8 characters long",
          },
          conpass: {
            required: "Please confirm your new password",
            equalTo: "Passwords do not match",
          },
          agreeCheckbox: "Please agree to the terms and conditions",
        },
        submitHandler: function (form) {
          alert("Account created successfully!");
          form.submit();
        },
        errorPlacement: function (error, element) {
          if (element.attr("name") == "name") {
            $("#nmmsg").html(error);
          }
          if (element.attr("name") == "em") {
            $("#nmmsg1").html(error);
          }
          if (element.attr("name") == "con") {
            $("#nmmsg2").html(error);
          }
          if (element.attr("name") == "gender") {
            $("#nmmsg3").html(error);
          }
          if (element.attr("name") == "add") {
            $("#nmmsg4").html(error);
          }
          if (element.attr("name") == "pin") {
            $("#nmmsg5").html(error);
          }
          if (element.attr("name") == "newpass") {
            $("#nmmsg6").html(error);
          }
          if (element.attr("name") == "conpass") {
            $("#nmmsg7").html(error);
          }
        },
      });
    }
  });
</script>
<script>
  function logout() {
    // Perform any necessary logout actions here

    // Show an alert message
    alert("You have been logged out successfully!");
  }
</script>
