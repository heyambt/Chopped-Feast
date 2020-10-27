//get elements
const selectElement = document.querySelector('.dropdown');
selectElement.addEventListener('change', (event) => {
  var elements = document.querySelectorAll('.week-section');
  for (var i= 0; i < elements.length; i++) {
      if ( elements[i].classList.contains( event.target.value ) ) {
        elements[i].classList.add('visible');
      }else{
        elements[i].classList.remove('visible');
      }
  }
});