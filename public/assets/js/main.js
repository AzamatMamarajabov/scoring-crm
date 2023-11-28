$(".collapse-open").click((e) => {
  $(e.target).toggleClass("greenColor opened")
  console.log(e.target.children[1]);
  $(e.target.children[1]).toggle()
})

$(".hamburger").click(() => {
  $(".hamburger").toggleClass("active")
  $('.mobile_nav-menu').toggleClass("active")
  $("body").toggleClass("active")
})