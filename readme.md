> Use http://dillinger.io/ to edit this

#Oval / VanillaLaravel 
This is a vanilla to start new applications with

----------
##Naming conventions

Methods:  

    LikeThisPlease( $camelCase, TypeHintExample $example )
    
DTOs:

Notice the capital letters, this is because they can be converted to facades later on.

    class User
    {
        public $FirstName;
        public $LastName;
    }
    
Interfaces and classes:

    INoticeThePrefixI // Interface
    NoticeTheCapitals // Class
    
Namespace everything with a reasonable name please

    namespace App\Models\Objects\DTO;
    
Repositories/Services remain under the Models folder so we do not seperate models into a Services and Models folder

--------

##Javascript/Style packages  

Simply copy the lines that you require, into your views. Try to only include on pages that actually need them

###Bootstrap

    <!-- Bootstrap - css -->
    <link href="<?= asset( "packages/bootstrap/bootstrap-3.3.2-dist/css/bootstrap.min.css" ) ?>" rel="stylesheet" />   
    <!-- Bootstrap - js -->
    <script src="<?= asset( "packages/bootstrap/bootstrap-3.3.2-dist/js/bootstrap.min.js" ) ?>"></script>

###Jquery

    <!-- Jquery - js -->
    <script src="<?= asset( "packages/jquery/jquery-1.11.2.min.js" ) ?>"></script>

###Eternie code bootstrap datepicker

>http://eternicode.github.io/bootstrap-datepicker/?markup=input&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&todayBtn=false&clearBtn=false&language=en&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox  


    <!-- Eternie code bootstrap datepicker - css -->
    <link href="<?= asset( "packages/eterniecode-bootstrap-datepicker/eternicode-bootstrap-datepicker-37db99f/js/bootstrap-datepicker.js" ) ?>" />  
    
    <!-- Eternie code bootstrap datepicker - js -->
    <script src="<?= asset( "packages/eterniecode-bootstrap-datepicker/eternicode-bootstrap-datepicker-37db99f/css/datepicker.css" ) ?>"></script>  

------------------