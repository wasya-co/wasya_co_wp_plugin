

window.addEventListener('load', (event) => {
  (function() {

    $(".Card3d-Marketing-20230107 .td-figure").mousemove(function(e) {
      const w = 400
      const h = 320
      const maxDeg = 90
      const maxZDeg = 10

      var parentOffset = $(this).offset()
      //or $(this).offset() if you really just want the current element's offset
      var relX = e.pageX - parentOffset.left - w/2
      var relY = e.pageY - parentOffset.top - h/2
      let relYpc = relY/h/2 // rel Y Percent
      let relXpc = relX/w/2 // rel X Percent
      let relZpc = relX > 0 ? relXpc+relYpc : relXpc-relYpc

      // $(".td-figure img").css('transform', 'rotate(0)')
      $(this).find("img").css('transform', `rotateX(${maxDeg*relYpc}deg) rotateY(${-maxDeg*relXpc}deg) rotateZ(${maxZDeg*relZpc}deg)`)

    })

    $(".td-figure").mouseout(function(e) {
      // $(".td-figure img").css('transform', 'rotateX(10deg) rotateY(-18deg) rotateZ(3deg)')
    })

  })()
})

