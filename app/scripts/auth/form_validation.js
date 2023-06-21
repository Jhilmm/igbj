$(document).ready(function () {
  validate_username();
  validate_password();
});

function validate_username() {
  const $input = $("#username");
  const $feedback = $("#username-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[a-zA-Z\s]{5,50}$/.test($value.trim())) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}
function validate_password() {
  const $input = $("#password");
  const $feedback = $("#password-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[a-zA-Z\s]{5,50}$/.test($value.trim())) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}
