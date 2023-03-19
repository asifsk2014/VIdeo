var url = window.location.href;
var url_array = url.split('/');

var public_url  = url_array[0]+'/'+url_array[1]+'/'+url_array[2]+'/'+url_array[3];






app.controller('RegisterController', function($scope , $http) {
   $scope.moveToStep2 = function(){
      var email = $scope.email ;
      
      var password = $scope.user_password ;

      var confirm_password = $scope.confirm_password ;

      var how_hear = $scope.how_hear ;

      var reffered_by = $scope.reffered_by ;
      var token = $("#token").val();

      
         var datap = {
            'email': email,
            'password': password,
            'confirm_password' : confirm_password,
            'how_hear' : how_hear ,
            'reffered_by': reffered_by,
            '_token' : token
        };
     
  
          
         
 $http({
                method: 'post',
                url: public_url+'/validate_record',
                data: datap
            })
                    .success(function (data, status, headers, config) { 
                         if(data != "Success"){
                         
                         $("#error").html('');
                         $("#error").html(data);
                         }                         
                         else{
                            $("#step1").hide();
                            $("#step2").show();
                            

                         }

                    });








  };
  
  
  
  $scope.step3 = function(){
      alert('Hello World');
     var first_name = $scope.first_name ;
     
     var last_name = $scope.last_name ;
     
     var address_line_1 = $scope.address_line_1 ;
     
     var address_line_2 = $scope.address_line_2 ;
     
     var city = $scope.city ;
     
     var state = $scope.state ;
     
     var zip = $scope.zip ;
     
     var phone_number = $scope.phone_number ;
     
     var date_of_birth = $scope.date_of_birth ;
     
     
     
        var token = $("#token").val();

      
         var datap = {
            'first_name': first_name,
            'last_name': last_name,
            'address_line_1' : address_line_1 ,
            'address_line_2' : address_line_2,
            'state' : state ,
            'city' : city ,
            'zip': zip,
            'phone_number': phone_number,
            'date_of_birth' : date_of_birth,
            '_token' : token
        };
     
  
          
         
 $http({
                method: 'post',
                url: public_url+'/validate_next_record',
                data: datap
            })
                    .success(function (data, status, headers, config) { 
                           if(data != "Success"){
                                $("#error1").html('');
                                $("#error1").html(data);
                                alert(data);
                            }
                            else {
                                $("#step2").hide();
                                $("#complete").show();
                                
                                
                            }
                    });
     
     
     
      
      
      
      
  };
  
  
  $scope.doGuestRegister = function(){
    
      var token = $("#token").val();
       var datap = {
         
            '_token' : token
        };
        
        
                 
 $http({
                method: 'post',
                url: public_url+'/do_register',
                data: datap
            })  .success(function (data, status, headers, config) { 
                        $("#success_message").html(data);
                        
        
        });
      
 };
 
 
$scope.doPremiumRegister = function(){
    
      var token = $("#token").val();
       var datap = {
         
            '_token' : token
        };
        
        
                 
 $http({
                method: 'post',
                url: public_url+'/do_premium_register',
                data: datap
            })  .success(function (data, status, headers, config) { 
                        $("#success_message").html(data);
                        
        
        });
    
    
    
    
    
};
});