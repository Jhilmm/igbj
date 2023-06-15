$(document).ready(function () {
  validate_num_ci();
  validate_ci_expedition();
  validate_item();
  validate_name();
  validate_lastname();
  validate_second_lastname();
  validate_date();
  validate_address();
  validate_phone();
  validate_cell_phone();
  validate_email();
  validate_gender();
});

function validate_num_ci() {
  const $input = $("#num_ci");
  const $feedback = $("#num_ci-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[0-9]{6,8}[a-zA-Z]?$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}

function validate_ci_expedition() {
  const $input = $("#ci_expedition");
  const $feedback = $("#ci_expedition-feedback");
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

function validate_item() {
  const $input = $("#profession");
  const $feedback = $("#profession-feedback");
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

function validate_name() {
  const $input = $("#name");
  const $feedback = $("#name-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[a-zA-Z\s]{0,50}$/.test($value.trim())) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}

function validate_lastname() {
  const $input = $("#lastname");
  const $feedback = $("#lastname-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[a-zA-Z\s]{0,30}$/.test($value.trim())) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}

function validate_second_lastname() {
  const $input = $("#second_lastname");
  const $feedback = $("#second_lastname-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[a-zA-Z\s]{0,30}$/.test($value.trim())) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
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
function validate_address() {
  const $input = $("#address");
  const $feedback = $("#address-feedback");
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

function validate_phone() {
  const $input = $("#phone");
  const $feedback = $("#phone-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[4|5|2][0-9]{7}$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}

function validate_cell_phone() {
  const $input = $("#cell_phone");
  const $feedback = $("#cell_phone-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[6|7][0-9]{7}$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}
function validate_email() {
  const $input = $("#email");
  const $feedback = $("#email-feedback");
  $input.on("input click", function () {
    const $value = $input.val();
    if (/^[a-z0-9._%+-]{4,30}@(gmail|hotmail|outlook)\.(com)$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
}

function validate_gender() {
  const input = $("#gender");
  const input_elem = $("input[name='gender']");
  const $feedback = $("#gender-feedback");
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
