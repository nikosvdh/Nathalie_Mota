// FORMULAIRE DE CONTACT

let modal = document.getElementById('modal');

if (modal) {
  let btn = document.querySelectorAll('.modal-js');
      
  btn.forEach(function(item) {
    item.addEventListener('click', () => {
      modal.style.display = 'block';
      let input = document.querySelector('#wpforms-22-field_3');
      let referenceText = document.querySelector('#reference').textContent;
      input.value = referenceText;
    });
  });
}
    
// Quand on clique n'importe où en dehors de la modale, on la ferme
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
};