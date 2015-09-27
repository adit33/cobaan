var	app = angular.module('http',[],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('userController',function($scope,$http) {
	$scope.datas={};
	$http.get('http://localhost/cobaan/public/api/user').success(function(data, status, headers, config){
	$scope.datas=data;
	});

	$scope.tambah = function(event){
		event.preventDefault();
		$http.post('http://localhost/cobaan/public/user/store',{nama:$scope.nama,email:$scope.email,password:$scope.password,_token:$scope._token})
		.success(function(data, status, headers, config){
		$scope.datas.push({nama:$scope.nama,email:$scope.email,password:$scope.password});
		$scope.nama="";
		$scope.email="";
		$scope.password="";
			
		});
	}

	 $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete("http://localhost/cobaan/public/user/" + id).success(function(data) {
                if (data.success) {
                	$scope.datas={};
                    $http.get('http://localhost/cobaan/public/api/user').success(function(data) {
                        $scope.datas = data;
                        $scope.pools.splice(index, 1);
                        alert('berhasil');
                        $scope.datas.push({type: 'success', msg: 'Data Berhasil Dihapus'});
                        $timeout(function() {
                            $scope.datas = [];
                        }, 5000);
                    })
                }
            });
        }
    }

});