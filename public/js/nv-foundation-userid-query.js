jQuery(document).ready(function ($) {
  $("#nv-search-userid-button").click(function () {
    var username = $("#nv-username-input").val().trim();

    if (username === "") {
      $("#nv-user-id-result")
        .text("Please enter a username.")
        .removeClass("success")
        .addClass("error");
      return;
    }

    // Prepare the data for the AJAX request
    var data = {
      action: "get_user_id_by_username",
      username: username,
    };

    // Send AJAX request
    $.post(ajaxurl, data, function (response) {
      if (response.success) {
        $("#nv-user-id-result")
          .text("User ID: " + response.data.userid)
          .removeClass("error")
          .addClass("success");
      } else {
        $("#nv-user-id-result")
          .text("User not found.")
          .removeClass("success")
          .addClass("error");
      }
    }).fail(function () {
      $("#nv-user-id-result")
        .text("An error occurred. Please try again.")
        .removeClass("success")
        .addClass("error");
    });
  });
});
