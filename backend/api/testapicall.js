const userAction = async () => {
  const response = await fetch('http://localhost/api/product/search.php?q=watch');
  const myJson = await response.json(); //extract JSON from the http response
  // do something with myJson
  console.log(myJson);
}
