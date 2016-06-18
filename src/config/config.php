<?php return [
    
    /*
    |--------------------------------------------------------------------------
    | Package Configuration Option
    |--------------------------------------------------------------------------
    | Describe what it does. 
    */

    //Pacakge view slug By default 'queue-view'
    'route'	 => 'QueueView',
    //Rows per page
    'perPage'	 => '10',


    //Queue Table. By default 'Jobs'
    'tableQueue' => 'Jobs',

    
    //Enable or Disable failed Jobs
    'failedJobs'	 => true,
    'tableFailed' => 'failed_jobs',

];
