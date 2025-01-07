$(() => {
  console.log(1);
  $("#form-pjax").on("change", "#application-check", () => {
    $.pjax.reload({
      container: "#form-pjax",
      method: "POST",
      data: $("#form-application").serialize(),
      pushState: false,
      replaceState: false,
      timeout: 5000,
    });
  });
});
