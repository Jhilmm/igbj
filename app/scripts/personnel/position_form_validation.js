$(document).ready(function () {
  validate_position();
  validate_date();
  validate_cod_memo();
});


function validate_position() {
  const $input = $("#position");
  const $feedback = $("#position-feedback");
  $input.on("input click", function () {
    const selectedValue = $input.val();
    if (selectedValue === "") {
      $feedback.show();
      $input.addClass("is-invalid");
    } else {
      $feedback.hide();
      $input.removeClass("is-invalid");
    }
  });
}

function validate_date() {
  const $input = $("#date");
  const $feedback = $("#date-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    const selectedDate = new Date($value);
    const minDate = new Date();
    minDate.setFullYear(minDate.getFullYear() - 60);
    const maxDate = new Date();
    maxDate.setFullYear(maxDate.getFullYear() - 18);
    if (selectedDate >= minDate && selectedDate <= maxDate) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}
function validate_cod_memo() {
  const $input = $("#cod_memo");
  const $feedback = $("#cod_memo-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[a-zA-Z0-9\s\-\#\.\,]{5,100}$/.test($value.trim())) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}

