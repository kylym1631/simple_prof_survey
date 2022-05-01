
 <script type="text/javascript">   
var myApp = angular.module('myApp',[]);
myApp.controller('TechCtrl',function ($scope) {
   $scope.Technologies={
  "Technology": [{
    "techId": 204,
    "technoly": "Java",
    "subTechnologies": [{
      "subtechId": 203,
      "subTechnology": "Core Java"
    }, {
      "subtechId": 205,
      "subTechnology": "JQuery"
    }]
  }, {
    "techId": 416,
    "technoly": "Mobility",
    "subTechnologies": [{
      "subtechId": 415,
      "subTechnology": "Android"
    }]
  }
          ]
}
     
  $scope.$watch('x',
              function(newValue, oldValue) {
                  document.getElementById("watch").innerHTML =
                     "oldValue " + oldValue + " " + 
                    "<br> newValue " + newValue + "";
              }
             );
  
  
});
</script>
