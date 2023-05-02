// Récupération du bouton "nourrir" dans le DOM
const nourrirBtn = document.getElementById('nourrir-btn');

// Ajout d'un écouteur d'événements au clic sur le bouton "nourrir"
nourrirBtn.addEventListener('click', () => {
  // Envoi de la requête AJAX pour mettre à jour les statistiques du chien
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Si la requête s'est bien passée, on recharge la page pour afficher les nouvelles valeurs
        window.location.reload();
      } else {
        // Si la requête a échoué, on affiche un message d'erreur
        console.error(xhr.responseText);
      }
    }
  };
  // Récupération de l'ID de l'animal
  const idAnimal = parseInt(document.querySelector('[name="idAnimal"]').value);
  // Envoi de la requête POST avec l'ID de l'animal et l'action "nourrir"
  xhr.open('POST', 'nourrir.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send(`idAnimal=${idAnimal}&action=nourrir`);
});
