AngularApp.controller( 'ExampleController', function ( $scope, ExampleRepository ) 
{    
    var uniqueIDSeed = 0; /** Boiler plate property */
    
    $scope.Users = users; /** users would be declared as a variable on the blade file and preloaded with data from the controller */
    $scope.ShowLoader = { Value: false }; /** This is an object with property as data affected inside the repository only gets observed if it's an object */

    var RequestModel = function() {
        this.JobID; /** Boiler plate property */
        
        /** 
         * Add more properties here for your request to repositories
         * If you need a new one, include a new one.
         * 
         * You could even define these in the models folder somewhere!
         */
        this.ShowLoader = $scope.ShowLoader;
    }
    
    $scope.Paginate = function(){        
        requestModel = new RequestModel();
        
        /** 
         * Before making a request to your repository, call QueueJob
         * This is so that if you have many jobs occuring, it will not hide the loader until all are done or errored 
         */
        requestModel.JobID = QueueJob();
        
        ShowLoader();
        
        ExampleRepository.GetUsers( null, requestModel );
    };
    
    function HideLoader()
    {
        $scope.ShowLoader.Value = false;
    }
    
    function ShowLoader()
    {
        $scope.ShowLoader.Value = true;
    }
        
    /**
     * This function deals with the loading bar when sending multiple ajax queries off.
     * The uniqueIDSeed is just an incrementing number.
     * 
     * This function should be called just before making a query to a repository
     * 
     * @returns {Number}
     */
    function QueueJob()
    {
        var currentID = uniqueIDSeed;
        ExampleRepository.Model.JobsLeft.Value.push( currentID );
        uniqueIDSeed++;
        return currentID;
    }
    
    /** Link controller scopes to repository so that repository can access the scope variables */
    ExampleRepository.Model.Data.Users = $scope.Users;
});