angular.module('ui.bootstrap.demo', ['ngAnimate', 'ui.bootstrap']);
angular.module('ui.bootstrap.demo').controller('IndexController', function ($scope, $uibModal, $log) {

    $scope.pedidos = [];
	$scope.valorTotalPedidos = 0;

	$scope.adicionarItem = function(nome, ml, valor, inputText) {

		var pedidoJaAdicionado = false;

		angular.forEach($scope.pedidos, function (item) {
			if ((nome == item.nome) && (ml == item.ml)) {
				item.qtd = ++item.qtd;
				item.valor =  (parseFloat(valor) * item.qtd);
				document.getElementById(inputText).value = item.qtd;
				pedidoJaAdicionado = true;
			}
		});

		if (!pedidoJaAdicionado) {
			var pedido = { nome: nome, ml: ml, valor: parseFloat(valor), qtd: 1 };
			$scope.pedidos.push(pedido);
			document.getElementById(inputText).value = pedido.qtd;
		}
		calcularValorTotalPedidos();
	}

	$scope.removerItem = function(nome, ml, valor, inputText) {
		angular.forEach($scope.pedidos, function (item) {
			if ((nome == item.nome) && (ml == item.ml)) {
				if (item.qtd > 0) {
					item.qtd = --item.qtd;
					item.valor =  (parseFloat(valor) * item.qtd);
					document.getElementById(inputText).value = item.qtd;
				}
			}
		});
		calcularValorTotalPedidos();
	}

	function calcularValorTotalPedidos() {
		$scope.valorTotalPedidos = 0;
		angular.forEach($scope.pedidos, function (item) {
			$scope.valorTotalPedidos = $scope.valorTotalPedidos + item.valor;
		});

		if ($scope.valorTotalPedidos > 0) {
  			$scope.mensagemSemPedido = "";
  		}
	}

  $scope.animationsEnabled = true;

  $scope.open = function (size) {

  	$scope.mensagemSemPedido = "";
  	if ($scope.valorTotalPedidos == 0) {
  		$scope.mensagemSemPedido = "Nenhum pedido adicionado";
  		return false;
  	}

    var modalInstance = $uibModal.open({
      animation: $scope.animationsEnabled,
      templateUrl: 'myModalContent.html',
      controller: 'ModalInstanceCtrl',
      size: size,
      resolve: {
        pedidos: function() {
        	return $scope.pedidos;
        },
        valorTotalPedidos: function () {
        	return $scope.valorTotalPedidos;
        }
      }
    });

    modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
  };

  $scope.toggleAnimation = function () {
    $scope.animationsEnabled = !$scope.animationsEnabled;
  };

});

angular.module('ui.bootstrap.demo').controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, $http, pedidos, valorTotalPedidos) {

  $scope.pedidos = [];

  angular.forEach(pedidos, function (item) {
	 if (item.qtd > 0) {
	 	$scope.pedidos.push(item);
	 }
  });

  $scope.valorTotalPedidos = valorTotalPedidos;


  /*
  $scope.items = items;
  $scope.selected = {
    item: $scope.items[0]
  };
  */

  $scope.ok = function () {

  	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

  	if (!$scope.nome) {
		$scope.mensagemValidacaoFormulario = 'Campo Nome obrigatório.';
		return false;
  	}
  	else if (!$scope.email) {
		$scope.mensagemValidacaoFormulario = 'Campo Email obrigatório.';
		return false;
  	}
  	else if (!emailPattern.test($scope.email)) {
  		$scope.mensagemValidacaoFormulario = 'Formato de Email inválido.';
        return false;
    }

  	else if (!$scope.telefone) {
		$scope.mensagemValidacaoFormulario = 'Campo Telefone obrigatório.';
		return false;
  	}

  	$scope.mensagemValidacaoFormulario = 'Enviando Pedido por Email....';

  	var pedidosHtml = '<style>';pedidosHtml = pedidosHtml + '.table { width: 100%;max-width: 100%;margin-bottom: 20px;border-spacing: 0;border-collapse: collapse; text-align: left;font-family: Helvetica,Arial,sans-serif;}';
  	pedidosHtml = pedidosHtml + 'tbody {display: table-row-group;vertical-align: middle;border-color: inherit;}';
  	pedidosHtml = pedidosHtml + '.table-striped>tbody>tr:nth-of-type(odd) {background-color: #f9f9f9;}';
  	pedidosHtml = pedidosHtml + 'thead {display: table-header-group;vertical-align: middle;border-color: green;}';
  	pedidosHtml = pedidosHtml + 'tr {  display: table-row;vertical-align: inherit;border-color: inherit;}';
  	pedidosHtml = pedidosHtml + '.table>thead>tr>th {vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;}';
  	pedidosHtml = pedidosHtml + 'td, th {display: table-cell;}';
  	pedidosHtml = pedidosHtml + '.table>tfoot>tr>td, .table>tbody>tr>td {vertical-align: bottom;border-top: 1px solid #ddd;padding: 8px;line-height: 1.42857143;}';
  	pedidosHtml = pedidosHtml + '</style>';

  	pedidosHtml = pedidosHtml + '<table class="table table-striped">';
  	pedidosHtml = pedidosHtml + document.getElementById('tabelaPedidos').innerHTML;
  	pedidosHtml = pedidosHtml + '</table>';

  	var req = {
		 method: 'POST',
		 url: 'http://outletget.azurewebsites.net/api/Leviora/SendEmail',
		 headers: {
		   'Content-Type': 'application/json'
		 },
		 data: {
			  Nome:$scope.nome,
			  Email:$scope.email,
			  Telefone:$scope.telefone,
			  Pedidos: pedidosHtml
		}
	}
	$http(req).then(function(result) {
		console.log('then1', result);
		$uibModalInstance.close();
	}, function(error){
		console.log('then2', error);
		$uibModalInstance.close();
	});
  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
});


/*
function IndexController ($scope) {

	$scope.pedidos = [];
	$scope.valorTotalPedidos = 0;


	$scope.adicionarItem = function(nome, ml, valor, inputText) {

		var pedidoJaAdicionado = false;

		angular.forEach($scope.pedidos, function (item) {
			if ((nome == item.nome) && (ml == item.ml)) {
				item.qtd = ++item.qtd;
				item.valor =  (parseFloat(valor) * item.qtd);
				document.getElementById(inputText).value = item.qtd;
				pedidoJaAdicionado = true;
			}
		});

		if (!pedidoJaAdicionado) {
			var pedido = { nome: nome, ml: ml, valor: parseFloat(valor), qtd: 1 };
			$scope.pedidos.push(pedido);
			document.getElementById(inputText).value = pedido.qtd;
		}
		calcularValorTotalPedidos();
	}

	$scope.removerItem = function(nome, ml, valor, inputText) {
		angular.forEach($scope.pedidos, function (item) {
			if ((nome == item.nome) && (ml == item.ml)) {
				if (item.qtd > 0) {
					item.qtd = --item.qtd;
					item.valor =  (parseFloat(valor) * item.qtd);
					document.getElementById(inputText).value = item.qtd;
				}
			}
		});
		calcularValorTotalPedidos();
	}

	function calcularValorTotalPedidos() {
		$scope.valorTotalPedidos = 0;
		angular.forEach($scope.pedidos, function (item) {
			$scope.valorTotalPedidos = $scope.valorTotalPedidos + item.valor;
		});
	}

	$scope.showModal = function() {

		console.log('show modal');
	}

}
*/

