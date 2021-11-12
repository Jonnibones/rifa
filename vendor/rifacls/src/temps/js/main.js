
//Função responsável por exibir os detalhes da rifa
function showContent()
{

  var x = document.getElementById("descr_produto");
  if (x.style.display === "none") 
  {

    x.style.display = "block";

  }
  else 
  {

    x.style.display = "none";
    
  }

}

//Função responsável por exibir os modais para acessar a área de pagamento de acordo com o status do usuário
function Sweet()
{

	if (!document.getElementById("p_num_sel") && !document.getElementById("p_user_log") && document.getElementById("p_sweet") )
	{
		swal("Selecione um número e faça login para acessar a área de pagamento.", "", "warning");
	}
	
	if (!document.getElementById("p_num_sel") && document.getElementById("p_user_log") && document.getElementById("p_sweet") ) 
	{
		swal("Selecione algum número para acessar a área de pagamento.", "", "warning");
	}

	if (document.getElementById("p_num_sel") && !document.getElementById("p_user_log") && document.getElementById("p_sweet")  )
	{
		swal({ 
				title: "Você precisa estar logado para acessar a área de pagamento. ",
				text: " Deseja acessar a área de login?",
				icon: "warning",
				buttons: true,
			})
			.then((willDelete) => {
				if (willDelete) 
				{
					window.location.href = "minha-conta";
				} 
				else 
				{
					exit();
				}
			});
	}
	
}

//Função responsável pelo aviso de mudança de página

function Notificar()
{
	if (document.getElementById("notificar")) 
	{
		var linklogo = document.getElementById("logo");
		var linkhome = document.getElementById("home");
		
		var confirma = confirm("Deseja realmente sair da página? Os números selecionados serão cancelados.");

		if (confirma == false) 
		{
			linklogo.setAttribute("href", "");
			linkhome.setAttribute("href", "");
		}
	}
	
}

