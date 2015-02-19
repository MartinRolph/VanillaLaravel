var AngularApp = angular.module( 'AngularApp', [ /** modules go here */ ], function( $interpolateProvider ) {
    /** This makes the template symbols not compete with blade */
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});