//Registration Validation

$(document).ready(
  $("#firstname").keyup(() => {
    const firstname = $("#firstname").val();
    if (firstname === "") {
      $("#firstnameSpan").html("First name required!");
    }
  }),
  $("#lastname").keyup(() => {
    const lastname = $("#lastname").val();
    if (lastname === "") {
      $("#lastnameSpan").html("Last name required!");
    }
  }),
  $("#email").keyup(() => {
    const email = $("#email").val();
    if (email === "") {
      $("#emailSpan").html("Email required!");
    } else {
      if (email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
        $("#emailSpan").html("");
      } else {
        $("#emailSpan").html("Invalid Email Format!");
      }
    }
  }),
  $("#password").keyup(() => {
    const password = $("#password").val();
    if (password.match(/[A-Z]/)) {
      $("#uppercaseSpan").removeClass("invalid").addClass("valid");
    } else {
      $("#uppercaseSpan").removeClass("valid").addClass("invalid");
    }
    if (password.match(/[0-9]/)) {
      $("#numberSpan").removeClass("invalid").addClass("valid");
    } else {
      $("#numberSpan").removeClass("valid").addClass("invalid");
    }
    if (password.match(/[!@#$%^&*(),.?":{}|]/)) {
      $("#specialSpan").removeClass("invalid").addClass("valid");
    } else {
      $("#specialSpan").removeClass("valid").addClass("invalid");
    }
    if (password.length > 8) {
      $("#lengthSpan").removeClass("invalid").addClass("valid");
    } else {
      $("#lengthSpan").removeClass("valid").addClass("invalid");
    }
    $("#cpassword").keyup(() => {
      const cpassword = $("#cpassword").val();
      if (cpassword === password) {
        $("#cpasswordSpan").html("");
        cpasswordValid = true;
      } else {
        $("#cpasswordSpan").html("Password doesn't match.").css("color", "red");
        cpasswordValid = false;
      }
    });
  })
);
