const rangeInput = document.querySelectorAll(".range-input input");

rangeInput.forEach(input =>{
    input.addEventListener("input", ()=>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

        console.log(minVal. maxVal)
    })
})

$(window).scroll(function(e){ 
    var $el = $('.filter'); 
    var isPositionFixed = ($el.css('position') == 'fixed');
    if ($(this).scrollTop() > 200 && !isPositionFixed){ 
      $el.css({'position': 'fixed', 'top': '0px'}); 
    }
    if ($(this).scrollTop() < 200 && isPositionFixed){
      $el.css({'position': 'static', 'top': '0px'}); 
    } 
  });