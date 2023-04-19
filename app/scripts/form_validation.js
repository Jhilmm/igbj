$(document).ready(function () {
  const $input = $("#num-ci");
  const $feedback = $("#ci-feedback");
  $input.on("input", function () {
    const $value = $input.val();
    if (/^[0-9]{6,8}[a-zA-Z]?$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
});

$(document).ready(function () {
  const $input = $("#ci_expedition");
  const $feedback = $("#ci_expedition-feedback");
  $input.on("input", function () {
    const selectedValue = $input.val();
    if (selectedValue === "") {
      $feedback.show();
      $input.addClass("is-invalid");
    } else {
      $feedback.hide();
      $input.removeClass("is-invalid");
    }
  });
});

$(document).ready(function () {
  const $input = $("#profession");
  const $feedback = $("#profession-feedback");
  $input.on("input", function () {
    const selectedValue = $input.val();
    if (selectedValue === "") {
      $feedback.show();
      $input.addClass("is-invalid");
    } else {
      $feedback.hide();
      $input.removeClass("is-invalid");
    }
  });
});

$(document).ready(function () {
  const $input = $("#name");
  const $feedback = $("#name-feedback");
  $input.on("input", function () {
    const $value = $input.val();
    if (/^[a-zA-Z]{0,50}$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
});

$(document).ready(function () {
  const $input = $("#last_name");
  const $feedback = $("#last_name-feedback");
  $input.on("input", function () {
    const $value = $input.val();
    if (/^[a-zA-Z]{0,30}$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
});

$(document).ready(function () {
  const $input = $("#mother_last_name");
  const $feedback = $("#mother_last_name-feedback");
  $input.on("input", function () {
    const $value = $input.val();
    if (/^[a-zA-Z]{0,30}$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
});

$(document).ready(function () {
  const $input = $("#date");
  const $feedback = $("#date-feedback");
  $input.on("input", function () {
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
});

$(document).ready(function () {
  const $input = $("#address");
  const $feedback = $("#address-feedback");
  $input.on("input", function () {
    const $value = $input.val();
    if (/^[a-zA-Z0-9\s\-\#\.\,]{5,100}$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
});

$(document).ready(function () {
  const $input = $("#phone");
  const $feedback = $("#phone-feedback");
  $input.on("input", function () {
    const $value = $input.val();
    if (/^[4|5|2][0-9]{7}$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
});

$(document).ready(function () {
  const $input = $("#cell_phone");
  const $feedback = $("#cell_phone-feedback");
  $input.on("input", function () {
    const $value = $input.val();
    if (/^[6|7][0-9]{7}$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
});

$(document).ready(function () {
  const $input = $("#email");
  const $feedback = $("#email-feedback");
  $input.on("input", function () {
    const $value = $input.val();
    if (/^[a-z0-9._%+-]{4,30}@(gmail|hotmail|outlook)\.(com)$/.test($value)) {
      $feedback.hide();
      $input.removeClass("is-invalid");
    } else {
      $feedback.show();
      $input.addClass("is-invalid");
    }
  });
});
