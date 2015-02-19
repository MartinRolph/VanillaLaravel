AngularApp.factory( 'ExampleRepository', function( $http, $q ) {
    var ViewModel = function() 
    {
        return {
            Data: {
                /**
                 * Any data that is to be affected by this repository goes here and is attached in the controller at the bottom
                 * eg. Users
                 */
                Users: null
            },
            JobsLeft: { Value: [] }
        };
    }();
        
    function JobLoaded( requestModel )
    {
        for( var a in ViewModel.JobsLeft.Value )
        {
            var currentJob = ViewModel.JobsLeft.Value[ a ];
            if( currentJob == requestModel.JobID )
            {
                ViewModel.JobsLeft.Value.splice( a, 1 );
            }
        }
        
        if( ViewModel.JobsLeft.Value.length == 0 )
        {
            /** You can place as many loaders as you want here */
            requestModel.ShowLoader.Value = false;
        }
    }
    
    return {
        /** 
         * This links the repository to the controller.
         * If you affect properties inside this, it will be accesible from the $scope
         * if you linked them up at the bottom of the controller.
         * 
         * See Users for example.
         */
        Model: ViewModel,
        
        GetUsers: function( args, /*RequestModel*/ requestModel )
        {
            $http({
                url: exampleURL, // Declared on the blade file somewhere
                method: "POST",
                data: $.param( {
                } ),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).then(
                /** Success */
                function( result ) {  
                    
                    /** 
                     * An example to show that user array has been brought back from the Json controller method
                     * and added onto the existing Users array
                     * 
                     */
                    
//                    for( var a in result.data )
//                    {
//                        ViewModel.Data.Users.push( result.data[ a ] );
//                    }
                    
                    /** 
                     * Sometimes you might just want to copy data back,
                     * you can do that with angular.copy
                     */
                    
                    //angular.copy( result.data, ViewModel.Data.Users );     
                    
                    /** Once everything has been copied over, hide the loader */
                    JobLoaded( requestModel );
                },
                /** Error */
                function() {
                    /** If there was an error, hide the loader */
                    JobLoaded( requestModel );
                }
            );              
            
        }
    };
} );