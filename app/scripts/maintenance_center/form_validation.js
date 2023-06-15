$(document).ready(function () {
  validate_name();
  validate_description();
  validate_state();
});

function validate_name() {
  const $input = $("#name_center");
  const $feedback = $("#name_center-feedback");
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

function validate_description() {
  const $input = $("#description");
  const $feedback = $("#description-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[a-zA-Z\s]{0,100}$/.test($value.trim())) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}

function validate_state() {
  const input = $("#state");
  const input_elem = $("input[name='state']");
  const $feedback = $("#state-feedback");
  input.on("click", function () {
    if (input_elem.filter(":checked").length === 0) {
      $feedback.show();
      input.addClass("is-invalid");
    } else {
      $feedback.hide();
      input.removeClass("is-invalid");
    }
  });
}
