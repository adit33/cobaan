var app = angular.module('http',[],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

 app.controller('suplierController',function($scope,$http,$filter){
    $scope.datas=[{}];
    $scope.data = {};
    
        
    $http.get('http://localhost/cobaan/public/api/suplier').success(function(data){
    $scope.datas=data;
     $scope.data = data;
    $scope.pagesizes=[5,10,15,25];
        $scope.totalItems = $scope.data.length;
        $scope.currentPage = 1;
        $scope.numPerPage = 5;
     $scope.pagesize=$scope.pagesizes[0];
     $scope.pagenumber=Math.ceil($scope.data.length / $scope.pagesize);
        
        // fungsi sorting data ASC/DESC
        $scope.paginate = function(value) {
            var begin, end, index;
            begin = ($scope.currentPage - 1) * $scope.pagesize;
            end = begin + $scope.pagesize;
            index = $scope.data.indexOf(value);
            return (begin <= index && index < end);
        };

        $scope.paging = function(type) {
             
            if(type ==0 && $scope.currentPage >1){
                --$scope.currentPage;
            }
            else if(type==1 && $scope.currentPage < $scope.pagenumber){
                ++$scope.currentPage;
            }
        };

        $scope.$watch('query', function(query) {
            $scope.data = data;
            $scope.data = $filter('filter')($scope.data, $scope.query);
            $scope.totalItems = $scope.data.length;
            $scope.currentPage = 1;
            $scope.numPerPage = 5;
        }, true);
   
    });

   
    $scope.addSuplier = function(event){
        event.preventDefault();

        $http.post('http://localhost/cobaan/public/suplier/store',{idSuplier:$scope.idSuplier,nama:$scope.nama,alamat:$scope.alamat,telepon:$scope.telepon,_token:$scope._token})
        .success(function(data, status, headers, config){
            $http.get('http://localhost/cobaan/public/api/getIdSuplier').success(function(data){
            $scope.datas.push({nama:$scope.nama,idSuplier:$scope.idSuplier,alamat:$scope.alamat,telepon:$scope.telepon});
            $scope.idSuplier=data;
            $scope.nama="";
            $scope.alamat="";
            $scope.telepon="";
            });
        });
    }

    $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete("http://localhost/cobaan/public/suplier/delete/" + id).success(function(data) {
                if (data.success) {
                  $scope.datas={};
                    $http.get('http://localhost/cobaan/public/api/suplier').success(function(data) {
                        $scope.datas = datasuplier                      })
                }
            });
        }
    }


    });
