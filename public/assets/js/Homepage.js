const searchBar = document.getElementById('searchbar');
const containerBoard = document.getElementById('container-board');
searchBar.addEventListener('keyup', () => {
  fetch('/argo?name=' + searchBar.value)
  .then(response => {
    return response.text()
    
  }) 
  .then(html => {
    containerBoard.innerHTML = html
  })
})