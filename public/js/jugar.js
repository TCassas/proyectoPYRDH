let url = window.location.href.split('/'),
    id = url[5];

fetch('/api/cuestionarios/' + id)
.then((response) => {
  return response.json();
})
.then((data) => {
  console.log(data);
})
.catch((err) => {
  console.log(err);
});
