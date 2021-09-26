

function showContent()
{
  var x = document.getElementById("descr_produto");
  if (x.style.display === "none") 
  {
    x.style.display = "block";
  }else 
  {
    x.style.display = "none";
  }
}

function disableButton()
{

	document.getElementById('btn_numeros3').disabled = true;


} 