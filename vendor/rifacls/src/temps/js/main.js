

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

function Sweet()
{
  var sweet = document.getElementById("sweet").textContent;

  if(sweet == 'numeros') 
  {
    swal("numeros");
  }

  if(sweet == 'dados')
  {
    swal("dados");
  }
  

}

