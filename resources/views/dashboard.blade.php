@extends('.layouts.main')


@section('content')

<div class="mobile">
    <div id="slo"> <p id="slogam">Jogue com inteligência, ganhe com a CombinaSorte.</p> </div>

    <div class="gerar">
    <div class="input-group mb-3">
  <input type="text" class="form-control text-center" id="quantity" placeholder="Quantas sugestões deseja?" aria-label="gerar" aria-describedby="gerar">
  <button class="btn btn-outline-secondary" type="button" id="gerar">Gerar</button>
</div>
<h5 style="font-size: 14px;">Coloque abaixo números a ser excluídos <br>
    <small style="font-size: 11px"> Não adicione aqui número que esteja nas combinações abaixo</small> </h5>
    <div class="inputs">
        <div class="">
            <input type="number" name="ex1"  maxlength="2" required id="ex1">
        </div>
        <div class="">
            <input type="number" name="ex2" maxlength="2" required id="ex2">
        </div>
        <div class="">
            <input type="number" name="ex3" maxlength="2" required id="ex3">
        </div>
        <div class="">
            <input type="number" name="ex4" maxlength="2" required id="ex4">
        </div>
        <div class="">
            <input type="number" name="ex5" maxlength="2" required id="ex5">
        </div>
    </div>

    </div>
    <div class="btn-div">
    
    <h5 style="font-size: 14px;">Seqências Frequentes cadastradas</h5>
    <p style="text-align:center;">1 - 10 - 13 - 14 - 16 - 17 - 27 <br>
       3 - 11 - 13 - 14 - 15 - 22 - 24 <br>
       1 - 3 - 11 - 13 - 14 - 15 - 24 <br>
       3 - 4 - 11 - 15 - 19 - 20 - 21 <br>
       3 - 4 - 11 - 13 - 15 - 19 - 22 </p>

    <button class="btn btn-sm btn-outline-success" id="btn-excel" onClick="$('#table').tableExport({type:'excel', escape:'false'});">Gerar Excel</button>
    <a href="/cadastrar" class="btn btn-sm btn-outline-danger" id="btn-add">Adicionar combinação excluída</a>
   
    </div>
   <table id="table" class="table table-hover text-center">
 
   </table>
</div>

@endsection

@section('script')

<script>
    $('document').ready(function(){
        var text = ["Aumente suas chances de ganhar com a CombinaSorte.", "Deixe a sorte do seu lado com a CombinaSorte.", "Transforme suas apostas em vitórias com a CombinaSorte.",'Jogue com inteligência, ganhe com a CombinaSorte.'];
        var element = document.getElementById("slogam");
        var index = 0;

        setInterval(function() {
        $("#slogam").hide();
        $("#slogam").html(text[index]);
        $("#slogam").fadeIn();
        index = (index + 1) % text.length;
        }, 4000);
        $("#tableId").tableExport();

    });
    $("#gerar").click(function(){

      

        generateCombinations();
        $("#btn-excel").fadeIn();
        $("#btn-add").hide();
    });
     function generateCombinations() {
      
        $.ajax({
                url: "/api/numbers",
                type: "GET",    
                dataType: "json",
                success: function (retorno) {
                  const quantity = document.getElementById("quantity").value;
      const ex1 = document.getElementById('ex1').value;
      
      const ex2 = document.getElementById('ex2').value;
      const ex3 = document.getElementById('ex3').value;
      const ex4 = document.getElementById('ex4').value;
      const ex5 = document.getElementById('ex5').value;
   
      const exclusoes = [ex1,ex2,ex3,ex4,ex5];
                  combinations = gerarCombinacoes(retorno, quantity, exclusoes);
                  console.log(combinations);
                 
  
var table = document.getElementById("table");
table.innerHTML = '';

var row = table.insertRow(-1);
var cell = row.insertCell(-1);
cell.innerHTML = 'SUGESTÕES';

for (var i = 0; i < combinations.length; i++) {
  var row = table.insertRow();
      var cell = row.insertCell();
      cell.innerHTML = combinations[i].join(' - ');
  

}

var ws = XLSX.utils.aoa_to_sheet(table);
var wb = XLSX.utils.book_new();
XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
XLSX.writeFile(wb, "table.xlsx");
                    
                },
                error: function(data){
                    console.log('existe algum erro no sistema, contate o servidor');
                },
                complete: function(){
                    //ação depois de completo
                }
            });



}

function gerarCombinacoes(lista, quantidade, exclusoes) {
  // lista é a lista de combinações recebida como parâmetro
  // quantidade é a quantidade de combinações a serem geradas
  // exclusoes é um array de números que não podem aparecer nas combinações geradas

  // as 5 sequências obrigatórias
  const sequencias = [
    [1, 10, 13, 14, 16, 17, 27],
    [3, 11, 13, 14, 15, 22, 24],
    [1, 3, 11, 13, 14, 15, 24],
    [3, 4, 11, 15, 19, 20, 21],
    [3, 4, 11, 13, 15, 19, 22]
  ];

  // verifica se algum dos números a serem excluídos está nas sequências obrigatórias
  let algumNumeroEncontrado = false;

for(i=0;i< sequencias.length;i++){

  for(k=0; k <sequencias[i].length ;k++){
 
    for(j=0;j<exclusoes.length;j++){
   
      if(exclusoes[j] == sequencias[i][k]){
        algumNumeroEncontrado = true;
      }
    }
  }
}

/* if (algumNumeroEncontrado) {
  alert('Você não pode adicionar um número pra excluir que esteja nas Sequencias frequentes');
  return ;
}  */

  // gera combinações aleatórias que não estão na lista de combinações recebida como parâmetro
  // e que não contêm números a serem excluídos
  const combinacoes = [];
  while (combinacoes.length < quantidade) {
    const combinacao = [];
    while (combinacao.length < 15) {
      const numero = Math.floor(Math.random() * 25) + 1;
      if (!combinacao.includes(numero)) {
        combinacao.push(numero);
      }
    }
    if (!lista.includes(combinacao)) {
      teste = false;
      for(a=0;a<exclusoes.length;a++){
        for(b=0;b<combinacao.length;b++){
          if(combinacao[b] == exclusoes[a]){
            teste = true;
          }
        }
      }
      if(!teste){
        combinacoes.push(combinacao);
      }
      
    }
  }

  // adiciona uma das sequências obrigatórias aleatoriamente à cada combinação gerada
  combinacoes.forEach(combinacao => {
    const seqAleatoria = sequencias[Math.floor(Math.random() * sequencias.length)];
    for(c=0;c<seqAleatoria.length;c++){
      teste2 = false;
      for(d=0;d<combinacao.length;d++){
        if(combinacao[d] == seqAleatoria[c]){
          teste2 = true;
        }
      }
      if(!teste2){
        teste3 = 0;
        for(f=0;f<combinacao.length;f++){
          for(g=0;g<seqAleatoria.length;g++){
            if(combinacao[f] == seqAleatoria[g]){
              teste3++;
            }
          }
          if(teste3 == 0){
            if(exclusoes.includes(seqAleatoria[c])){
              combinacao[c+2] = seqAleatoria[c];
            }
     
          }
        }
        
      }
      
    }
    
  });

  return combinacoes;
}

</script>
</script>
@endsection
